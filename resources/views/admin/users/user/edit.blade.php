@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 px-0">
            <div class="card px-0" style="border-radius:1rem; margin:0;">
                <div class="card-header"><h5 class="mb-0">Edit Pengguna</h5></div>
                <div class="card-body mx-4 mt-0">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 mt-0">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control border border-secondary px-3 py-2" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control border border-secondary px-3 py-2" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control border border-secondary px-3 py-2" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label">Kata Sandi (opsional)</label>
                                    <input type="password" class="form-control border border-secondary px-3 py-2 pr-5" id="password" name="password">
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor:pointer;margin-top:1.5rem;" onclick="togglePassword('password', this)">
                                        <i class="material-icons" id="icon-password">visibility_off</i>
                                    </span>
                                    @error('password')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi (opsional)</label>
                                    <input type="password" class="form-control border border-secondary px-3 py-2 pr-5" id="password_confirmation" name="password_confirmation">
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor:pointer;margin-top:1.5rem;" onclick="togglePassword('password_confirmation', this)">
                                        <i class="material-icons" id="icon-password_confirmation">visibility_off</i>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="is_active" class="form-label">Status Akun</label>
                                    <select class="form-select border border-secondary px-3 py-2" id="is_active" name="is_active" required>
                                        <option value="1" {{ old('is_active', $user->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('is_active', $user->is_active) == '0' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('is_active')<span class="text-danger text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function togglePassword(id, el) {
    const input = document.getElementById(id);
    const icon = el.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = 'visibility';
    } else {
        input.type = 'password';
        icon.textContent = 'visibility_off';
    }
}
</script>
@endsection 