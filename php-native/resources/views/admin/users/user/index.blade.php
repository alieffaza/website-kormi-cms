@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 px-0">
            <div class="card" style="border-radius:1rem; margin:0;">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 pb-2" style="border-bottom:none;">
                    <h5 class="mb-0 flex-grow-1">Daftar Pengguna</h5>
                    <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end" style="width:auto;">
                        <form method="GET" action="" class="mb-0 me-2 d-flex align-items-center gap-2" style="min-width:170px; margin-top:0;">
                            <input type="text" name="search" class="form-control border rounded-pill px-3" style="height:38px; border-radius:2rem; background:#f5f6fa; border:1px solid #ced4da; min-width:160px;" placeholder="Cari nama, email, status..." value="{{ request('search') }}" onkeydown="if(event.key==='Enter'){this.form.submit();}">
                        </form>
                        <a href="{{ route('users.printAll') }}" class="btn btn-primary d-flex align-items-center justify-content-center" style="height:38px; width:38px; padding:0; margin-bottom:0;" title="Print Seluruh Data" target="_blank">
                            <i class="material-icons">print</i>
                        </a>
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center" style="height:38px;min-width:150px;margin:0;">Tambah Pengguna</a>
                    </div>
                </div>
                <div class="card-body pt-0 px-0" style="width:100%;">
                    @if(session('success'))
                        <div class="alert alert-success mx-4 text-white" style="background:#28a745;">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive mt-3 mx-4">
                        <table class="table align-items-center mb-0 shadow border rounded" style="width:100%; margin:0; border-radius:1rem; overflow:hidden; background:#fff;">
                            <thead class="bg-light">
                                <tr>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">No. Telp</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Dibuat</th>
                                    <th class="align-middle text-center" style="min-width:120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr style="border-bottom:1px solid #e0e0e0;">
                                    <td class="py-3 align-middle">{{ $user->name }}</td>
                                    <td class="py-3 align-middle">{{ $user->email }}</td>
                                    <td class="py-3 align-middle">{{ $user->phone ?? '-' }}</td>
                                    <td class="py-3 align-middle">
                                        @if($user->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="py-3 align-middle">{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</td>
                                    <td class="py-3 align-middle text-center">
                                        <div class="d-flex gap-2 align-items-center justify-content-center" style="vertical-align:middle;">
                                            <button onclick="window.open('{{ route('users.print', $user) }}', '_blank'); return false;" class="btn btn-sm btn-secondary align-middle" style="margin:0;">PDF</button>
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning align-middle" style="margin:0;">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger align-middle" style="margin:0;" onclick="showDeleteModal({{ $user->id }}, '{{ $user->name }}')">Hapus</button>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-gradient-danger" style="color:#fff;">
        <h5 class="modal-title text-white" id="deleteModalLabel">Konfirmasi Hapus Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="deleteModalText">Apakah Anda yakin ingin menghapus pengguna ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
      </div>
    </div>
  </div>
</div>
<style>
.table {
    width: 100% !important;
    margin: 0;
    border-radius: 1rem !important;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 0.5rem 1rem rgba(140,152,164,.075);
}
.table th, .table td {
    border: none;
    vertical-align: middle;
    padding-left: 1.25rem !important;
    padding-right: 1.25rem !important;
}
.table th {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
    background: #f5f6fa;
    font-weight: 600;
}
.table td {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
.table tr {
    border-bottom: 1px solid #e0e0e0;
}
</style>
<script>
let deleteUserId = null;
function showDeleteModal(userId, userName) {
    deleteUserId = userId;
    document.getElementById('deleteModalText').innerText = `Yakin ingin menghapus pengguna "${userName}"? Tindakan ini tidak dapat dibatalkan.`;
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    if (confirmBtn) {
        confirmBtn.onclick = function() {
            if (deleteUserId) {
                document.getElementById('delete-form-' + deleteUserId).submit();
            }
        };
    }
});
</script>
@endsection 