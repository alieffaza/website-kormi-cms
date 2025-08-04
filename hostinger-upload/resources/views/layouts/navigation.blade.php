<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder" href="/dashboard">
            <img src="/assets/img/logo-ct.png" alt="logo" style="height:32px;display:inline;vertical-align:middle;"> Kormi CMS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @if(auth()->user() && auth()->user()->roles()->where('name','admin')->exists())
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('users.*') ? ' active' : '' }}" href="{{ route('users.index') }}">Manajemen Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('roles.*') ? ' active' : '' }}" href="{{ route('roles.index') }}">Manajemen Role</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">account_circle</i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <button class="dropdown-item" type="submit">Keluar</button>
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
