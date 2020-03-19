<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rahway Main St. - @yield('title')</title>
    @section('title', 'A digital main street for Rahway, New Jersey.')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="site flex flex-col min-h-screen">
    <header class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="container mx-auto">
            <div class="flex flex-row">
                <div class="flex flex-col items-start flex-shrink-0 text-white mr-6">
                    <h1 class="font-semibold text-3xl tracking-tight"><a href="/">Rahway Main St.</a></h1>
                    <h2 class="font-hairline text-md tracking-tight">Rahway Main St. is a digital main street for Rahway, New Jersey.</h2>
                </div>
                <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-teal-1200 border-teal-100 hover:text-white hover:border-white js-navbar-toggler navbar-toggler">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <nav class="w-full block flex-grow hidden lg:show lg:flex lg:items-center lg:justify-end lg:w-auto js-navbar-collapse">
                    <ul class="text-lg flex justify-end">
                        <li class="navbar-close"><i class="fa fa-close js-navbar-close"></i></li>
                        <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-6"><a href="/">Home</a></li>
                        @guest
                            <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-6">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-4">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-6">
                                <a href="/home">Dashboard ({{ Auth::user()->name }})</a></li>
                            <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-6"><a href="/create">Create Business</a></li>
                            <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-100 hover:text-white mr-6">
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
        </div>
    </header>

    <main class="content mb-10 mt-10 flex-grow">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>

    <footer class="flex items-center justify-between flex-wrap bg-teal-900 p-8 mt-10">

        <div class="container mx-auto">
            <div class="lg:flex lg:flex-row lg:justify-between">
                <div class="flex flex-col items-start flex-shrink-0 text-white mr-6">
                    <h1 class="font-semibold text-2xl tracking-tight"><a href="/">Rahway Main St.</a></h1>
                    <h2 class="font-hairline text-md tracking-tight">Rahway Main St. is a digital main street for Rahway, New Jersey.</h2>
                </div>

                <nav class="w-full block">
                    <ul class="flex-grow flex justify-start lg:justify-end lg:items-center lg:w-auto">
                        <li class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-teal-100 mr-4"><a href="/">Home</a></li>
                        @guest
                            <li class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-teal-100 mr-4">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-teal-100 mr-4">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                        <li class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-teal-100 mr-4"><a href="/links">Rahway Links</a></li>
                        <li class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-teal-100 mr-4"><a href="mailto:hello@rahwaymainst.com">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <aside class="text-xs text-gray-500 mt-2">&copy; <?php echo date('Y'); ?> Rahway Main St. All rights reserved. Rahway Main St. is a private entity and is not officially affiliated with the City of Rahway or its government. <a href="/terms">Terms of Service</a></aside>
        </div>
    </footer>
</body>
</html>