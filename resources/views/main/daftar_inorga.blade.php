@extends('main.layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Daftar Inorga Terdaftar</h2>
    <div class="card shadow-sm p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0" style="font-size:1rem;">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Inorga</th>
                        <th>Singkatan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inorgas as $inorga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $inorga->nama }}</td>
                        <td>{{ $inorga->singkatan }}</td>
                        <td><a href="{{ route('main.inorga.detail', $inorga->slug) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada inorga terdaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 