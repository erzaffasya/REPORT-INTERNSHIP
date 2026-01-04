<x-app-layout>
    <style>
        .program-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .program-header h4 {
            color: #fff;
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
        }

        .program-header p {
            color: rgba(255,255,255,0.85);
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.5;
        }

        .btn-add-program {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.6rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-add-program:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .program-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .program-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .program-card .card-body {
            padding: 1.5rem;
        }

        .program-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.25rem;
        }

        .program-title {
            font-weight: 700;
            color: #1a202c;
            font-size: 1rem;
            margin: 0;
            transition: color 0.2s ease;
        }

        .program-title:hover {
            color: #4a5568;
        }

        .program-subtitle {
            font-size: 0.8rem;
            color: #718096;
            margin: 0.25rem 0 0 0;
        }

        .program-desc {
            color: #4a5568;
            font-size: 0.875rem;
            line-height: 1.6;
            margin: 0;
        }

        .program-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #edf2f7;
            margin-top: 1rem;
        }

        .stat-item h6 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }

        .stat-item small {
            font-size: 0.75rem;
            color: #718096;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: #f7fafc;
        }

        .dropdown-item.text-danger:hover {
            background: #fed7d7;
        }

        .menu-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            transition: all 0.2s ease;
        }

        .menu-btn:hover {
            background: #f7fafc;
            color: #2d3748;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #718096;
        }

        .empty-state i {
            font-size: 3rem;
            color: #cbd5e0;
            margin-bottom: 1rem;
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
        <div class="program-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <h4><i class="fas fa-graduation-cap me-2"></i>Daftar Program Magang</h4>
                    <span class="stats-badge">{{ $Program->count() }} Program</span>
                </div>
                <p>Kelola program magang yang sedang berjalan. Lihat detail atau tambahkan program baru sesuai kebutuhan.</p>
            </div>
            <a href="{{ route('Program.create') }}" class="btn btn-add-program d-flex align-items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Program
            </a>
        </div>

        @if($Program->count() > 0)
        <div class="row g-4">
            @foreach ($Program as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card program-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="program-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div>
                                        <a href="{{ route('Program.show', $item->id) }}" class="text-decoration-none">
                                            <h6 class="program-title">{{ $item->judul }}</h6>
                                        </a>
                                        <p class="program-subtitle">Klik untuk detail</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="menu-btn" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('Program.show', $item->id) }}">
                                            <i class="fas fa-eye me-2 text-muted"></i>Detail
                                        </a>
                                        <a class="dropdown-item" href="{{ route('Program.edit', $item->id) }}">
                                            <i class="fas fa-edit me-2 text-muted"></i>Ubah
                                        </a>
                                        <a class="dropdown-item text-danger" href="{{ url('destroyProgram', $item->id) }}"
                                           onclick="return confirm('Yakin ingin menghapus program ini?')">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <p class="program-desc">{{ \Illuminate\Support\Str::limit($item->detail, 100) }}</p>

                            <div class="program-stats">
                                <div class="stat-item">
                                    <h6>{{ $item->anggota->count() }}</h6>
                                    <small>Anggota</small>
                                </div>
                                <div class="stat-item text-end">
                                    <h6>{{ \Carbon\Carbon::parse($item->periode_berakhir)->format('d M Y') }}</h6>
                                    <small>Berakhir</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-folder-open d-block"></i>
            <p>Belum ada program magang. Klik "Tambah Program" untuk membuat program baru.</p>
        </div>
        @endif
    </div>
</x-app-layout>
