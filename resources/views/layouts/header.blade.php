<header class="text-bg-dark p-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap">
            <a href="{{ route('home.index') }}"
                class="d-flex align-items-center mb-lg-0 text-decoration-none logo-preload mb-2 text-white">
                <img width="50" height="50" src="{{ asset('ArsLonga-logo-480x480.png') }}" class="img-fluid">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 mb-2">
                <li><a href="{{ route('home.index') }}"
                        class="nav-link text-secondary px-2">{{ __('layouts.header.home') }}</a></li>
                <li><a href="{{ route('artwork.index') }}"
                        class="nav-link px-2 text-white">{{ __('layouts.header.artworks') }}</a></li>
                <li><a href="{{ route('auction.index') }}"
                        class="nav-link px-2 text-white">{{ __('layouts.header.auctions') }}</a></li>
                @auth
                    <li><a href="{{ route('cart.index') }}"
                            class="nav-link px-2 text-white">{{ __('layouts.header.cart') }}</a></li>
                @endauth
            </ul>
            <div class="d-flex text-end">
                @guest
                    <a href="{{ route('login') }}" role="button"
                        class="btn btn-outline-light me-2">{{ __('auth.flow.login') }}</a>
                    <a href="{{ route('register') }}" role="button"
                        class="btn btn-warning">{{ __('auth.flow.sign_up') }}</a>
                @else
                    <a href="{{ route('user.index') }}" role="button"
                        class="btn btn-outline-light me-2">{{ __('auth.profile') }}</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline-flex">
                        <a role="button" class="btn btn-warning"
                            onclick="document.getElementById('logout').submit();">{{ __('auth.flow.logout') }}</a>
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>
