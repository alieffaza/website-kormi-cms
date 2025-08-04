@php
// Layout Material Dashboard, form register Laravel Breeze, Bahasa Indonesia
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>Daftar Akun | Kormi CMS</title>
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
                            <h5>Daftar Akun Inorga</h5>
                            <p class="text-sm text-secondary">Formulir ini khusus untuk pendaftaran akun Inorga. Silakan isi data berikut:</p>
                        </div>
                        <div class="card-body pt-2">
                            <form method="POST" action="{{ route('register') }}" role="form">
        @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Inorga</label>
                                    <input id="name" type="text" class="form-control border border-secondary px-3 py-2" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                    @error('name')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inorga" class="form-label">Asal Inorga</label>
                                    <input id="inorga" type="text" class="form-control border border-secondary px-3 py-2" name="inorga" value="{{ old('inorga') }}" required autocomplete="organization">
                                    @error('inorga')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control border border-secondary px-3 py-2" name="email" value="{{ old('email') }}" required autocomplete="username">
                                    @error('email')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input id="phone" type="text" class="form-control border border-secondary px-3 py-2" name="phone" value="{{ old('phone') }}" required autocomplete="tel">
                                    @error('phone')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input id="password" type="password" class="form-control border border-secondary px-3 py-2 pr-5" name="password" required autocomplete="new-password">
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor:pointer;margin-top:1.5rem;" onclick="togglePassword('password', this)">
                                        <i class="material-icons" id="icon-password">visibility_off</i>
                                    </span>
                                    @error('password')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input id="password_confirmation" type="password" class="form-control border border-secondary px-3 py-2 pr-5" name="password_confirmation" required autocomplete="new-password">
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor:pointer;margin-top:1.5rem;" onclick="togglePassword('password_confirmation', this)">
                                        <i class="material-icons" id="icon-password_confirmation">visibility_off</i>
                                    </span>
                                    @error('password_confirmation')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-2 text-sm mx-auto">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Masuk</a>
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
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility_off';
            }
        }
    </script>
</body>
</html>
