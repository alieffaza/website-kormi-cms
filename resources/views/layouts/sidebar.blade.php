<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main" style="min-width:220px; box-shadow:0 2px 12px rgba(0,0,0,0.08);">
    <div class="sidenav-header" style="padding: 10px 0 12px 0; text-align:center;">
        <a class="navbar-brand m-0 d-flex flex-column align-items-center" href="/dashboard" style="text-decoration:none;">
            <span class="ms-1 font-weight-bold text-white" style="font-size:1.2rem; letter-spacing:1px;">KORMI KALTIM</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <ul style="list-style:none; padding-left:0; margin:0;">
        <li style="margin-bottom:10px;">
            <a href="{{ route('dashboard') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">dashboard</i> Dashboard
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ route('users.index') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">people</i> Pengguna
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ route('users.editors') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">supervisor_account</i> Editor
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <div style="color:#b0b0b0; font-size:0.95rem; font-weight:600; padding:8px 18px 2px 18px;">KONTEN</div>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ url('admin/content/inorga') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">groups</i> Inorga
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ url('admin/content/struktur_organisasi') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">account_tree</i> Struktur Organisasi
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ route('content.kategori.index') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">label</i> Kategori
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="{{ url('admin/content/berita') }}" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">article</i> Konten
            </a>
        </li>
        <li style="margin-bottom:10px;">
            <a href="#" style="color:white; text-decoration:none; display:flex; align-items:center; border-radius:8px; padding:10px 18px; transition:background 0.2s; gap:10px; font-weight:500;"
               onmouseover="this.style.background='#232b3e'" onmouseout="this.style.background='none'">
                <i class="material-icons-round">settings</i> Pengaturan
            </a>
        </li>
        @if(auth()->check())
        <li style="margin-bottom:10px;">
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" style="width:100%; background:#dc3545; color:white; border:none; padding:10px 0; border-radius:8px; display:flex; align-items:center; justify-content:center; gap:10px; font-weight:500; transition:background 0.2s;"
                        onmouseover="this.style.background='#b52a37'" onmouseout="this.style.background='#dc3545'">
                    <i class="material-icons-round">logout</i> Logout
                </button>
            </form>
        </li>
        @endif
    </ul>
</aside> 