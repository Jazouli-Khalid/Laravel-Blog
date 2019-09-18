<nav style="margin-bottom:10px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">    
  <ul>
          <a class="navbar-brand" href="/">Home</a>
          <a class="navbar-brand" href="/posts">Posts</a>
          <a class="navbar-brand" href="/about">About</a>
          <a class="navbar-brand" href="contact">Contact</a>
      </ul>
  
       <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            <ul class="nav-item dropdown">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <li> <a href="/posts/create"> <i class="fas fa-plus">Add Post</i> </a></li>
                                    
                                        <li><a class="dropdown-item" href="/posts/create">Add Post </a><li>
                                    
                                        <li> <a href="{{ route('home')}}" class="dropdown-item" > Admin</a></li>
                                        
                                        <li class="divider"></li>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </ul>
                            </li>
                        @endguest
                    </ul>
     
  </div>
</nav>