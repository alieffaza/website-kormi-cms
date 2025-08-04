@extends('main.layouts.app')
@section('content')
    <div class="container-fluid p-0" id="beranda">
        <!-- Section 1: Foto & Heading (100vh, full width, gelap, teks benar-benar di tengah) -->
        <div class="position-relative w-100" style="min-height:100vh;">
            <img src="/assets/img/kormi-landing.jpg" alt="KORMI Kaltim" style="position:absolute; top:0; left:50%; transform:translateX(-50%); width:100vw; height:100vh; min-height:100vh; max-height:100vh; object-fit:cover; filter:brightness(0.7); z-index:1; pointer-events:none;">
            <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.35); z-index:2;"></div>
            <div class="d-flex flex-column justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100 text-center" style="z-index:3; gap:1.5rem;">
                <div class="h5 text-white mb-0" style="text-shadow:0 2px 8px rgba(0,0,0,0.4)">Selamat datang di website resmi</div>
                <h1 class="display-3 fw-bold text-white mb-0" style="text-shadow:0 2px 8px rgba(0,0,0,0.4)">KORMI KALTIM</h1>
                <div class="h4 text-white mb-0" style="text-shadow:0 2px 8px rgba(0,0,0,0.4)">Komite Olahraga Rekreasi Masyarakat Indonesia Kalimantan Timur</div>
                <a href="#pengumuman" class="btn btn-lg btn-primary mt-2 px-5 py-2">Lihat Lebih Lanjut</a>
            </div>
        </div>
        <!-- Section Pengumuman (rapi, jarak, pembeda) -->
        <div class="mb-5 mt-5 px-2 px-md-5 py-5" id="pengumuman" style="background:#f8fafc; border-radius:1.5rem;">
            <h2 class="mb-4 text-center">Pengumuman</h2>
            <div class="row g-4">
                @forelse(($pengumuman ?? collect()) as $berita)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="object-fit:cover; max-height:180px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <div class="text-muted small mb-2">{{ $berita->created_at ? $berita->created_at->format('d-m-Y') : '' }}</div>
                            <div class="mb-2" style="max-height:60px; overflow:hidden;">{{ Str::limit(strip_tags($berita->isi), 80) }}</div>
                            <a href="{{ route('main.berita.detail', $berita->slug) }}" class="btn btn-primary btn-sm">Detail Pengumuman</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">Belum ada pengumuman.</div>
                @endforelse
            </div>
            <div class="text-center mt-3">
                <a href="/pengumuman" class="btn btn-outline-primary btn-sm mt-2">Lihat Semua Pengumuman</a>
            </div>
        </div>
        <!-- Section 3 & 4: Profile Ketua di kiri, Tentang di kanan (bersebelahan) -->
        @php
        $profile_ketua = [
            'nama' => 'Drs. Basri Rase, M. Si',
            'jabatan' => 'Ketua Kormi Provinsi Kalimantan Timur',
            'sambutan' => "KORMI Kalimantan Timur siap menghadapi tantangan masa depan dengan semangat yang membara! Kami percaya, olahraga rekreasi adalah kunci membangun masyarakat yang sehat, bugar, dan gembira.\n\nTugas kita ke depan adalah menghadirkan fasilitas olahraga yang mudah diakses, merata, dan menyenangkan untuk semua. Menuju Festival Olahraga Rekreasi Nasional (FORNAS), kita tidak hanya bersiap sebagai peserta, kita hadir sebagai pejuang semangat sehat!\n\nMari kita kobarkan semangat kebersamaan, satukan langkah, dan jadikan olahraga rekreasi sebagai gaya hidup masyarakat Kalimantan Timur.\nSalam Sehat, Bugar, Gembira!"
        ];
        @endphp
        <!-- Section Profile Ketua (benar-benar responsif) -->
        <div class="row mb-5 mx-auto px-3 px-md-5 g-4">
            <div class="col-lg-12">
                <div class="card card-list p-4 h-100 bg-white border rounded-4 shadow-sm py-4">
                    <h2 class="mb-4 text-center">Sambutan Ketua KORMI Kalimantan Timur</h2>
                    <div class="row align-items-center justify-content-center flex-column flex-md-row">
                        <div class="col-12 col-md-3 text-center mb-3 mb-md-0">
                            <img src="/assets/img/ketua-kormi.png" alt="Ketua KORMI Kaltim" class="img-fluid sambutan-ketua-img" style="border-radius:1.2rem; border:0px solid #eee; object-fit:cover; box-shadow:0 2px 12px rgba(0,0,0,0.08); margin:auto; padding:0.5rem; max-width:100%; width:100%;">
                        </div>
                        <div class="col-12 col-md-9 ps-0 ps-md-5 sambutan-profile-text" style="z-index:2; padding: left 10px;">
                            <div class="d-flex flex-column flex-md-row align-items-center mb-3" style="gap:1rem;">
                                <img src="/assets/img/profile-ketua-kormi.png" alt="Foto Ketua" class="rounded-circle shadow" style="width:55px; height:55px; object-fit:cover; margin-bottom:0.5rem">
                                <div class="text-center text-md-start">
                                    <h4 class="fw-bold mb-1">{{ $profile_ketua['nama'] }}</h4>
                                    <div class="mb-2 text-muted">{{ $profile_ketua['jabatan'] }}</div>
                                </div>
                            </div>
                            <blockquote class="blockquote mt-3 mb-0 w-100" style="border-left:4px solid #ddd; padding-left:1.2rem;">
                                @foreach(explode("\n", $profile_ketua['sambutan']) as $line)
                                    @if(trim($line) !== '')<p class="mb-2" style="font-size:1.1rem; font-style:italic; color:#444; text-align:justify;">{{ $line }}</p>@endif
                                @endforeach
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Tentang KORMI Kaltim: dua card atas-bawah -->
        <div class="row mb-5 mx-auto px-3 px-md-5 g-4">
            <div class="col-lg-12 mb-4">
                <div class="card card-list p-4 h-100 bg-light border-0 rounded-4 shadow-sm py-4">
                    <h4 class="fw-bold mb-2">Apa itu KORMI Kaltim?</h4>
                    <div class="text-justify" style="text-align: justify;">
                        KORMI Kaltim adalah organisasi yang berperan sebagai mitra pemerintah dalam membina, mengembangkan, dan mengkoordinasikan olahraga rekreasi masyarakat di Kalimantan Timur. KORMI menjadi wadah utama untuk mendorong gaya hidup sehat, produktif, dan bahagia melalui olahraga rekreasi yang inklusif dan berkelanjutan.
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-list p-4 h-100 bg-light border-0 rounded-4 shadow-sm py-4">
                    <h4 class="fw-bold mb-2">Tujuan KORMI Kaltim</h4>
                    <ul>
                        <li>Menjalankan program kerja organisasi;</li>
                        <li>Mendukung program kerja induk organisasi cabang olahraga anggota KORMI Cabang Kaltim dalam mengembangkan olahraga rekreasi di Kaltim;</li>
                        <li>Mewadahi dan membina masyarakat dalam kegiatan olahraga sehingga olahraga dijadikan sebagai budaya dan gaya hidup demi terciptanya masyarakat yang produktif;</li>
                        <li>Melakukan pembinaan kapasitas dan kualitas sumber daya manusia dalam rangka pengelolaan olahraga rekreasi masyarakat sebagai wujud peningkatan Indeks Pembangunan Manusia (IPM);</li>
                        <li>Membantu program Pemerintah Kaltim dalam meningkatkan Indeks Kebahagiaan melalui kegiatan olahraga masyarakat.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Section Berita (rapi, jarak, pembeda, fallback jika kategori null) -->
        <div class="mb-5 mt-5 px-2 px-md-5 py-4" id="berita" style="border-bottom:1px solid #e0e0e0;">
            <h2 class="mb-4 text-center">Berita</h2>
            <div class="row g-4">
                @php
                    $beritaTerbaru = collect($beritas ?? [])->filter(function($b){
                        return !isset($b->kategori) || !property_exists($b->kategori, 'nama') || $b->kategori->nama === null || $b->kategori->nama === 'berita';
                    })->sortByDesc('created_at')->take(3);
                @endphp
                @forelse($beritaTerbaru as $berita)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="object-fit:cover; max-height:180px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <div class="text-muted small mb-2">{{ $berita->created_at ? \Carbon\Carbon::parse($berita->created_at)->format('d-m-Y') : '' }}</div>
                            <div class="mb-2" style="max-height:60px; overflow:hidden;">{{ Str::limit(strip_tags($berita->isi), 80) }}</div>
                            <a href="{{ route('main.berita.detail', $berita->slug) }}" class="btn btn-primary btn-sm">Detail Berita</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">Belum ada berita.</div>
                @endforelse
            </div>
            <div class="text-center mt-3">
                <a href="/berita" class="btn btn-outline-primary btn-sm mt-2">Lihat Semua Berita</a>
            </div>
        </div>
        <!-- Section Event (rapi, jarak, pembeda) -->
        <div class="mb-5 mt-5 px-2 px-md-5 py-5" id="event" style="background:#f6f8fa; border-radius:1.5rem;">
            <h2 class="mb-4 text-center">Event</h2>
            <div class="row g-4">
                @forelse(($events ?? collect()) as $berita)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="object-fit:cover; max-height:180px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <div class="text-muted small mb-2">{{ $berita->created_at ? $berita->created_at->format('d-m-Y') : '' }}</div>
                            <div class="mb-2" style="max-height:60px; overflow:hidden;">{{ Str::limit(strip_tags($berita->isi), 80) }}</div>
                            <a href="{{ route('main.berita.detail', $berita->slug) }}" class="btn btn-primary btn-sm">Detail Event</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">Belum ada event.</div>
                @endforelse
            </div>
            <div class="text-center mt-3">
                <a href="/event" class="btn btn-outline-primary btn-sm mt-2">Lihat Semua Event</a>
            </div>
        </div>
        <!-- Section Inorga (card lebih panjang di mobile) -->
        <div class="mb-5 mt-5 px-2 px-md-5 py-4" id="inorga" style="border:1px solid #e0e0e0; border-radius:1.5rem; background:#fff;">
            <h2 class="mb-4 text-center">Inorga Terdaftar</h2>
            <div class="position-relative">
                <div id="inorgaCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($inorgas->chunk(4) as $chunkIndex => $chunk)
                        <div class="carousel-item @if($chunkIndex == 0) active @endif">
                            <div class="row g-3">
                                @foreach($chunk as $inorga)
                                <div class="col-6 col-md-3">
                                    <div class="card card-list p-4 text-center my-4 mb-5 pb-4" style="border-radius:2rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); height:210px; min-height:210px;">
                                        <span class="material-icons-round inorga-logo mb-2" style="font-size:2.5rem;">groups</span>
                                        <div class="fw-bold mb-1" style="font-size:1.1rem;">{{ $inorga->nama }}</div>
                                        <div class="text-muted small">{{ $inorga->singkatan }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#inorgaCarousel" data-bs-slide="prev" style="width:48px; height:48px; top:50%; left:-24px; transform:translateY(-50%); z-index:3;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#inorgaCarousel" data-bs-slide="next" style="width:48px; height:48px; top:50%; right:-24px; transform:translateY(-50%); z-index:3;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="/daftar-inorga" class="btn btn-outline-primary btn-sm mt-2">Lihat Semua Inorga</a>
            </div>
        </div>
        <!-- Section 8: Kontak & Lokasi -->
        <div class="mb-5 mx-auto px-3 px-md-5" id="kontak">
            <h2 class="mb-4 text-center">Kontak & Lokasi</h2>
            <div class="row justify-content-center mt-4"><!-- mt-4 untuk jarak ke card -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm p-4 h-100">
                        <h4 class="mb-3 text-center">Hubungi Kami</h4>
                        @if(session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('kontak.kirim') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control border" id="nama" name="nama" required placeholder="Nama Anda" style="padding-left: 1rem;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border" id="email" name="email" required placeholder="Email Anda" style="padding-left: 1rem;">
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control border" id="pesan" name="pesan" rows="4" required placeholder="Pesan untuk KORMI Kaltim" style="padding-left: 1rem;"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm p-4 h-100">
                        <h4 class="mb-3 text-center">Alamat Kantor KORMI Kalimantan Timur</h4>
                        <div class="mb-2 text-center">
                            Gedung Dispora Prov Kaltim Lantai 2, Jl. K.H. Wahid Hasyim, Sempaja Selatan, Samarinda Utara, Kota Samarinda
                        </div>
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15948.39383542759!2d117.1555759!3d-0.4532192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df678bc4c942781%3A0xbdbb37495dede04f!2sDISPORA%20PROV.KALTIM!5e0!3m2!1sen!2sid!4v1718000000000!5m2!1sen!2sid" width="100%" height="350" style="border:0; border-radius:1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'});" id="scrollTopBtn" style="display:none;position:fixed;bottom:32px;right:32px;z-index:9999;background:#1976d2;color:#fff;border:none;border-radius:50%;width:48px;height:48px;box-shadow:0 2px 8px rgba(0,0,0,0.15);font-size:2rem;align-items:center;justify-content:center;cursor:pointer;">
        <span class="material-icons-round align-middle">arrow_upward</span>
    </button>
    <script>
    window.addEventListener('scroll',function(){
        document.getElementById('scrollTopBtn').style.display = window.scrollY > 200 ? 'flex' : 'none';
    });
    </script>
@endsection 
@section('scripts')
    @parent
    <style>
        @media (max-width: 767.98px) {
            #inorga .card.card-list { height: 210px !important; min-height: 210px !important; }
            .ps-md-5 { padding-left: 1.2rem !important; }
        }
        @media (min-width: 768px) {
            #inorga .card.card-list { height: 170px !important; min-height: 170px !important; }
            .ps-md-5 { padding-left: 5rem !important; }
        }
        @media (min-width: 768px) {
            .sambutan-profile-text {
                padding-left: 3.5rem !important;
                margin-left: 0;
                position: relative;
                z-index: 2;
            }
            .sambutan-profile-text blockquote {
                margin-left: 0;
            }
        }
        @media (min-width: 1200px) {
            .sambutan-profile-text {
                padding-left: 5rem !important;
            }
        }
        
    </style>
@endsection 
@push('scripts')
<script>
    function adjustKetuaImg() {
        var img = document.querySelector('img[alt="Ketua KORMI Kaltim"]');
        if (!img) return;
        if (window.innerWidth >= 768) {
            img.style.maxWidth = '110%';
            img.style.width = '110%';
        } else {
            img.style.maxWidth = '100%';
            img.style.width = '100%';
        }
    }
    window.addEventListener('resize', adjustKetuaImg);
    window.addEventListener('DOMContentLoaded', adjustKetuaImg);
</script>
@endpush 