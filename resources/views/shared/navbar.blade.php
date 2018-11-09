<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"> Laravel Blog App </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class='nav-item dropdown {{ Route::is('post.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='post' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <span class='octicon-container octicon' data-octicon-type='file'></span>
                        Post
                    </a>
                    <div class='dropdown-menu' aria-labelledby='post'>
                        <a class='dropdown-item' href='{{ route('post.index') }}'> Index </a>
                        <a class='dropdown-item' href='{{ route('post.create') }}'> Create </a>
                    </div>
                </li>
            </div>
        </div>
    </div>
</nav>