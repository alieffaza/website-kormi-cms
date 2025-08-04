@php
// Layout Material Dashboard, form login Laravel Breeze, Bahasa Indonesia
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>Masuk | Kormi CMS</title>
    <link rel="stylesheet" href="/assets/css/material-dashboard.css?v=3.0.1" />
    <link rel="stylesheet" href="/assets/css/nucleo-icons.css" />
    <link rel="stylesheet" href="/assets/css/nucleo-svg.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <main class="main-content mt-0 d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-12 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4 pb-2">
                            <h5>Masuk ke Akun Anda</h5>
                        </div>
                        <div class="card-body pt-2">
                            @if (session('status'))
                                <div class="alert alert-success mb-4">{{ session('status') }}</div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" role="form">
        @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control border border-secondary px-3 py-2" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                    @error('email')<span class="text-danger text-xs">{{ $message }}</span>@enderror
        </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input id="password" type="password" class="form-control border border-secondary px-3 py-2" name="password" required autocomplete="current-password">
                                    @error('password')<span class="text-danger text-xs">{{ $message }}</span>@enderror
        </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label" for="remember_me">Ingat saya</label>
        </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
            @if (Route::has('password.request'))
                                        <a class="text-sm text-primary" href="{{ route('password.request') }}">Lupa kata sandi?</a>
            @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-2 text-sm mx-auto">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/material-dashboard.min.js?v=3.0.1"></script>
</body>
</html>
