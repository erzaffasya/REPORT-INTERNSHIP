<x-app-layout>
    <style>
        .welcome-card {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-card h2 {
            color: #fff;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
        }

        .welcome-card p {
            color: rgba(255,255,255,0.85);
            font-size: 1rem;
            margin: 0;
        }

        .welcome-date {
            background: rgba(255,255,255,0.15);
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .welcome-avatar {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
        }

        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card .card-body {
            padding: 1.5rem;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fff;
        }

        .stat-icon-program {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
        }

        .stat-icon-divisi {
            background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
        }

        .stat-icon-user {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }

        .stat-icon-laporan {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
        }

        .stat-label {
            color: #718096;
            font-size: 0.85rem;
            font-weight: 500;
            margin: 0 0 0.25rem 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            color: #1a202c;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }

        .stat-trend {
            font-size: 0.8rem;
            color: #48bb78;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }

        .quick-actions {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .quick-actions .card-header {
            background: #fff;
            border-bottom: 1px solid #edf2f7;
            padding: 1.25rem 1.5rem;
        }

        .quick-actions .card-header h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-actions .card-body {
            padding: 1.5rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            background: #f7fafc;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 0.75rem;
        }

        .action-btn:last-child {
            margin-bottom: 0;
        }

        .action-btn:hover {
            background: #edf2f7;
            transform: translateX(4px);
        }

        .action-btn .icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
        }

        .action-btn .text h6 {
            color: #1a202c;
            font-weight: 600;
            font-size: 0.95rem;
            margin: 0 0 0.15rem 0;
        }

        .action-btn .text p {
            color: #718096;
            font-size: 0.8rem;
            margin: 0;
        }

        .action-btn .arrow {
            margin-left: auto;
            color: #a0aec0;
            transition: transform 0.2s ease;
        }

        .action-btn:hover .arrow {
            transform: translateX(4px);
            color: #4a5568;
        }

        .info-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .info-card .card-header {
            background: #fff;
            border-bottom: 1px solid #edf2f7;
            padding: 1.25rem 1.5rem;
        }

        .info-card .card-header h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card .card-body {
            padding: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
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

        .info-item .icon {
            width: 40px;
            height: 40px;
            background: #f7fafc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4a5568;
            font-size: 1rem;
        }

        .info-item .text h6 {
            color: #1a202c;
            font-weight: 600;
            font-size: 0.9rem;
            margin: 0 0 0.1rem 0;
        }

        .info-item .text p {
            color: #718096;
            font-size: 0.8rem;
            margin: 0;
        }
    </style>

    <div class="container-fluid py-4">
        <!-- Welcome Header -->
        <div class="welcome-card">
            <div class="welcome-content d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p>Berikut ringkasan aktivitas magang terbaru di sistem.</p>
                    <div class="welcome-date">
                        <i class="fas fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </div>
                </div>
                <div class="welcome-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="stat-label">Total Program</p>
                                <h3 class="stat-value">{{ $Program }}</h3>
                                <div class="stat-trend">
                                    <i class="fas fa-briefcase"></i>
                                    <span>Program Aktif</span>
                                </div>
                            </div>
                            <div class="stat-icon stat-icon-program">
                                <i class="fas fa-folder-open"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="stat-label">Total Divisi</p>
                                <h3 class="stat-value">{{ $Divisi }}</h3>
                                <div class="stat-trend">
                                    <i class="fas fa-sitemap"></i>
                                    <span>Divisi Tersedia</span>
                                </div>
                            </div>
                            <div class="stat-icon stat-icon-divisi">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="stat-label">Total Mahasiswa</p>
                                <h3 class="stat-value">{{ $User }}</h3>
                                <div class="stat-trend">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Peserta Magang</span>
                                </div>
                            </div>
                            <div class="stat-icon stat-icon-user">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="stat-label">Total Laporan</p>
                                <h3 class="stat-value">{{ $Laporan }}</h3>
                                <div class="stat-trend">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Laporan Masuk</span>
                                </div>
                            </div>
                            <div class="stat-icon stat-icon-laporan">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Info -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card quick-actions h-100">
                    <div class="card-header">
                        <h5><i class="fas fa-bolt"></i> Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('Program.index') }}" class="action-btn">
                            <div class="icon"><i class="fas fa-folder-open"></i></div>
                            <div class="text">
                                <h6>Lihat Program</h6>
                                <p>Kelola program magang yang tersedia</p>
                            </div>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                        @can('admin')
                        <a href="{{ url('user') }}" class="action-btn">
                            <div class="icon"><i class="fas fa-users"></i></div>
                            <div class="text">
                                <h6>Kelola Pengguna</h6>
                                <p>Tambah atau ubah data pengguna</p>
                            </div>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                        <a href="{{ route('talent.index') }}" class="action-btn">
                            <div class="icon"><i class="fas fa-star"></i></div>
                            <div class="text">
                                <h6>Kelola Bakat</h6>
                                <p>Atur kategori bakat peserta</p>
                            </div>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card info-card h-100">
                    <div class="card-header">
                        <h5><i class="fas fa-info-circle"></i> Informasi Sistem</h5>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-user"></i></div>
                            <div class="text">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-shield-alt"></i></div>
                            <div class="text">
                                <h6>Role: {{ ucfirst(Auth::user()->role) }}</h6>
                                <p>Hak akses pengguna saat ini</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-clock"></i></div>
                            <div class="text">
                                <h6>{{ \Carbon\Carbon::now()->format('H:i') }} WIB</h6>
                                <p>Waktu server saat ini</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-code-branch"></i></div>
                            <div class="text">
                                <h6>Report Harian KG</h6>
                                <p>Sistem Manajemen Magang v1.0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
