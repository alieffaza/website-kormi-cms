@extends('main.layouts.app')
@section('content')
<div class="container py-4 px-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm p-4">
                <h2 class="fw-bold mb-3">{{ $inorga->nama }}</h2>
                <div class="mb-2 text-muted">Singkatan: {{ $inorga->singkatan }}</div>
                <div class="mb-3">{!! nl2br(e($inorga->deskripsi)) !!}</div>
                <a href="/inorga" class="btn btn-outline-primary">Kembali ke Daftar Inorga</a>
            </div>
        </div>
    </div>
</div>
@endsection 