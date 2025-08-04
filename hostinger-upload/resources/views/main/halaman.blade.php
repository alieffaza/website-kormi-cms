@extends('main.layouts.app')
@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Tentang KORMI Kaltim</h1>
    <ul class="nav nav-pills justify-content-center mb-4 flex-wrap" id="tentangTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="sejarah-tab" data-bs-toggle="pill" data-bs-target="#sejarah" type="button" role="tab" aria-controls="sejarah" aria-selected="true">Sejarah</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="visi-tab" data-bs-toggle="pill" data-bs-target="#visi" type="button" role="tab" aria-controls="visi" aria-selected="false">Visi Misi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="struktur-tab" data-bs-toggle="pill" data-bs-target="#struktur" type="button" role="tab" aria-controls="struktur" aria-selected="false">Struktur Organisasi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="inorga-tab" data-bs-toggle="pill" data-bs-target="#inorga" type="button" role="tab" aria-controls="inorga" aria-selected="false">Daftar Inorga</button>
        </li>
    </ul>
    <div class="tab-content py-3" id="tentangTabContent">
        <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="sejarah-tab">
            <h2 class="text-center mb-3">Sejarah</h2>
            <p class="text-center">(Isi sejarah KORMI Kaltim di sini...)</p>
        </div>
        <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="visi-tab">
            <h2 class="text-center mb-3">Visi & Misi</h2>
            <p class="text-center">(Isi visi dan misi KORMI Kaltim di sini...)</p>
        </div>
        <div class="tab-pane fade" id="struktur" role="tabpanel" aria-labelledby="struktur-tab">
            <h2 class="text-center mb-3">Struktur Organisasi</h2>
            <p class="text-center">(Struktur organisasi KORMI Kaltim akan ditampilkan di sini...)</p>
        </div>
        <div class="tab-pane fade" id="inorga" role="tabpanel" aria-labelledby="inorga-tab">
            <h2 class="text-center mb-3">Daftar Inorga</h2>
            <p class="text-center">(Daftar inorga KORMI Kaltim akan ditampilkan di sini...)</p>
        </div>
    </div>
</div>
@endsection 