@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Tambah Inorga</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('content.inorga.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Inorga</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="singkatan" class="form-label">Singkatan</label>
                            <input type="text" class="form-control @error('singkatan') is-invalid @enderror" id="singkatan" name="singkatan" value="{{ old('singkatan') }}">
                            @error('singkatan')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('content.inorga.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 