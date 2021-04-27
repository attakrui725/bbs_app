@section('header')
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/bbs/') }}">LaravelPjt BBS</a>
        @if (Route::has('login'))
                <div class="top-right links px-5 py-3">
                    @auth
<ul class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white bg-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                          @else
                        <a href="{{ route('login') }}" class="text-light">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }} " class="text-light">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>

</header>
@endsection
