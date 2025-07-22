@extends('layouts.app')
@section('content')
<div class="container-fluid py-3">
    @if(isset($beritas))
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Daftar Berita</h4>
            <a href="{{ route('content.berita.create') }}" class="btn btn-primary">Tambah Berita</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritas as $i => $berita)
                        <tr>
                            <td>{{ $beritas->firstItem() + $i }}</td>
                            <td>
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" style="max-width:60px; max-height:40px; object-fit:cover; border-radius:0.4rem;">
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ $berita->kategori->nama ?? '-' }}</td>
                            <td>{{ $berita->created_at ? $berita->created_at->format('d-m-Y') : '' }}</td>
                            <td>
                                <a href="{{ route('content.berita.edit', ['beritum' => $berita->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('content.berita.destroy', ['beritum' => $berita->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center text-muted">Belum ada berita.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3 ms-2">{{ $beritas->links() }}</div>
        </div>
    @elseif(isset($kategoris) && !isset($berita))
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Tambah Berita</h4>
            <a href="{{ route('content.berita.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card shadow-sm p-4">
            <form method="POST" action="{{ route('content.berita.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required value="{{ old('judul') }}">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Judul</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Berita</label>
                    <textarea class="form-control ckeditor" id="isi" name="isi" rows="6" required>{{ old('isi') }}</textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    @elseif(isset($kategoris) && isset($berita) && $berita)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Berita</h4>
            <a href="{{ route('content.berita.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card shadow-sm p-4">
            <form method="POST" action="{{ route('content.berita.update', ['beritum' => $berita->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required value="{{ old('judul', $berita->judul) }}">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Judul</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if(!empty($berita->gambar))
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Judul" class="img-fluid mt-2" style="max-height:120px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ (old('kategori_id', $berita->kategori_id) == $kategori->id) ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Berita</label>
                    <textarea class="form-control ckeditor" id="isi" name="isi" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    @endif
@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    if (window.CKEDITOR) {
        CKEDITOR.replaceAll('ckeditor', {
            filebrowserUploadUrl: '{{ route('ckeditor.upload') }}?&_token={{ csrf_token() }}',
            filebrowserUploadMethod: 'form'
        });
    }
</script>
@endpush
</div>
@endsection 