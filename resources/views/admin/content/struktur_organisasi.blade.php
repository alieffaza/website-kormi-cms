@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Struktur Organisasi</h2>
    <a href="{{ route('content.struktur_organisasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($strukturs as $struktur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $struktur->nama }}</td>
                            <td>{{ $struktur->jabatan }}</td>
                            <td>
                                <a href="{{ route('content.struktur_organisasi.edit', $struktur->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('content.struktur_organisasi.destroy', $struktur->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 