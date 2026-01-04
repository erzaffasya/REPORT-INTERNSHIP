<x-app-layout>
    <style>
        .berita-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .berita-card .card-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .berita-card .card-header h5 {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }

        .berita-card .card-header p {
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            margin: 0.25rem 0 0 0;
        }

        .btn-back {
            background: rgba(255,255,255,0.15);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.25);
            color: #fff;
        }

        .btn-add-berita {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-add-berita:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-1px);
        }

        .divisi-badge {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .berita-table {
            margin: 0;
        }

        .berita-table thead {
            background: #f7fafc;
        }

        .berita-table thead th {
            color: #4a5568;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .berita-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .berita-table tbody tr:hover {
            background-color: #f7fafc;
        }

        .berita-table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #2d3748;
        }

        .berita-number {
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

        .berita-title {
            font-weight: 600;
            color: #1a202c;
            font-size: 0.95rem;
            margin: 0;
        }

        .berita-desc {
            color: #4a5568;
            font-size: 0.875rem;
            line-height: 1.6;
            margin: 0;
            max-width: 500px;
        }

        .btn-action {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-action-edit {
            background: #faf5e6;
            color: #b7791f;
        }

        .btn-action-edit:hover {
            background: #ecc94b;
            color: #744210;
        }

        .btn-action-delete {
            background: #fed7d7;
            color: #c53030;
        }

        .btn-action-delete:hover {
            background: #fc8181;
            color: #742a2a;
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

        .modal-body .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
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

    <div class="container-fluid py-4">
        <div class="card berita-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5><i class="fas fa-newspaper"></i> Berita Acara</h5>
                            <span class="stats-badge">{{ count($berita) }} Total</span>
                        </div>
                        <div class="divisi-badge">
                            <i class="fas fa-building"></i>
                            {{ $dataDivisi->nama_divisi }} - {{ $dataDivisi->program->judul }}
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ url('Program/'.$dataDivisi->program->id.'/Divisi/'.$divisi) }}" class="btn btn-back">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-add-berita d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahBerita">
                            <i class="fas fa-plus"></i> Tambah Berita
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                @if(count($berita) > 0)
                <div class="table-responsive">
                    <table id="datatable-search" class="table berita-table mb-0">
                        <thead>
                            <tr>
                                <th width="80" class="text-center">No</th>
                                <th width="200">Judul</th>
                                <th>Deskripsi</th>
                                <th width="180" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $i)
                                <tr>
                                    <td class="text-center">
                                        <span class="berita-number">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <p class="berita-title">{{ $i->judul }}</p>
                                    </td>
                                    <td>
                                        <p class="berita-desc">{{ \Illuminate\Support\Str::limit($i->deskripsi, 150) }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-action btn-action-edit d-flex align-items-center gap-1"
                                                data-bs-toggle="modal" data-bs-target="#editBerita-{{ $i->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('berita.delete', $i->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-action btn-action-delete d-flex align-items-center gap-1">
                                                    <i class="fas fa-trash"></i> Hapus
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
                    <i class="fas fa-newspaper d-block"></i>
                    <p>Belum ada berita acara. Klik "Tambah Berita" untuk membuat berita baru.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Tambah Berita -->
    <div class="modal fade" id="tambahBerita" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Tambah Berita Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('berita.store', $divisi) }}">
                    @csrf
                    <input type="hidden" name="divisi_id" value="{{ $divisi }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan judul berita" required>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="deskripsi" rows="5" placeholder="Tulis deskripsi berita acara..." required></textarea>
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

    <!-- Modal Edit Berita -->
    @foreach ($berita as $i)
        <div class="modal fade" id="editBerita-{{ $i->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Berita Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('berita.update', $i->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $i->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul" value="{{ $i->judul }}" required>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="deskripsi" rows="5" required>{{ $i->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-modal-save">
                                <i class="fas fa-save me-1"></i> Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script>
            @if(count($berita) > 0)
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true,
                perPage: 10,
                labels: {
                    placeholder: "Cari berita...",
                    noRows: "Tidak ada data ditemukan",
                    info: "Menampilkan {start} - {end} dari {rows} data"
                }
            });
            @endif
        </script>
    @endpush
</x-app-layout>
