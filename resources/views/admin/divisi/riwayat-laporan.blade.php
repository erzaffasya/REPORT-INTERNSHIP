<x-app-layout>
    <style>
        .page-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            color: #fff;
        }

        .page-header h4 {
            font-weight: 700;
            margin: 0 0 0.25rem 0;
        }

        .page-header p {
            color: rgba(255,255,255,0.8);
            margin: 0;
            font-size: 0.9rem;
        }

        .btn-back {
            background: rgba(255,255,255,0.15);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.25);
            color: #fff;
        }

        .filter-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
        }

        .filter-card .card-body {
            padding: 1.25rem;
        }

        .report-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .report-table {
            margin: 0;
        }

        .report-table thead th {
            background: #f7fafc;
            color: #4a5568;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.25rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .report-table tbody td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            font-size: 0.9rem;
            color: #2d3748;
        }

        .report-table tbody tr:hover {
            background: #f7fafc;
        }

        .report-number {
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

        .badge-approved {
            background: #c6f6d5;
            color: #22543d;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-waiting {
            background: #faf5e6;
            color: #b7791f;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-revision {
            background: #fed7d7;
            color: #c53030;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .btn-view {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-view:hover {
            background: #4a5568;
            color: #fff;
        }

        .progress-dots {
            display: flex;
            gap: 4px;
        }

        .progress-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #e2e8f0;
        }

        .progress-dot.filled {
            background: #48bb78;
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

        .btn-add {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-add:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
        }

        .day-item {
            background: #f7fafc;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
        }

        .day-item:last-child {
            margin-bottom: 0;
        }
    </style>

    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h4><i class="fas fa-history me-2"></i>Riwayat Laporan</h4>
                    <p>{{ $Divisi->nama_divisi }} - {{ $Laporan->count() }} total laporan</p>
                </div>
                <a href="{{ url('Program/' . $program . '/Divisi/' . $Divisi->id) }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Filter -->
        <div class="card filter-card">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="fw-bold text-secondary" style="font-size: 0.85rem;">
                            <i class="fas fa-filter me-1"></i> Filter:
                        </label>
                    </div>
                    <div class="col-md-3">
                        <select id="filterUser" class="form-select" style="border-radius: 8px;">
                            <option value="all">Semua Anggota</option>
                            @foreach($Akses_divisi as $member)
                                <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select id="filterStatus" class="form-select" style="border-radius: 8px;">
                            <option value="all">Semua Status</option>
                            <option value="1">Disetujui</option>
                            <option value="2">Menunggu</option>
                            <option value="0">Revisi</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <span id="resultCount" class="badge bg-secondary">{{ $Laporan->count() }} laporan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Table -->
        <div class="card report-card">
            @if($Laporan->count() > 0)
            <div class="table-responsive">
                <table class="table report-table mb-0">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th width="120" class="text-center">Progress</th>
                            <th width="120" class="text-center">Status</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Laporan as $report)
                            @php
                                $filledDays = collect(['senin', 'selasa', 'rabu', 'kamis', 'jumat'])
                                    ->filter(fn($day) => $report->$day != null)->count();
                                $statusClass = match($report->isVerif) {
                                    1 => 'badge-approved',
                                    2 => 'badge-waiting',
                                    default => 'badge-revision'
                                };
                                $statusText = match($report->isVerif) {
                                    1 => 'Disetujui',
                                    2 => 'Menunggu',
                                    default => 'Revisi'
                                };
                            @endphp
                            <tr class="report-row" data-user="{{ $report->user_id }}" data-status="{{ $report->isVerif }}">
                                <td><span class="report-number">{{ $loop->iteration }}</span></td>
                                <td>
                                    <span class="fw-semibold">{{ $report->user->name }}</span>
                                    <br>
                                    <small class="text-muted">{{ $report->user->email }}</small>
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $report->created_at->isoFormat('D MMM') }} - {{ $report->created_at->addDays(6)->isoFormat('D MMM Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted">Minggu ke-{{ $loop->iteration }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="progress-dots justify-content-center">
                                        @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $day)
                                            <span class="progress-dot {{ $report->$day ? 'filled' : '' }}"
                                                  title="{{ ucfirst($day) }}"></span>
                                        @endforeach
                                    </div>
                                    <small class="text-muted">{{ $filledDays }}/5 hari</small>
                                </td>
                                <td class="text-center">
                                    <span class="{{ $statusClass }}">{{ $statusText }}</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-view"
                                            data-bs-toggle="modal" data-bs-target="#reportModal-{{ $report->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="reportModal-{{ $report->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content shadow-lg">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-file-alt me-2"></i>{{ $report->user->name }}
                                                <span class="{{ $statusClass }} ms-2">{{ $statusText }}</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 p-3 rounded" style="background: #edf2f7;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Periode</small>
                                                        <p class="fw-bold mb-0">
                                                            {{ $report->created_at->isoFormat('D MMM') }} - {{ $report->created_at->addDays(6)->isoFormat('D MMM Y') }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Progress</small>
                                                        <p class="fw-bold mb-0">{{ $filledDays }}/5 hari terisi</p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($report->mingguan)
                                                <div class="mb-3">
                                                    <label class="fw-bold text-secondary mb-2">
                                                        <i class="fas fa-calendar-week me-1"></i> Laporan Mingguan
                                                    </label>
                                                    <div style="background: #f0fff4; border-radius: 8px; padding: 1rem; border-left: 4px solid #48bb78;">
                                                        {!! $report->mingguan !!}
                                                    </div>
                                                </div>
                                            @endif

                                            <label class="fw-bold text-secondary mb-2">
                                                <i class="fas fa-list me-1"></i> Laporan Harian
                                            </label>
                                            @php
                                                $dayNames = [
                                                    'senin' => ['name' => 'Senin', 'date' => $report->created_at],
                                                    'selasa' => ['name' => 'Selasa', 'date' => $report->created_at->copy()->addDay()],
                                                    'rabu' => ['name' => 'Rabu', 'date' => $report->created_at->copy()->addDays(2)],
                                                    'kamis' => ['name' => 'Kamis', 'date' => $report->created_at->copy()->addDays(3)],
                                                    'jumat' => ['name' => 'Jumat', 'date' => $report->created_at->copy()->addDays(4)],
                                                ];
                                            @endphp
                                            @foreach($dayNames as $key => $day)
                                                <div class="day-item">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <strong style="color: #2d3748;">{{ $day['name'] }}</strong>
                                                            <small class="text-muted ms-2">{{ $day['date']->isoFormat('D MMM') }}</small>
                                                        </div>
                                                        @if($report->$key)
                                                            <span class="badge bg-success" style="font-size: 0.65rem;">Terisi</span>
                                                        @else
                                                            <span class="badge bg-secondary" style="font-size: 0.65rem;">Kosong</span>
                                                        @endif
                                                    </div>
                                                    @if($report->$key)
                                                        <div class="mt-2" style="color: #4a5568; font-size: 0.9rem;">
                                                            {!! Str::limit(strip_tags($report->$key), 150) !!}
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach

                                            <div class="mt-3 d-flex justify-content-end">
                                                <a href="{{ route('showLaporan', $report->id) }}" class="btn btn-add">
                                                    <i class="fas fa-external-link-alt me-1"></i> Lihat Detail Lengkap
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-modal-close" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-file-alt d-block"></i>
                <p>Belum ada laporan untuk divisi ini.</p>
            </div>
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterUser = document.getElementById('filterUser');
            const filterStatus = document.getElementById('filterStatus');
            const resultCount = document.getElementById('resultCount');

            function applyFilters() {
                const userVal = filterUser.value;
                const statusVal = filterStatus.value;
                const rows = document.querySelectorAll('.report-row');
                let visibleCount = 0;

                rows.forEach(row => {
                    const userId = row.dataset.user;
                    const status = row.dataset.status;

                    const userMatch = userVal === 'all' || userId === userVal;
                    const statusMatch = statusVal === 'all' || status === statusVal;

                    if (userMatch && statusMatch) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update row numbers
                let visibleIndex = 1;
                rows.forEach(row => {
                    if (row.style.display !== 'none') {
                        const numSpan = row.querySelector('.report-number');
                        if (numSpan) numSpan.textContent = visibleIndex++;
                    }
                });

                // Update count badge
                resultCount.textContent = visibleCount + ' laporan';
            }

            filterUser.addEventListener('change', applyFilters);
            filterStatus.addEventListener('change', applyFilters);
        });
    </script>
    @endpush
</x-app-layout>
