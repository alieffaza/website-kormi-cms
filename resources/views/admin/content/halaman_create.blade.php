@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Tambah Halaman</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('content.halaman.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Halaman</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (opsional)</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                            @error('slug')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Halaman</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="8">{{ old('isi') }}</textarea>
                            @error('isi')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('content.halaman.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 