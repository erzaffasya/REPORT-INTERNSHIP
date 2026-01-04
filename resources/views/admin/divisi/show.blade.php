<x-app-layout>
    <style>
        .divisi-header {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            border-radius: 16px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .divisi-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .divisi-header::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: 5%;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }

        .divisi-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .divisi-avatar {
            width: 52px;
            height: 52px;
            background: rgba(255,255,255,0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .divisi-avatar i {
            font-size: 1.4rem;
            color: #fff;
        }

        .divisi-title h4 {
            color: #fff;
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0;
        }

        .divisi-title p {
            color: rgba(255,255,255,0.7);
            font-size: 0.875rem;
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
            backdrop-filter: blur(10px);
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.25);
            color: #fff;
        }

        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            height: 100%;
        }

        .stat-card .card-body {
            padding: 1.25rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: #fff;
        }

        .stat-icon-member {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
        }

        .stat-icon-report {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }

        .stat-label {
            color: #718096;
            font-size: 0.8rem;
            margin: 0;
        }

        .stat-value {
            color: #1a202c;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
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
            padding: 1rem 1.25rem;
        }

        .section-card .card-header h6 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-card .card-header small {
            color: #718096;
            font-size: 0.8rem;
        }

        .section-card .card-body {
            padding: 1.25rem;
        }

        .btn-add {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.4rem 0.85rem;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-add:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
        }

        .berita-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #edf2f7;
        }

        .berita-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .berita-item:first-child {
            padding-top: 0;
        }

        .berita-title {
            font-weight: 600;
            color: #1a202c;
            font-size: 0.9rem;
            margin: 0 0 0.15rem 0;
        }

        .berita-date {
            color: #718096;
            font-size: 0.75rem;
        }

        .btn-detail {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.35rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-detail:hover {
            background: #4a5568;
            color: #fff;
        }

        .member-table {
            margin: 0;
        }

        .member-table thead th {
            background: #f7fafc;
            color: #4a5568;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.85rem 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .member-table tbody td {
            padding: 0.75rem 1rem;
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

        .btn-action {
            padding: 0.3rem 0.6rem;
            font-size: 0.75rem;
            border-radius: 5px;
            font-weight: 500;
            border: none;
        }

        .btn-action-danger {
            background: #fed7d7;
            color: #c53030;
        }

        .btn-action-danger:hover {
            background: #fc8181;
            color: #742a2a;
        }

        .btn-action-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-action-secondary:hover {
            background: #4a5568;
            color: #fff;
        }

        .btn-action-info {
            background: #bee3f8;
            color: #2b6cb0;
        }

        .btn-action-info:hover {
            background: #4299e1;
            color: #fff;
        }

        .laporan-item {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.75rem;
        }

        .laporan-item:last-child {
            margin-bottom: 0;
        }

        .laporan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .laporan-name {
            font-weight: 600;
            color: #1a202c;
            font-size: 0.9rem;
        }

        .badge-waiting {
            background: #faf5e6;
            color: #b7791f;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-approved {
            background: #c6f6d5;
            color: #22543d;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-revision {
            background: #fed7d7;
            color: #c53030;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .laporan-date {
            color: #718096;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #718096;
            font-size: 0.9rem;
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
            font-size: 1rem;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #edf2f7;
            padding: 1rem 1.5rem;
        }

        .btn-modal-close {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>

    <div class="container-fluid py-4">
        <!-- Divisi Header -->
        <div class="divisi-header">
            <div class="divisi-info">
                <div class="d-flex align-items-center gap-3">
                    <div class="divisi-avatar">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="divisi-title">
                        <h4>{{ $Divisi->nama_divisi }}</h4>
                        <p>{{ $Divisi->detail ?? 'Divisi pada program magang' }}</p>
                    </div>
                </div>
                <a href="{{ url('Program/' . $Divisi->program_id) }}" class="btn btn-back">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Stats & Info Row -->
        <div class="row g-4 mb-4">
            <!-- Stats -->
            <div class="col-lg-4">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="stat-icon stat-icon-member">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <p class="stat-label">Total Anggota</p>
                                    <h4 class="stat-value">{{ $Akses_divisi->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('riwayatLaporan', ['program' => $program, 'id' => $Divisi->id]) }}" class="text-decoration-none">
                            <div class="card stat-card" style="cursor: pointer; transition: all 0.2s ease;">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="stat-icon stat-icon-report">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div>
                                        <p class="stat-label">Laporan</p>
                                        <h4 class="stat-value">{{ $Laporan->count() }}</h4>
                                    </div>
                                    <i class="fas fa-chevron-right ms-auto text-muted"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Info Divisi / Berita -->
            <div class="col-lg-8">
                <div class="card section-card h-100 mb-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h6><i class="fas fa-newspaper"></i> Info Divisi</h6>
                            <small>Berita acara terbaru</small>
                        </div>
                        @can('admin')
                            <a href="{{ url('/berita-acara/' . $Divisi->id) }}" class="btn btn-add">
                                <i class="fas fa-plus me-1"></i> Kelola
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @forelse ($beritaAcara as $item)
                            <div class="berita-item">
                                <div>
                                    <p class="berita-title">{{ $item->judul }}</p>
                                    <span class="berita-date">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                <button type="button" class="btn btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#beritaModal{{ $item->id }}">
                                    Detail
                                </button>
                            </div>

                            <!-- Modal Berita -->
                            <div class="modal fade" id="beritaModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content shadow-lg">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $item->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted mb-3" style="font-size: 0.85rem;">
                                                <i class="fas fa-calendar-alt me-1"></i>
                                                {{ $item->created_at->format('d M Y, H:i') }}
                                            </p>
                                            <div style="line-height: 1.7; color: #2d3748;">
                                                {!! nl2br(e($item->deskripsi)) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-modal-close" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="fas fa-newspaper d-block mb-2" style="font-size: 2rem; color: #cbd5e0;"></i>
                                Belum ada berita untuk divisi ini.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Belum Diverifikasi (Admin Only) -->
        @can('admin')
            @if($Laporan->where('isVerif', '!=', 1)->count() > 0)
            <div class="card section-card">
                <div class="card-header">
                    <h6><i class="fas fa-clock"></i> Laporan Menunggu Verifikasi</h6>
                    <small>{{ $Laporan->where('isVerif', '!=', 1)->count() }} laporan perlu ditinjau</small>
                </div>
                <div class="card-body">
                    @foreach ($Laporan->where('isVerif', '!=', 1) as $item)
                        <div class="laporan-item">
                            <div class="laporan-header">
                                <span class="laporan-name">{{ $item->user->name }}</span>
                                <span class="badge-waiting">Menunggu Verifikasi</span>
                            </div>
                            <p class="laporan-date">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $item->created_at->isoFormat('D') }} - {{ $item->created_at->addDays(6)->isoFormat('D MMM Y') }}
                            </p>
                            <button type="button" class="btn btn-detail" data-bs-toggle="modal"
                                data-bs-target="#laporanModal-{{ $item->id }}">
                                <i class="fas fa-eye me-1"></i> Lihat Detail
                            </button>
                        </div>

                        <!-- Modal Laporan -->
                        <div class="modal fade" id="laporanModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content shadow-lg">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Laporan - {{ $item->user->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-3">
                                            <strong>Periode:</strong>
                                            {{ $item->created_at->isoFormat('D MMM') }} - {{ $item->created_at->addDays(6)->isoFormat('D MMM Y') }}
                                        </p>

                                        @if($item->mingguan)
                                            <div class="mb-3">
                                                <p class="mb-2"><strong><i class="fas fa-calendar-week me-1"></i> Laporan Mingguan:</strong></p>
                                                <div style="background: #edf2f7; border-radius: 8px; padding: 1rem; line-height: 1.7;">
                                                    {!! $item->mingguan !!}
                                                </div>
                                            </div>
                                        @endif

                                        <p class="mb-2"><strong><i class="fas fa-list me-1"></i> Laporan Harian:</strong></p>
                                        @php
                                            $days = [
                                                'senin' => 'Senin',
                                                'selasa' => 'Selasa',
                                                'rabu' => 'Rabu',
                                                'kamis' => 'Kamis',
                                                'jumat' => 'Jumat'
                                            ];
                                        @endphp
                                        @foreach($days as $key => $day)
                                            <div style="background: #f7fafc; border-radius: 8px; padding: 0.75rem 1rem; margin-bottom: 0.5rem;">
                                                <strong style="color: #4a5568;">{{ $day }}:</strong>
                                                <span style="color: {{ $item->$key ? '#2d3748' : '#a0aec0' }};">
                                                    @if($item->$key)
                                                        {!! Str::limit(strip_tags($item->$key), 100) !!}
                                                    @else
                                                        <em>Belum diisi</em>
                                                    @endif
                                                </span>
                                            </div>
                                        @endforeach

                                        <div class="mt-3 d-flex justify-content-between align-items-center">
                                            <a href="{{ route('showLaporan', $item->id) }}" class="btn btn-detail">
                                                <i class="fas fa-external-link-alt me-1"></i> Lihat Detail Lengkap
                                            </a>
                                        </div>

                                        <!-- Form Verifikasi -->
                                        <hr class="my-3">
                                        <form action="{{ route('veriflaporan', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label class="form-label fw-bold" style="color: #2d3748;">
                                                    <i class="fas fa-clipboard-check me-1"></i> Verifikasi Laporan
                                                </label>
                                                <div class="form-check p-3 rounded" style="background: #c6f6d5;">
                                                    <input class="form-check-input" type="checkbox" name="isVerif" id="approve-{{ $item->id }}"
                                                           onchange="toggleRevision({{ $item->id }})">
                                                    <label class="form-check-label fw-bold" for="approve-{{ $item->id }}" style="color: #22543d;">
                                                        <i class="fas fa-check-circle me-1"></i> Setujui Laporan Ini
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="mb-3" id="revisionBox-{{ $item->id }}">
                                                <label class="form-label fw-bold" style="color: #c53030;">
                                                    <i class="fas fa-edit me-1"></i> Atau Minta Revisi
                                                </label>
                                                <textarea class="form-control" name="komentar" rows="3"
                                                          placeholder="Tulis komentar revisi jika laporan perlu diperbaiki..."
                                                          style="border: 1.5px solid #fed7d7; border-radius: 8px;"></textarea>
                                                <small class="text-muted">Kosongkan jika menyetujui laporan</small>
                                            </div>

                                            <div class="d-flex gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-add">
                                                    <i class="fas fa-paper-plane me-1"></i> Kirim Verifikasi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-modal-close" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endcan

        <!-- Daftar Anggota -->
        <div class="card section-card">
            <div class="card-header">
                <h6><i class="fas fa-users"></i> Daftar Anggota</h6>
                <small>Anggota divisi {{ $Divisi->nama_divisi }}</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table member-table mb-0">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                @can('admin')
                                    <th width="220">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Akses_divisi as $item)
                                <tr>
                                    <td><span class="member-number">{{ $loop->iteration }}</span></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    @can('admin')
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ url('destroyAksesDivisi', $item->id) }}"
                                                   class="btn btn-action btn-action-danger"
                                                   onclick="return confirm('Hapus anggota ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ url('penilaian/' . $item->user->id . '/' . $item->divisi->id) }}"
                                                   class="btn btn-action btn-action-secondary">
                                                    <i class="fas fa-star me-1"></i>Nilai
                                                </a>
                                                <a href="{{ url('cetak-nilai/' . $item->user->id . '/' . $item->divisi->id . '/' . $program) }}"
                                                   class="btn btn-action btn-action-info">
                                                    <i class="fas fa-print me-1"></i>Cetak
                                                </a>
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        Belum ada anggota terdaftar di divisi ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleRevision(id) {
            const checkbox = document.getElementById('approve-' + id);
            const revisionBox = document.getElementById('revisionBox-' + id);
            const textarea = revisionBox.querySelector('textarea');

            if (checkbox.checked) {
                revisionBox.style.opacity = '0.5';
                revisionBox.style.pointerEvents = 'none';
                textarea.value = '';
            } else {
                revisionBox.style.opacity = '1';
                revisionBox.style.pointerEvents = 'auto';
            }
        }
    </script>
    @endpush
</x-app-layout>
