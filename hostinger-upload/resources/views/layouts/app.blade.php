<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Material Dashboard CSS -->
        <link rel="stylesheet" href="/assets/css/material-dashboard.css?v=3.0.1" />
        <link rel="stylesheet" href="/assets/css/nucleo-icons.css" />
        <link rel="stylesheet" href="/assets/css/nucleo-svg.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="g-sidenav-show bg-gray-200 min-vh-100">
            @include('layouts.sidebar')
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                @include('layouts.topbar')
                <div class="container-fluid py-4">
                    @yield('content')
                    </div>
                @include('layouts.footer')
            </main>
        </div>
    </body>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/material-dashboard.min.js?v=3.0.1"></script>
    @stack('scripts')
</html>
