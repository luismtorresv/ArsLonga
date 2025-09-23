<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>{{ __('Ars Longa') }}</title>
    <style>
        /* Preload logo to prevent flash */
        .logo-preload {
            background-image: url('{{ asset('ArsLonga-logo-480x480.png') }}');
            background-size: 50px 50px;
            background-repeat: no-repeat;
            background-position: center;
            min-width: 50px;
            min-height: 50px;
        }
        
        .logo-preload img {
            opacity: 0;
            transition: opacity 0.1s ease-in;
        }
        
        .logo-preload img.loaded {
            opacity: 1;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <div class="container my-4">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>
</html>
