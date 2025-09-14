<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>{{ __('Ars Longa') }}</title>
</head>

<body>
    <!--Header-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ms-3" href="{{ route('home.index') }}">{{ __('Ars Longa') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.index') }}">{{ __('Auction') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.index') }}">{{ __('Artwork') }}</a>
                </li>
                <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                @guest
                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('Profile') }}</a>
                </li>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    <a role="button" class="nav-link active"
                        onclick="document.getElementById('logout').submit();">{{ __('Logout') }}</a>
                    @csrf
                </form>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container">{{ __('Ars Longa') }}</div>

    <div class="container my-4">
        @yield('content')
    </div>

    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                {{ __('Copyright — Ars Longa') }}
            </small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>
