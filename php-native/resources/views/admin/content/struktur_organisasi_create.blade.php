@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah Struktur Organisasi</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('content.struktur_organisasi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" required value="{{ old('jabatan') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('content.struktur_organisasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection 