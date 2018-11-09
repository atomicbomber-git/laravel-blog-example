<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        return view('post.create');
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

    public function view(Post $post)
    {
        return view('post.view', compact('post'));
    }
}
