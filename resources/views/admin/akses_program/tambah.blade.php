<x-app-layout>
    <style>
        .access-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .access-card .card-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .access-card .card-header h5 {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }

        .access-card .card-header p {
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            margin: 0.25rem 0 0 0;
        }

        .btn-back {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.3);
            color: #fff;
        }

        .access-table {
            margin: 0;
        }

        .access-table thead {
            background: #f7fafc;
        }

        .access-table thead th {
            color: #4a5568;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .access-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .access-table tbody tr:hover {
            background-color: #f7fafc;
        }

        .access-table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #2d3748;
        }

        .user-number {
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .user-name {
            font-weight: 600;
            color: #1a202c;
            margin: 0;
            font-size: 0.95rem;
        }

        .user-email {
            color: #718096;
            font-size: 0.8rem;
            margin: 0;
        }

        .btn-add-user {
            background: #48bb78;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-add-user:hover {
            background: #38a169;
            color: #fff;
            transform: translateY(-1px);
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

        .stats-badge {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .program-badge {
            background: #edf2f7;
            color: #4a5568;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-top: 0.5rem;
        }
    </style>

    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card access-card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5><i class="fas fa-user-plus"></i> Tambah Anggota Program</h5>
                            <span class="stats-badge">{{ count($user) }} Tersedia</span>
                        </div>
                        <p>Pilih pengguna untuk ditambahkan ke program</p>
                        <span class="program-badge">
                            <i class="fas fa-briefcase me-1"></i>{{ $program->judul }}
                        </span>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-back">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                @if(count($user) > 0)
                <div class="table-responsive">
                    <table id="datatable-search" class="table access-table mb-0">
                        <thead>
                            <tr>
                                <th width="80" class="text-center">No</th>
                                <th>Pengguna</th>
                                <th width="150" class="text-center">Aksi</th>
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
                                    <td class="text-center">
                                        <form action="{{ url('storeAksesProgram') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $item->id }}">
                                            <input type="hidden" name="program_id" value="{{ $program->id }}">
                                            <button type="submit" class="btn btn-add-user">
                                                <i class="fas fa-plus me-1"></i> Tambah
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <p>Semua pengguna sudah ditambahkan ke program ini.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

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
