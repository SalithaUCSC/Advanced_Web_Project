<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="/">PHONE SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="{{ Request::is('/') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="{{ Request::is('phones') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/phones">Phones</a>
                    </li>
                    <li class="{{ Request::is('posts') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/posts">Blog</a>
                    </li>
                    <li class="{{ Request::is('cart') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> Cart ({{Cart::count()}})</a>
                    </li>
                    <li class="{{ Request::is('login') ? 'nav-item active' : '' }}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="{{ Request::is('register') ? 'nav-item active' : '' }}"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="{{ Request::is('/') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="{{ Request::is('phones') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/phones">Phones</a>
                    </li>
                    <li class="{{ Request::is('posts') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/posts">Blog</a>
                    <li class="{{ Request::is('posts/create') ? 'nav-item active' : '' }}">
                    <a class="nav-link" href="/posts/create">Create a Post</a>
                    </li>
                    <li class="{{ Request::is('dashboard') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="{{ Request::is('profile') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/profile">profile</a>
                    </li>
                    <li class="{{ Request::is('cart') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> Cart ({{Cart::count()}})</a>
                    </li>
                    <li class="nav-item">                                
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>