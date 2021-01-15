<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="{{ config('app.locale') }}">
    <!-- Title -->
    <title>لوحة التحكم | @yield('page.title')</title>
    <!-- SEO Tags -->
    <meta name="description" content="Dashboard, Code, Ideas, settings, laravel, bulma">
    <meta name="author" content="Code Ideas">
    <!-- Type Tags --> 
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Styles -->
    <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="admin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="admin/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="admin/img/favicon/safari-pinned-tab.svg" color="#54cc96">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="wrapper" id="app">
        <!--========Admin Loader============-->
        <div class="pageloader is-active"><span class="title">DashBoard</span></div>
        <!--========Admin Login layout============-->
        @if (Route::current()->getName() === 'login_form')
            <main class="login-page">
                <img class="wave" src="{{ asset('/admin/img/wave.png') }}">
                @include('admin.partials.alerts')
                <div class="login-page-child">
                    <div class="container">
                        <div class="columns-container">
                            <div class="columns is-centered is-vcentered">
                                <div class="column is-6">
                                    @yield('content')
                                </div>
                                <div class="column is-6">
                                    <img class="side-vector" src="{{ asset('/admin/img/bg.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <!--========Admin landing layout (feel free to remove it and change route)============-->
        @elseif(Route::current()->getName() === 'admin_landing')
            @yield('content')
        <!--========Admin Area layout============-->    
        @else
            @include('admin.partials.alerts')
            @include('admin.includes.header')
            <main class="main-content">
                <div class="columns is-gapless">
                    <div class="column is-2" id="aside-container">
                        @include('admin.includes.side_bar')
                    </div>
                    <div class="column is-10" id="main-container">
                        <div class="page-container">
                            <div class="page-content">
                                @include('admin.includes.breadcrumb')
                                @yield('content')
                                @include('admin.includes.footer')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endif
    </div>
    <!-- Scripts -->
    <script src="{{ asset('/admin/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
