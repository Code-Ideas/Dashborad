<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <!-- Title -->
    <title>Code Ideas | @yield('page.title') </title>
    <!-- SEO Tags -->
    @yield('head.metaTags')
    @yield('head.ogTags')
    @yield('head.twitterTags')
    @yield('head.metaTags')
    <!-- lang Tags -->
    <meta name="locale" content="{{ config('app.locale') }}">    
    <!-- Type Tags --> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Scripts -->
    <script src="{{ asset('front/js/app.js') }}" defer></script>    
    <!-- Styles -->
    <link href="{{ asset('front/css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="admin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="admin/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="admin/img/favicon/safari-pinned-tab.svg" color="#54cc96">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
    <div id="app">
        <header class="py-6 bg-green-400">
            <div class="container flex items-center justify-between px-6 mx-auto">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-white no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-sm text-white sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>