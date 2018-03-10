<!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="{{ Request::is('/') ? "active" : "" }}">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="{{ Request::is('blog') ? "active" : "" }}">
            <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="{{ Request::is('about') ? "active" : "" }}">
            <a class="nav-link" href="/about">About</a>
        </li>
        <li class="{{ Request::is('contact') ? "active" : "" }}">
            <a class="nav-link" href="/contact">Contact</a>
        </li>
    </ul>
    <div class="col-3">
            <ul class="nav">
                @if (Auth::check())
                <li class="col-9 px-0">
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }}<sub><i class="fa fa-angle-down" aria-hidden="true"></i></sub></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                        </div>
                    </div>
                </li>
               
                @else
                    
                    <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>

                @endif

            </ul>
        </div>
  </div>
</nav>