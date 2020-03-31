<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rahway Main St. - @yield('title')</title>
    @section('title', 'A digital main street for Rahway, New Jersey.')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- meta -->
    <meta name="title" content="Rahway Main St. - @yield('title')">
    <meta name="description" content="@yield('description')">

    <!-- Facebook OG -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}?v=3">
    <meta property="og:title" content="Rahway Main St. - @yield('title')">
    <meta property="og:site_name" content="Rahway Main St.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ asset('img/rms-og.jpg') }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="app">
    <meta name="twitter:title" content="Rahway Main St. - @yield('title') ">
    <meta name="twitter:site" content="">
    <meta name="twitter:description" content="@yield('description')">

    <!-- Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161612268-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-161612268-1');
    </script>

</head>
<body class="site flex flex-col min-h-screen {{ $page ?? '' }}">
    <header class="site-header">
        <div class="site-header-container container mx-auto">
            <div class="site-header-branding">
                <h1 class="branding-header"><a href="/">Rahway Main St. <span class="branding-version">(Beta)</a></a></h1>
                <h2 class="branding-tagline">A digital main street for Rahway, New Jersey.</h2>
            </div>
            <div class="nav-mobile-wrapper">
                <button class="js-navbar-toggler navbar-toggler">
                <i class="icon-bars"></i>
                </button>
            </div>
            <nav class="header-navigation js-navbar-collapse">
                <ul class="header-navigation-menu">
                    <li class="navbar-close"><i class="icon-times js-navbar-close"></i></li>
                    <li class="navigation-item"><a href="/">Home</a></li>
                    @guest
                        <li class="navigation-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="navigation-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="navigation-item">
                            <a href="/home">Dashboard ({{ Auth::user()->name }})</a></li>
                        <li class="navigation-item"><a href="/create">Create Listing</a></li>
                        <li class="navigation-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    @if (Request::is('/'))
        <main class="content site-content home-content js-site-content">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </main>
    @else
        <main class="content site-content js-site-content">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </main>
    @endif

    <footer class="site-footer">

        <div class="container mx-auto">
            <div class="site-footer-info">
                <div class="site-footer-branding">
                    <h1 class="site-footer-branding-header"><a href="/">Rahway Main St.</a></h1>
                    <h2 class="site-footer-branding-tagline">Rahway Main St. is a digital main street for Rahway, New Jersey.</h2>
                </div>

                <nav class="w-full block">
                    <ul class="site-footer-menu">
                        <li class="footer-navigation-item"><a href="/">Home</a></li>
                        @guest
                            <li class="footer-navigation-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="footer-navigation-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                        <li class="footer-navigation-item"><a href="/links">Rahway Links</a></li>
                        <li class="footer-navigation-item"><a href="/about">About &amp; Contact</a></li>
                    </ul>
                </nav>
            </div>

            <aside class="text-xs text-gray-500 mt-2">
                <p>&copy; <?php echo date('Y'); ?> Rahway Main St. All rights reserved. <a href="/terms">Terms of Service</a> | <a href="/privacy">Privacy Policy</a></p>
                <p>Rahway Main St. is a private entity. Rahway Main St. is not affiliated with the City of Rahway government in any way.</p>
            </aside>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>