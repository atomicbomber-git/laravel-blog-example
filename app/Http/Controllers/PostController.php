<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Post;
use App\PostImage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select('id', 'title', 'content', 'created_at')
            ->orderByDesc('created_at')
            ->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $post = Post::create();
        return redirect()
            ->route('post.edit', $post);
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'title' => 'required|string|max:190|unique:posts',
            'content' => 'required|string|max:2000'
        ]);

        Post::create($data);

        return redirect()
            ->route('post.index');
    }

    public function uploadImage(Post $post)
    {
        $data = $this->validate(request(), [
            'image' => 'required|file'
        ]);

        $post_image = PostImage::create([ 'post_id' => $post->id ]);

        $post_image
            ->addMedia( request()->file('image') )
            ->toMediaCollection('images');

        return route('post.image', $post_image);
    }

    public function image(PostImage $post_image)
    {
        $image = $post_image->getFirstMedia('images');
        
        if (empty($image)) {
            abort(404);
        }

        return response()->file($image->getPath());
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = $this->validate(request(), [
            'title' => ['required', 'string', 'max:190', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required|string|max:2000'
        ]);
        
        // Crawl the content, get all the image ids
        $crawler = new Crawler($data['content']);
        
        $images = collect();
        $crawler->filter('img')->each(function($image) use($images) {
            $images->push(collect(
                explode("/", $image->attr("src"))
            )->pop());
        });
        
        // Delete all images that don't belong to the post anymore
        PostImage
            ::where('post_id', $post->id)
            ->whereNotIn('id', $images)
            ->delete();

        $post->update($data);

        return back();
    }

    public function view(Post $post)
    {
        return view('post.view', compact('post'));
    }

    public function delete(Post $post)
    {
        DB::transaction(function() use($post) {
            $post->images()->delete();
            $post->delete();
        });

        return back();
    }
}
