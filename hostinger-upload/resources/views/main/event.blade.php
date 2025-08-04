@extends('main.layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Event</h2>
    <div class="row g-4">
        @forelse($beritas as $berita)
        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top w-100" style="object-fit:cover; max-height:180px;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <div class="text-muted small mb-2">{{ $berita->created_at ? $berita->created_at->format('d-m-Y') : '' }}</div>
                    <div class="mb-2" style="max-height:60px; overflow:hidden;">{{ Str::limit(strip_tags($berita->isi), 80) }}</div>
                    <a href="{{ route('main.berita.detail', $berita->slug) }}" class="btn btn-primary btn-sm">Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">Belum ada event.</div>
        @endforelse
    </div>
    <div class="mt-4">{{ $beritas->links() }}</div>
</div>
@endsection 