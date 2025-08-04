@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header"><h5>Edit Role</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" class="form-control border border-secondary px-3 py-2" id="name" name="name" value="{{ old('name', $role->name) }}" required>
                            @error('name')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 