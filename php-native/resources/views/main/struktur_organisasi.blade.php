@extends('main.layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Struktur Organisasi KORMI Kaltim</h2>
    <div class="card shadow-sm p-4">
        <h4 class="mb-3">Daftar Struktur Organisasi</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0" style="font-size:1rem;">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $strukturs = \App\Models\StrukturOrganisasi::orderBy('id')->get(); @endphp
                    @forelse($strukturs as $struktur)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $struktur->nama }}</td>
                        <td>{{ $struktur->jabatan }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center text-muted">Belum ada data struktur organisasi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 