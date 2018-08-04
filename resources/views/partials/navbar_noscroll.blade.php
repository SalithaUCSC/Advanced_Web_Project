<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="/">MOBILE4U</a>
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
                    {{--<li class="{{ Request::is('posts') ? 'nav-item active' : '' }}">--}}
                        {{--<a class="nav-link" href="/posts">Blog</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('cart') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill indigo"> {{Cart::count()}}</span></a>
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
                    {{--<li class="{{ Request::is('posts') ? 'nav-item active' : '' }}">--}}
                        {{--<a class="nav-link" href="/posts">Blog</a>--}}
                    {{--<li class="{{ Request::is('posts/create') ? 'nav-item active' : '' }}">--}}
                    {{--<a class="nav-link" href="/posts/create">Create a Post</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{ Request::is('dashboard') ? 'nav-item active' : '' }}">--}}
                        {{--<a class="nav-link" href="/dashboard">Dashboard</a>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('profile') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/users/{{Auth::user()->id}}">profile</a>
                    </li>

                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
                        {{--<div class="dropdown-menu dropdown-primary" style="height: 300px; width: 230px;" aria-labelledby="navbarDropdownMenuLink">--}}
                            {{--<div class="col-lg-12">--}}

                                    {{--@foreach(Cart::content() as $item)--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-l-6" style="float: left;"><img class="img-thumbnail" style="width: 50px; height: 50px;"  src="/storage/phones/{{$item->options->img}}"></div>--}}
                                        {{--<div class="col-l-6" style="float: right;">{{$item->name}}</div>--}}
                                    {{--</div>--}}
                                        {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <li class="{{ Request::is('cart') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill indigo"> {{Cart::count()}}</span></a>
                    </li>
                    <li class="{{ Request::is('wishlist') ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="/wishlist"><i class="fas fa-heart"></i>
                            <span class="badge badge-pill indigo">
                                @if($wishes)
                                    {{count($wishes)}}
                                @endif
                            </span>
                        </a>
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