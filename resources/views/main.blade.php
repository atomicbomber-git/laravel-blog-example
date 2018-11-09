<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Awesome </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- @include('shared.navbar') --}}
    {{-- @yield('content') --}}

    <div class="container mt-5">
        <h1> Main Page </h1>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam officia cum corporis dolorum, temporibus pariatur doloremque earum eos tempora, corrupti modi! Veniam aut dicta sunt harum nisi nobis. Aut, deserunt.

        <form class="mt-5">
            <div class="form-group">
                <label for="editor"> Content: </label>
                <textarea id="editor" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </form>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        tinyMCE.init({
            selector: '#editor',
            body_class: 'tinymce-editor',
            content_css : '{{ asset('css/app.css') }}'
        })
    </script>
</body>
</html>