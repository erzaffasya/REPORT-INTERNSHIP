<x-app-layout>
    <style>
        .program-banner {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            border-radius: 16px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .program-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .program-banner::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: 10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }

        .banner-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .program-avatar {
            width: 56px;
            height: 56px;
            background: rgba(255,255,255,0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .program-avatar i {
            font-size: 1.5rem;
            color: #fff;
        }

        .program-info h4 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-size: 1.35rem;
        }

        .program-info p {
            color: rgba(255,255,255,0.7);
            margin: 0.25rem 0 0 0;
            font-size: 0.9rem;
        }

        .btn-download-cert {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.6rem 1.25rem;
            font-weight: 600;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-download-cert:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-1px);
        }

        .info-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .info-card .card-body {
            padding: 1.5rem;
        }

        .info-card h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 0.75rem 0;
        }

        .info-card p {
            color: #4a5568;
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        .badge-period {
            background: #edf2f7;
            color: #4a5568;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .stat-box {
            text-align: right;
        }

        .stat-box p {
            margin: 0.25rem 0;
            font-size: 0.9rem;
        }

        .stat-box strong {
            color: #2d3748;
        }

        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-active {
            background: #c6f6d5;
            color: #22543d;
        }

        .status-ended {
            background: #fed7d7;
            color: #742a2a;
        }

        .section-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .section-card .card-header {
            background: #fff;
            border-bottom: 1px solid #edf2f7;
            padding: 1.25rem 1.5rem;
        }

        .section-card .card-header h6 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .section-card .card-header p {
            color: #718096;
            font-size: 0.85rem;
            margin: 0.25rem 0 0 0;
        }

        .section-card .card-body {
            padding: 1.5rem;
        }

        .divisi-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.2s ease;
            height: 100%;
        }

        .divisi-card:hover {
            border-color: #4a5568;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .divisi-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .divisi-icon img {
            width: 40px;
            height: 40px;
        }

        .divisi-card h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 0.5rem 0;
        }

        .divisi-card p {
            font-size: 0.85rem;
            color: #718096;
            margin: 0 0 1rem 0;
            line-height: 1.5;
        }

        .divisi-actions {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-divisi {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-divisi-view {
            background: #edf2f7;
            color: #4a5568;
            border: none;
        }

        .btn-divisi-view:hover {
            background: #4a5568;
            color: #fff;
        }

        .btn-divisi-edit {
            background: #faf5e6;
            color: #b7791f;
            border: none;
        }

        .btn-divisi-edit:hover {
            background: #ecc94b;
            color: #744210;
        }

        .btn-divisi-delete {
            background: #fed7d7;
            color: #c53030;
            border: none;
        }

        .btn-divisi-delete:hover {
            background: #fc8181;
            color: #742a2a;
        }

        .add-divisi-card {
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.2s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .add-divisi-card:hover {
            border-color: #4a5568;
            background: #f7fafc;
        }

        .add-divisi-card i {
            font-size: 2rem;
            color: #a0aec0;
            margin-bottom: 0.5rem;
        }

        .add-divisi-card h5 {
            color: #718096;
            font-size: 0.95rem;
            margin: 0;
        }

        .member-table {
            margin: 0;
        }

        .member-table thead th {
            background: #f7fafc;
            color: #4a5568;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .member-table tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            font-size: 0.875rem;
            color: #2d3748;
        }

        .member-table tbody tr:hover {
            background: #f7fafc;
        }

        .member-number {
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

        .btn-add-member {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-add-member:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
        }

        .action-icon {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            color: #718096;
        }

        .action-icon:hover {
            background: #edf2f7;
            color: #2d3748;
        }

        .action-icon.delete:hover {
            background: #fed7d7;
            color: #c53030;
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
        }

        .modal-body .form-control:focus {
            border-color: #4a5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
        }

        .modal-footer {
            border-top: 1px solid #edf2f7;
            padding: 1rem 1.5rem;
        }

        .btn-modal-cancel {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-modal-save {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>

    <!-- Program Banner -->
    <div class="container-fluid py-4">
        <div class="program-banner">
            <div class="banner-content">
                <div class="d-flex align-items-center gap-3">
                    <div class="program-avatar">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="program-info">
                        <h4>{{ $Program->judul }}</h4>
                        <p>Program Magang</p>
                    </div>
                </div>
                @if ($userDivision && $periode < 0)
                    <a href="{{ url('cetak-nilai/' . Auth::user()->id . '/' . $userDivision->divisi_id . '/' . $Program->id) }}"
                       class="btn btn-download-cert">
                        <i class="fas fa-download me-2"></i>Unduh Sertifikat
                    </a>
                @endif
            </div>
        </div>

        <!-- Info Card -->
        <div class="card info-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5>Informasi Program</h5>
                        <p class="mb-3">{{ $Program->detail }}</p>
                        <span class="badge-period">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::parse($Program->periode_mulai)->format('d M Y') }} -
                            {{ \Carbon\Carbon::parse($Program->periode_berakhir)->format('d M Y') }}
                        </span>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <div class="stat-box">
                            <p>
                                @if ($periode < 0)
                                    <span class="status-badge status-ended">Program Selesai</span>
                                @else
                                    <span class="status-badge status-active">{{ $periode }} Hari lagi</span>
                                @endif
                            </p>
                            <p><i class="fas fa-users me-1"></i> <strong>{{ $Akses_program->count() }}</strong> Anggota</p>
                            <p><i class="fas fa-building me-1"></i> <strong>{{ $Divisi->count() }}</strong> Divisi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divisi Section -->
        <div class="card section-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h6><i class="fas fa-sitemap me-2"></i>Divisi</h6>
                    <p>Daftar divisi pada program {{ $Program->judul }}</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    @foreach ($Divisi as $item)
                        <div class="col-xl-3 col-md-6">
                            <div class="divisi-card">
                                <div class="divisi-icon">
                                    <img src="{{ asset('tadmin/assets/img/program-divisi.png') }}" alt="Divisi">
                                </div>
                                <h5>{{ $item->nama_divisi }}</h5>
                                <p>{{ \Illuminate\Support\Str::limit($item->detail ?? 'Divisi pada program magang', 60) }}</p>
                                <div class="divisi-actions">
                                    <a href="{{ url('Program/' . $Program->id . '/Divisi/' . $item->id) }}"
                                       class="btn btn-divisi btn-divisi-view">
                                        <i class="fas fa-eye me-1"></i>View
                                    </a>
                                    @can('admin')
                                        <a href="{{ route('Divisi.edit', $item->id) }}"
                                           class="btn btn-divisi btn-divisi-edit">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <a href="{{ url('destroyDivisi', $item->id) }}"
                                           class="btn btn-divisi btn-divisi-delete"
                                           onclick="return confirm('Yakin hapus divisi ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @can('admin')
                        <div class="col-xl-3 col-md-6">
                            <a href="#" class="add-divisi-card text-decoration-none" data-bs-toggle="modal" data-bs-target="#tambahdivisi">
                                <i class="fas fa-plus"></i>
                                <h5>Tambah Divisi</h5>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Member Section -->
        <div class="card section-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h6><i class="fas fa-users me-2"></i>Daftar Anggota</h6>
                    <p>Anggota yang mengikuti program {{ $Program->judul }}</p>
                </div>
                @can('admin')
                    <a href="{{ url('tambahAksesProgram', $Program->id) }}" class="btn btn-add-member">
                        <i class="fas fa-plus me-1"></i>Anggota
                    </a>
                @endcan
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table member-table" id="products-list">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Divisi</th>
                                @can('admin')
                                    <th width="100">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Akses_program as $item)
                                <tr>
                                    <td><span class="member-number">{{ $loop->iteration }}</span></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->akses_divisi->divisi->nama_divisi ?? '-' }}</td>
                                    @can('admin')
                                        <td>
                                            @if (!$item->isDivisi())
                                                <a href="{{ url('destroyAksesProgram', $item->id) }}"
                                                   class="action-icon delete" title="Hapus"
                                                   onclick="return confirm('Hapus anggota ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ url('rekomendasi/' . $item->user->id . '/program/' . $item->program_id) }}"
                                                   class="action-icon" title="Rekomendasi Divisi">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Divisi -->
    <div class="modal fade" id="tambahdivisi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Tambah Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('Divisi.store') }}">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="program_id" value="{{ $Program->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control" name="nama_divisi" placeholder="Masukkan nama divisi" required>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Detail</label>
                            <textarea class="form-control" name="detail" rows="3" placeholder="Deskripsi singkat divisi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-modal-save"><i class="fas fa-save me-1"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            if (document.getElementById('products-list')) {
                const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
                    searchable: true,
                    fixedHeight: false,
                    perPage: 10,
                    labels: {
                        placeholder: "Cari anggota...",
                        noRows: "Tidak ada data",
                        info: "Menampilkan {start} - {end} dari {rows} data"
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
