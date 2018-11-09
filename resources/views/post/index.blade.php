@extends('shared.layout')
@section('title', 'All Blog Posts')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        All Blog Post
    </h1>

    <div class="my-4">
        <a href="{{ route('post.create') }}" class="btn btn-primary">
            Add New Post
            <span class="octicon-container octicon" data-octicon-type="plus"> </span>
        </a>
    </div>

    <div id="app">
        <example-component/>
    </div>
    
    {{-- <div class='table-responsive'>
        <table class='table table-sm table-striped'>
           <thead>
                <tr>
                    <th> # </th>
                    <th> Title </th>
                    <th> Created At </th>
                    <th> Control </th>
                </tr>
           </thead>
           <tbody>
               @foreach ($posts as $post)
                <tr>
                    <td> {{ $loop->iteration }}. </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->created_at }} </td>
                    <td>
                        <a href="{{ route('post.view', $post) }}" class="mb-2 btn btn-dark">
                            View
                            <span class="octicon-container octicon" data-octicon-type="eye"> </span>
                        </a>
                        <a href="{{ route('post.edit', $post) }}" class="mb-2 btn btn-dark">
                            Edit
                            <span class="octicon-container octicon" data-octicon-type="pencil"> </span>
                        </a>
                        <form class="d-inline-block" action="{{ route('post.delete', $post) }}" method="POST">
                            @csrf
                            <button class="mb-2 btn btn-danger">
                                Delete
                                <span class="octicon-container octicon" data-octicon-type="trashcan"> </span>
                            </button>
                        </form>
                    </td>
                </tr>
               @endforeach
           </tbody>
        </table>
    </div> --}}
</div>

@endsection

@javascript('posts', $posts)