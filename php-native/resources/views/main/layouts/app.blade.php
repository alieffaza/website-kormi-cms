<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KORMI Kaltim</title>
    <link rel="stylesheet" href="/assets/css/material-dashboard.css?v=3.0.1" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100" style="overflow-x:hidden;">
    @include('main.components.navbar')
    @yield('content')
    @include('main.components.footer')
    <script src="/assets/js/core/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html> 