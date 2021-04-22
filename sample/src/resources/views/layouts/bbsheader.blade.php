@section('header')
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/bbs/') }}">LaravelPjt BBS</a>
        @if (Route::has('login'))
                <div class="top-right links px-5">
                    @auth
                        <a href="{{ url('/home') }}" class="text-light">Home</a>
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
