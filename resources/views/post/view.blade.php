@extends('shared.layout')
@section('title', "View Post $post->title")
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-icon'></i>
        View Post {{ $post->title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-document"></i>
            View Post
        </div>
        <div class="card-body">
            <h1> {{ $post->title }} </h1>
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection