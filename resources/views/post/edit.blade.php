@extends('shared.layout')
@section('title', 'Add New Post')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Editing Post
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Editing Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', $post) }}" method="POST">
                @csrf
                <div class='form-group'>
                    <label for='title'> Title: </label>
                
                    <input
                        id='title' name='title' type='text'
                        placeholder='Title'
                        value='{{ old('title', $post->title) }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor"> Content: </label>
                    <div class="border {{ $errors->first('content', 'border-danger') }}">
                        <textarea name="content" id="editor" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="text-danger mt-2 small">
                        {{ $errors->first('content') }}
                    </div>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary">
                        Save Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>

tinyMCE.init({
    selector: '#editor',
    body_class: 'tinymce-editor',
    plugins: 'link image emoticons',
    image_caption: true,
    toolbar: [
        'undo redo | styleselect | bold italic | image | alignleft aligncenter alignright emoticons'
    ],
    content_css: '{{ asset('css/app.css') }}',
    images_upload_handler: function(blobInfo, success, failure) {
        
        let formData = new FormData()
        console.log(blobInfo.blob())
        formData.append('image', blobInfo.blob(), blobInfo.blob().name);
        
        axios.post(`/post/upload_image/{{ $post->id }}`, formData, { headers: { 'Content-Type': `multipart/form-data; boundary=${formData._boundary}` }, timeout: 50000 })
            .then(response => {
                success(response.data)
            })
            .catch(error => {
                failure("Image upload failed.")
            })
    }
})
.then(editors => {
    editors[0].setContent(`{!! old('content', $post->content) !!}`)
})

</script>
@endsection