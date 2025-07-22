@extends('main.layouts.app')
@section('content')
<div class="container py-4 px-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 p-4 mb-4" style="border-radius:1.2rem;">
                <h1 class="mb-2 text-center fw-bold" style="font-size:2.2rem;">{{ $berita->judul }}</h1>
                <div class="text-muted small mb-4 text-center" style="font-size:1rem; font-weight:400; letter-spacing:0.5px;">{{ $berita->created_at ? $berita->created_at->format('d F Y') : '' }}</div>
                @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded shadow mb-4 mx-auto d-block" style="max-height:340px; object-fit:cover; border-radius:1rem;">
                @endif
                <div class="mb-4" style="text-align:justify; font-size:1.1rem; line-height:1.7;">{!! $berita->isi !!}</div>
                <div class="d-flex justify-content-between align-items-center mb-4 gap-2">
                    @if($prev)
                        <a href="{{ route('main.berita.detail', $prev->slug) }}" class="btn btn-outline-primary px-4 py-2 fw-semibold" style="border-radius:2rem; min-width:140px;"><i class="material-icons align-middle me-1" style="font-size:1.2rem;">chevron_left</i> Sebelumnya</a>
                    @else
                        <span></span>
                    @endif
                    @if($next)
                        <a href="{{ route('main.berita.detail', $next->slug) }}" class="btn btn-outline-primary px-4 py-2 fw-semibold" style="border-radius:2rem; min-width:140px;">Selanjutnya <i class="material-icons align-middle ms-1" style="font-size:1.2rem;">chevron_right</i></a>
                    @else
                        <span></span>
                    @endif
                </div>
                <div class="text-center mt-2">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary px-4 py-2" style="border-radius:2rem;">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block">
            <div class="card shadow border-0 p-3 mb-4" style="border-radius:1.2rem;">
                <h4 class="mb-4 fw-bold text-primary">Artikel Terkait</h4>
                <div class="row g-3">
                @forelse($related as $item)
                    <div class="col-12">
                        <a href="{{ route('main.berita.detail', $item->slug) }}" class="d-flex align-items-center gap-3 text-decoration-none related-card p-2 rounded-3" style="transition:background 0.2s;">
                            @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded shadow-sm" style="width:70px; height:55px; object-fit:cover;">
                            @endif
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark" style="font-size:1.05rem; line-height:1.2;">{{ $item->judul }}</div>
                                <div class="text-muted small">{{ $item->created_at ? $item->created_at->format('d M Y') : '' }}</div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="text-muted">Tidak ada artikel terkait.</div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- Related artikel di bawah pada mobile -->
    <div class="d-lg-none mt-4">
        <div class="card shadow border-0 p-3" style="border-radius:1.2rem;">
            <h4 class="mb-4 fw-bold text-primary">Artikel Terkait</h4>
            <div class="row g-3">
            @forelse($related as $item)
                <div class="col-12">
                    <a href="{{ route('main.berita.detail', $item->slug) }}" class="d-flex align-items-center gap-3 text-decoration-none related-card p-2 rounded-3" style="transition:background 0.2s;">
                        @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded shadow-sm" style="width:70px; height:55px; object-fit:cover;">
                        @endif
                        <div class="flex-grow-1">
                            <div class="fw-semibold text-dark" style="font-size:1.05rem; line-height:1.2;">{{ $item->judul }}</div>
                            <div class="text-muted small">{{ $item->created_at ? $item->created_at->format('d M Y') : '' }}</div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="text-muted">Tidak ada artikel terkait.</div>
            @endforelse
            </div>
        </div>
    </div>
</div>
<style>
.related-card:hover {
    background: #f3f6fa;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    text-decoration: none;
}
</style>
@endsection 