<x-app-layout>
    <style>
        .user-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .user-card .card-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .user-card .card-header h5 {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }

        .user-card .card-header h5 i {
            font-size: 1rem;
            opacity: 0.9;
        }

        .btn-add-user {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-add-user:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .stats-badge {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .user-table {
            margin: 0;
        }

        .user-table thead {
            background: #f7fafc;
        }

        .user-table thead th {
            color: #4a5568;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.9rem 1rem;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        .user-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .user-table tbody tr:hover {
            background-color: #f7fafc;
        }

        .user-table tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #2d3748;
            font-size: 0.875rem;
        }

        .user-number {
            background: #edf2f7;
            color: #4a5568;
            width: 28px;
            height: 28px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .user-name {
            font-weight: 600;
            color: #1a202c;
            margin: 0;
            font-size: 0.9rem;
        }

        .user-email {
            color: #718096;
            font-size: 0.8rem;
            margin: 0;
        }

        .badge-talent {
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-talent-yes {
            background: #c6f6d5;
            color: #22543d;
        }

        .badge-talent-no {
            background: #fed7d7;
            color: #742a2a;
        }

        .btn-action {
            padding: 0.35rem 0.65rem;
            font-size: 0.75rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-action-edit {
            background: #faf5e6;
            color: #b7791f;
            border: 1px solid #ecc94b;
        }

        .btn-action-edit:hover {
            background: #ecc94b;
            color: #744210;
            border-color: #d69e2e;
        }

        .btn-action-delete {
            background: #fed7d7;
            color: #c53030;
            border: 1px solid #fc8181;
        }

        .btn-action-delete:hover {
            background: #fc8181;
            color: #742a2a;
            border-color: #f56565;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
            color: #718096;
        }

        .empty-state i {
            font-size: 3rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
        }

        .empty-state p {
            margin: 0;
            font-size: 0.95rem;
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .modal-header .modal-title {
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-body .form-label {
            color: #2d3748;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .modal-body .form-control,
        .modal-body .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .modal-body .form-control:focus,
        .modal-body .form-select:focus {
            border-color: #4a5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
        }

        .modal-footer {
            border-top: 1px solid #edf2f7;
            padding: 1rem 1.5rem;
            gap: 0.5rem;
        }

        .btn-modal-cancel {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-modal-cancel:hover {
            background: #e2e8f0;
            color: #2d3748;
        }

        .btn-modal-save {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-modal-save:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(45, 55, 72, 0.3);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 576px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .text-truncate-custom {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card user-card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5>
                        <i class="fas fa-users"></i> Data Pengguna
                    </h5>
                    <span class="stats-badge">{{ count($user) }} Total</span>
                </div>
                <button type="button" class="btn btn-add-user d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahUser">
                    <i class="fas fa-plus fa-sm"></i> Tambah Pengguna
                </button>
            </div>

            <div class="card-body p-0">
                @if(count($user) > 0)
                <div class="table-responsive">
                    <table id="datatable-search" class="table user-table mb-0">
                        <thead>
                            <tr>
                                <th width="50" class="text-center">No</th>
                                <th>Pengguna</th>
                                <th>NIM</th>
                                <th>Instansi</th>
                                <th>Jurusan</th>
                                <th class="text-center">Talent</th>
                                <th width="140" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td class="text-center">
                                        <span class="user-number">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <div class="user-info">
                                            <span class="user-avatar">
                                                {{ strtoupper(substr($item->name, 0, 2)) }}
                                            </span>
                                            <div>
                                                <p class="user-name">{{ $item->name }}</p>
                                                <p class="user-email">{{ $item->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->nim ?? '-' }}</td>
                                    <td class="text-truncate-custom" title="{{ $item->sekolah }}">{{ $item->sekolah ?? '-' }}</td>
                                    <td>{{ $item->kelas ?? '-' }}</td>
                                    <td class="text-center">
                                        @if ($item->talent_id)
                                            <span class="badge-talent badge-talent-yes">
                                                <i class="fas fa-check-circle me-1"></i>Ada
                                            </span>
                                        @else
                                            <span class="badge-talent badge-talent-no">
                                                <i class="fas fa-times-circle me-1"></i>Tidak Ada
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('user', $item->id) }}"
                                                class="btn btn-action btn-action-edit d-flex align-items-center gap-1">
                                                <i class="fas fa-edit fa-sm"></i> Ubah
                                            </a>
                                            <form action="{{ url('deleteUser', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-action btn-action-delete d-flex align-items-center gap-1">
                                                    <i class="fas fa-trash-alt fa-sm"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <p>Belum ada data pengguna. Klik tombol "Tambah Pengguna" untuk menambahkan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="storeUser">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row mb-3">
                            <div>
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div>
                                <label class="form-label">NIM / NIS</label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM atau NIS">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div>
                                <label class="form-label">Instansi / Sekolah</label>
                                <input type="text" class="form-control" name="sekolah" placeholder="Nama instansi atau sekolah">
                            </div>
                            <div>
                                <label class="form-label">Jurusan / Kelas</label>
                                <input type="text" class="form-control" name="kelas" placeholder="Jurusan atau kelas">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-select" name="role" required>
                                <option value="magang">Magang</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-row mb-0">
                            <div>
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="contoh@email.com" required>
                            </div>
                            <div>
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Minimal 6 karakter" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-modal-save">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    @foreach ($user as $item)
        <div class="modal fade" id="editUser-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-user-edit me-2"></i>Ubah Pengguna
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('updateUser', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option value="magang" {{ $item->role == 'magang' ? 'selected' : '' }}>Magang</option>
                                    <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-modal-save">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script>
            @if(count($user) > 0)
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true,
                perPage: 10,
                labels: {
                    placeholder: "Cari pengguna...",
                    noRows: "Tidak ada data ditemukan",
                    info: "Menampilkan {start} - {end} dari {rows} data"
                }
            });
            @endif
        </script>
    @endpush
</x-app-layout>
