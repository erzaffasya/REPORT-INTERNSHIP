<x-app-layout>
    <style>
        .sidebar-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: sticky;
            top: 1rem;
        }

        .sidebar-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.5rem;
            text-align: center;
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .sidebar-avatar img {
            width: 50px;
            height: 50px;
        }

        .sidebar-name {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 0.25rem 0;
        }

        .sidebar-role {
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            margin: 0;
        }

        .sidebar-body {
            padding: 1.25rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid #edf2f7;
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-icon {
            width: 36px;
            height: 36px;
            background: #f7fafc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a5568;
            font-size: 0.9rem;
        }

        .info-label {
            color: #718096;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .info-value {
            color: #1a202c;
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        .content-header {
            margin-bottom: 1.5rem;
        }

        .content-header h4 {
            color: #1a202c;
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0 0 0.25rem 0;
        }

        .content-header p {
            color: #718096;
            font-size: 0.9rem;
            margin: 0;
        }

        .week-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .week-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .week-card-approved {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
        }

        .week-card-pending {
            background: linear-gradient(135deg, #fefcbf 0%, #faf089 100%);
        }

        .week-card-draft {
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
        }

        .week-card-empty {
            background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
        }

        .week-header {
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .week-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 0.25rem 0;
        }

        .week-subtitle {
            color: #4a5568;
            font-size: 0.85rem;
            margin: 0;
        }

        .btn-view {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-view:hover {
            background: #edf2f7;
            color: #1a202c;
        }

        .week-body {
            padding: 0 1.25rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .status-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .status-icon-approved {
            background: rgba(34, 84, 61, 0.15);
            color: #22543d;
        }

        .status-icon-pending {
            background: rgba(183, 121, 31, 0.15);
            color: #b7791f;
        }

        .status-icon-draft {
            background: rgba(197, 48, 48, 0.15);
            color: #c53030;
        }

        .status-icon-empty {
            background: rgba(74, 85, 104, 0.15);
            color: #4a5568;
        }

        .status-text h6 {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        .status-text-approved h6 { color: #22543d; }
        .status-text-pending h6 { color: #b7791f; }
        .status-text-draft h6 { color: #c53030; }
        .status-text-empty h6 { color: #4a5568; }

        .status-text small {
            font-size: 0.8rem;
            color: #4a5568;
        }

        .progress-bar-week {
            display: flex;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }

        .progress-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(0,0,0,0.2);
        }

        .progress-dot.filled {
            background: #22543d;
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

        .btn-create {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-create:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-create:disabled {
            background: #a0aec0;
            cursor: not-allowed;
            transform: none;
        }

        .alert-box {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: #c6f6d5;
            color: #22543d;
        }

        .alert-info {
            background: #bee3f8;
            color: #2b6cb0;
        }

        .alert-error {
            background: #fed7d7;
            color: #c53030;
        }

        .current-week-badge {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="card sidebar-card">
                    <div class="sidebar-header">
                        <div class="sidebar-avatar">
                            <img src="{{ asset('tadmin/assets/img/program-divisi.png') }}" alt="Divisi">
                        </div>
                        <h5 class="sidebar-name">{{ Auth::user()->name }}</h5>
                        <p class="sidebar-role">Peserta Magang</p>
                    </div>
                    <div class="sidebar-body">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-building"></i></div>
                            <div>
                                <p class="info-label">Divisi</p>
                                <p class="info-value">{{ $divisi->nama_divisi }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-briefcase"></i></div>
                            <div>
                                <p class="info-label">Program</p>
                                <p class="info-value">{{ $divisi->program->judul }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-file-alt"></i></div>
                            <div>
                                <p class="info-label">Total Laporan</p>
                                <p class="info-value">{{ $laporan->count() }} Minggu</p>
                            </div>
                        </div>

                        <!-- Tombol Buat Laporan Manual -->
                        <div class="mt-4">
                            @if(!$hasCurrentWeekReport)
                                <form action="{{ route('createLaporanManual', $divisi->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-create w-100">
                                        <i class="fas fa-plus"></i> Buat Laporan Minggu Ini
                                    </button>
                                </form>
                                <small class="text-muted d-block text-center mt-2">
                                    {{ $weekStart->isoFormat('D MMM') }} - {{ $weekStart->addDays(6)->isoFormat('D MMM Y') }}
                                </small>
                            @else
                                <button class="btn btn-create w-100" disabled>
                                    <i class="fas fa-check"></i> Laporan Minggu Ini Sudah Ada
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="content-header">
                    <h4><i class="fas fa-clipboard-list me-2"></i>Laporan Mingguan</h4>
                    <p>Isi laporan harian Senin-Jumat, lalu submit laporan mingguan untuk verifikasi mentor.</p>
                </div>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert-box alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="alert-box alert-info">
                        <i class="fas fa-info-circle"></i>
                        {{ session('info') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert-box alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @forelse ($laporan as $item)
                    @php
                        $cardClass = match ($item->isVerif) {
                            \App\Models\Laporan::STATUS_APPROVED => 'week-card-approved',
                            \App\Models\Laporan::STATUS_SUBMITTED => 'week-card-pending',
                            \App\Models\Laporan::STATUS_REVISION => 'week-card-draft',
                            \App\Models\Laporan::STATUS_NEW => 'week-card-empty',
                            default => 'week-card-empty',
                        };
                        $iconClass = match ($item->isVerif) {
                            \App\Models\Laporan::STATUS_APPROVED => 'status-icon-approved',
                            \App\Models\Laporan::STATUS_SUBMITTED => 'status-icon-pending',
                            \App\Models\Laporan::STATUS_REVISION => 'status-icon-draft',
                            \App\Models\Laporan::STATUS_NEW => 'status-icon-empty',
                            default => 'status-icon-empty',
                        };
                        $textClass = match ($item->isVerif) {
                            \App\Models\Laporan::STATUS_APPROVED => 'status-text-approved',
                            \App\Models\Laporan::STATUS_SUBMITTED => 'status-text-pending',
                            \App\Models\Laporan::STATUS_REVISION => 'status-text-draft',
                            \App\Models\Laporan::STATUS_NEW => 'status-text-empty',
                            default => 'status-text-empty',
                        };
                        $icon = match ($item->isVerif) {
                            \App\Models\Laporan::STATUS_APPROVED => 'fas fa-check-circle',
                            \App\Models\Laporan::STATUS_SUBMITTED => 'fas fa-clock',
                            \App\Models\Laporan::STATUS_REVISION => 'fas fa-exclamation-circle',
                            \App\Models\Laporan::STATUS_NEW => 'fas fa-edit',
                            default => 'fas fa-edit',
                        };

                        // Gunakan week_start_date jika ada, fallback ke created_at
                        $weekStart = $item->week_start_date ?? $item->created_at;
                        $weekEnd = $item->week_end_date ?? $item->created_at->addDays(6);

                        // Cek apakah ini minggu saat ini
                        $isCurrentWeek = $item->week_start_date &&
                            $item->week_start_date->format('Y-m-d') === \App\Models\Laporan::getMondayOfWeek()->format('Y-m-d');
                    @endphp

                    <div class="card week-card {{ $cardClass }}">
                        <div class="week-header">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <h5 class="week-title">
                                        Minggu ke-{{ $loop->iteration }}
                                    </h5>
                                    @if($isCurrentWeek)
                                        <span class="current-week-badge">Minggu Ini</span>
                                    @endif
                                </div>
                                <p class="week-subtitle">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ $weekStart->isoFormat('D MMM') }} - {{ $weekEnd->isoFormat('D MMM Y') }}
                                </p>
                            </div>
                            <a href="{{ route('showLaporan', $item->id) }}" class="btn btn-view">
                                <i class="fas fa-eye me-1"></i> Lihat Detail
                            </a>
                        </div>
                        <div class="week-body">
                            <div class="status-icon {{ $iconClass }}">
                                <i class="{{ $icon }}"></i>
                            </div>
                            <div class="status-text {{ $textClass }}">
                                <h6>{{ $item->status_label }}</h6>
                                <small>{{ $item->filled_days_count }}/5 hari terisi</small>
                                <div class="progress-bar-week">
                                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $day)
                                        <span class="progress-dot {{ $item->$day != null ? 'filled' : '' }}"></span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-clipboard-list d-block"></i>
                        <p class="mb-3">Belum ada laporan mingguan.</p>
                        @if(!$hasCurrentWeekReport)
                            <form action="{{ route('createLaporanManual', $divisi->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-create">
                                    <i class="fas fa-plus"></i> Buat Laporan Minggu Ini
                                </button>
                            </form>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
