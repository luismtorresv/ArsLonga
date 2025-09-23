<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('home.index') }}"
                class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none logo-preload">
                <img width="50" height="50" src="{{ asset('ArsLonga-logo-480x480.png') }}" class="img-fluid" alt="ArsLonga Logo">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-secondary">{{ __('Home') }}</a>
                </li>
                <li><a href="{{ route('artwork.index') }}" class="nav-link px-2 text-white">{{ __('Artworks') }}</a>
                </li>
                <li><a href="{{ route('auction.index') }}" class="nav-link px-2 text-white">{{ __('Auctions') }}</a>
                </li>
                @auth
                    <li><a href="{{ route('cart.index') }}" class="nav-link px-2 text-white">{{ __('Cart') }}</a></li>
                @endauth
            </ul>
            <div class="d-flex text-end">
                @guest
                    <a href="{{ route('login') }}" role="button"
                        class="btn btn-outline-light me-2">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" role="button" class="btn btn-warning">{{ __('Sign-up') }}</a>
                @else
                    <a href="{{ route('user.index') }}" role="button"
                        class="btn btn-outline-light me-2">{{ __('Profile') }}</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline-flex">
                        <a role="button" class="btn btn-warning"
                            onclick="document.getElementById('logout').submit();">{{ __('Logout') }}</a>
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>
