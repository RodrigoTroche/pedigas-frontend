<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet">



    <!-- Styles -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>
    var csrf_token = '<?php echo csrf_token(); ?>';
    </script>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>
    .bg-blue {
        background-color: #1b4593;
    }

    .bg-orange {
        background-color: #e8840f;
    }

    .bg-blue .navbar-nav .nav-link {
        color: #fff;
    }
    </style>

</head>

<body>
    <div id="app">
        {{--
        <nav class="navbar navbar-expand-md bg-blue shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" style="height: 40px" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.about') }}">Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.order') }}">Términos</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->full_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('account.index') }}">
                            Mi cuenta
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav>
    --}}

    <main id="main" class="" style="opacity: 0">
        <div class="header-app bg-orange py-3">
            @include('partials.navigation')

            @hasSection('header-title')
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="hero-title">
                            <h1 class="">@yield('header-title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @yield('content')
    </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(window).on('load', function() {
            $('#main').animate({
            opacity: "1",
            transition: "opacity 225ms cubic-bezier(0.4, 0, 0.2, 1) 0ms"
        }, 500)
        })
        
    </script>
</body>

</html>