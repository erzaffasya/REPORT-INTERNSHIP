<x-app-layout>
    <style>
        .talent-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .talent-card .card-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .talent-card .card-header h5 {
            color: #fff;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .talent-card .card-header h5 i {
            font-size: 1rem;
            opacity: 0.9;
        }

        .btn-add-talent {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-add-talent:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .talent-table {
            margin: 0;
        }

        .talent-table thead {
            background: #f7fafc;
        }

        .talent-table thead th {
            color: #4a5568;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .talent-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .talent-table tbody tr:hover {
            background-color: #f7fafc;
        }

        .talent-table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #2d3748;
        }

        .talent-number {
            background: #edf2f7;
            color: #4a5568;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .talent-name {
            font-weight: 600;
            color: #1a202c;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .talent-name .talent-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.9rem;
        }

        .btn-action {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
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
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .modal-body .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .modal-body .form-control:focus {
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

        .stats-badge {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
    </style>

    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card talent-card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="mb-0">
                        <i class="fas fa-star"></i> Data Bakat
                    </h5>
                    <span class="stats-badge">{{ count($Talent) }} Total</span>
                </div>
                <button type="button" class="btn btn-add-talent d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahTalent">
                    <i class="fas fa-plus fa-sm"></i> Tambah Bakat
                </button>
            </div>

            <div class="card-body p-0">
                @if(count($Talent) > 0)
                <div class="table-responsive">
                    <table id="datatable-search" class="table talent-table mb-0">
                        <thead>
                            <tr>
                                <th width="80" class="text-center">No</th>
                                <th>Nama Bakat</th>
                                <th width="200" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Talent as $item)
                                <tr>
                                    <td class="text-center">
                                        <span class="talent-number">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <div class="talent-name">
                                            <span class="talent-icon">
                                                <i class="fas fa-lightbulb"></i>
                                            </span>
                                            {{ $item->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-action btn-action-edit d-flex align-items-center gap-1"
                                                data-bs-toggle="modal" data-bs-target="#editTalent-{{ $item->id }}">
                                                <i class="fas fa-edit fa-sm"></i> Edit
                                            </button>
                                            <form action="{{ route('talent.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bakat ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-action btn-action-delete d-flex align-items-center gap-1">
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
                    <i class="fas fa-star"></i>
                    <p>Belum ada data bakat. Klik tombol "Tambah Bakat" untuk menambahkan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Tambah Talent -->
    <div class="modal fade" id="tambahTalent" tabindex="-1" role="dialog" aria-labelledby="tambahTalentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Bakat Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('talent.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-0">
                            <label class="form-label">Nama Bakat</label>
                            <input type="text" class="form-control" name="name" placeholder="Contoh: Desain Grafis, Public Speaking, dll" required>
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

    <!-- Modal Edit Talent -->
    @foreach ($Talent as $item)
        <div class="modal fade" id="editTalent-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editTalentTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-edit me-2"></i>Edit Bakat
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('talent.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="mb-0">
                                <label class="form-label">Nama Bakat</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
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
            @if(count($Talent) > 0)
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true,
                perPage: 10,
                labels: {
                    placeholder: "Cari bakat...",
                    noRows: "Tidak ada data ditemukan",
                    info: "Menampilkan {start} - {end} dari {rows} data"
                }
            });
            @endif
        </script>
    @endpush
</x-app-layout>
