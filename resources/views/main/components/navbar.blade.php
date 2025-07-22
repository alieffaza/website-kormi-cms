<nav class="navbar navbar-expand-lg navbar-main py-3 px-4" style="position:sticky; top:0; z-index:1030; box-shadow:0 2px 16px rgba(0,0,0,0.08); background:#fff;">
    <a class="navbar-brand fw-bold" href="/">
        <img src="/assets/img/logo-kormi-kaltim-black.png" alt="KORMI Kaltim" style="max-height:100px; width:auto; display:block; margin:0; padding:0; margin-top:-40px; margin-bottom:-40px; vertical-align:middle;">
    </a>
    <button class="navbar-toggler d-flex align-items-center justify-content-center d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border:none; background:transparent;">
        <span class="material-icons-round" style="font-size:2.2rem;">menu</span>
    </button>
    <div class="collapse navbar-collapse w-100" id="navbarNav">
        <ul class="navbar-nav mx-auto justify-content-center mb-2 mb-lg-0 align-items-center w-70 gap-2 gap-lg-0 text-center">
            <li class="nav-item py-2 py-lg-0">
                <a class="nav-link px-3 py-2 fw-semibold d-flex align-items-center justify-content-center {{ request()->is('/') ? 'active border-bottom border-3 border-primary' : '' }}" href="/">Beranda</a>
            </li>
            <li class="nav-item dropdown py-2 py-lg-0">
                <a class="nav-link dropdown-toggle px-3 py-2 fw-semibold d-flex align-items-center justify-content-center {{ request()->is('sejarah') || request()->is('visi-misi') || request()->is('struktur-organisasi') || request()->is('daftar-inorga') ? 'active border-bottom border-3 border-primary' : '' }}" href="#" id="tentangDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tentang</a>
                <ul class="dropdown-menu" aria-labelledby="tentangDropdown">
                    <li><a class="dropdown-item" href="{{ route('main.sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ route('main.visi_misi') }}">Tujuan</a></li>
                    <li><a class="dropdown-item" href="{{ route('main.struktur_organisasi') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ route('main.daftar_inorga') }}">Daftar Inorga</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown py-2 py-lg-0">
                <a class="nav-link dropdown-toggle px-3 py-2 fw-semibold d-flex align-items-center justify-content-center {{ request()->is('pengumuman') || request()->is('berita') || request()->is('event') ? 'active border-bottom border-3 border-primary' : '' }}" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kegiatan</a>
                <ul class="dropdown-menu" aria-labelledby="kegiatanDropdown">
                    <li><a class="dropdown-item" href="/pengumuman">Pengumuman</a></li>
                    <li><a class="dropdown-item" href="/berita">Berita</a></li>
                    <li><a class="dropdown-item" href="/event">Event</a></li>
                </ul>
            </li>
            <li class="nav-item py-2 py-lg-0">
                <a class="nav-link px-3 py-2 fw-semibold d-flex align-items-center justify-content-center {{ request()->is('hubungi-kami') ? 'active border-bottom border-3 border-primary' : '' }}" href="/hubungi-kami">
                    <i class="material-icons-round me-1" style="font-size:1.2rem;">mail</i> Hubungi Kami
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center text-center">
            <li class="nav-item dropdown py-2 py-lg-0">
                <a class="nav-link p-2 dropdown-toggle d-flex justify-content-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Login">
                    <i class="material-icons-round align-middle" style="font-size:1.7rem;">person</i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav> 