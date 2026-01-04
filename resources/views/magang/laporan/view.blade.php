<x-app-layout>
    @php
        // Gunakan week_start_date jika ada, fallback ke created_at
        $weekStart = $laporan->week_start_date ?? $laporan->created_at;
        $weekEnd = $laporan->week_end_date ?? $laporan->created_at->addDays(6);
    @endphp

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

        .sidebar-header h5 {
            color: #fff;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 0.5rem 0;
        }

        .sidebar-header h4 {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
        }

        .sidebar-body {
            padding: 1.25rem;
        }

        .btn-back {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.6rem 1rem;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #2d3748;
        }

        .revision-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .revision-box h6 {
            color: #c53030;
            font-size: 0.85rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .revision-box p {
            color: #7f1d1d;
            font-size: 0.875rem;
            margin: 0;
            line-height: 1.6;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .status-badge-approved {
            background: #c6f6d5;
            color: #22543d;
        }

        .status-badge-pending {
            background: #fefcbf;
            color: #b7791f;
        }

        .status-badge-revision {
            background: #fed7d7;
            color: #c53030;
        }

        .status-badge-new {
            background: #edf2f7;
            color: #4a5568;
        }

        .status-badge i {
            font-size: 1rem;
        }

        .status-badge span {
            font-size: 0.85rem;
            font-weight: 600;
        }

        .progress-info {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .progress-info h6 {
            font-size: 0.8rem;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 0.5rem 0;
        }

        .progress-info .progress-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }

        .progress-dots {
            display: flex;
            gap: 0.35rem;
            margin-top: 0.5rem;
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

        .btn-submit-weekly {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.75rem 1rem;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            transition: all 0.2s ease;
        }

        .btn-submit-weekly:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
        }

        .btn-submit-weekly:disabled {
            background: #e2e8f0;
            color: #a0aec0;
            cursor: not-allowed;
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

        .weekly-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
        }

        .weekly-card .card-header {
            background: transparent;
            padding: 1.25rem;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .weekly-card .card-header h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .badge-weekly {
            background: #2d3748;
            color: #fff;
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .weekly-card .card-body {
            padding: 0 1.25rem 1.25rem;
        }

        .weekly-content {
            background: #fff;
            border-radius: 10px;
            padding: 1rem;
            line-height: 1.7;
            color: #2d3748;
        }

        .day-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .day-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .day-card-approved {
            background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%);
        }

        .day-card-pending {
            background: linear-gradient(135deg, #fffaf0 0%, #fefcbf 100%);
        }

        .day-card-draft {
            background: linear-gradient(135deg, #fff5f5 0%, #fed7d7 100%);
        }

        .day-card-new {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        }

        .day-card-empty {
            background: #f7fafc;
        }

        .day-card .card-header {
            background: transparent;
            padding: 1rem 1.25rem;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .day-card .card-header h5 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .badge-daily {
            background: #4a5568;
            color: #fff;
            padding: 0.25rem 0.6rem;
            border-radius: 5px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .day-card .card-body {
            padding: 0 1.25rem 1.25rem;
        }

        .day-content {
            background: rgba(255,255,255,0.7);
            border-radius: 8px;
            padding: 1rem;
            line-height: 1.7;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .empty-day-hint {
            color: #a0aec0;
            font-size: 0.875rem;
            font-style: italic;
            margin-bottom: 0.75rem;
        }

        .btn-create-report {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 8px;
            float: right;
        }

        .btn-create-report:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
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

        .btn-modal-save {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="card sidebar-card">
                    <div class="sidebar-header">
                        <h5>Laporan Monitoring</h5>
                        <h4>{{ $weekStart->isoFormat('D MMM') }} - {{ $weekEnd->isoFormat('D MMM Y') }}</h4>
                    </div>
                    <div class="sidebar-body">
                        <a href="{{ route('indexLaporan', $laporan->divisi_id) }}" class="btn btn-back">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                        <!-- Status Badge -->
                        @php
                            $statusBadgeClass = match ($laporan->isVerif) {
                                \App\Models\Laporan::STATUS_APPROVED => 'status-badge-approved',
                                \App\Models\Laporan::STATUS_SUBMITTED => 'status-badge-pending',
                                \App\Models\Laporan::STATUS_REVISION => 'status-badge-revision',
                                \App\Models\Laporan::STATUS_NEW => 'status-badge-new',
                                default => 'status-badge-new',
                            };
                            $statusIcon = match ($laporan->isVerif) {
                                \App\Models\Laporan::STATUS_APPROVED => 'fas fa-check-circle',
                                \App\Models\Laporan::STATUS_SUBMITTED => 'fas fa-clock',
                                \App\Models\Laporan::STATUS_REVISION => 'fas fa-exclamation-circle',
                                \App\Models\Laporan::STATUS_NEW => 'fas fa-edit',
                                default => 'fas fa-edit',
                            };
                        @endphp
                        <div class="status-badge {{ $statusBadgeClass }}">
                            <i class="{{ $statusIcon }}"></i>
                            <span>{{ $laporan->status_label }}</span>
                        </div>

                        <!-- Progress Info -->
                        <div class="progress-info">
                            <h6>Progress Harian</h6>
                            <p class="progress-text">{{ $laporan->filled_days_count }}/5 Hari</p>
                            <div class="progress-dots">
                                @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $day)
                                    <span class="progress-dot {{ $laporan->$day != null ? 'filled' : '' }}"></span>
                                @endforeach
                            </div>
                        </div>

                        @if ($laporan->isVerif == \App\Models\Laporan::STATUS_REVISION && $laporan->komentar != null)
                            <div class="revision-box">
                                <h6><i class="fas fa-exclamation-circle"></i> Revisi Diperlukan</h6>
                                <p>{{ $laporan->komentar }}</p>
                            </div>
                        @endif

                        @php
                            // Bisa submit jika: (semua hari terisi ATAU status revisi) DAN belum approved
                            $canSubmit = (
                                ($laporan->filled_days_count >= 5 && $laporan->mingguan == null) ||
                                $laporan->isVerif == \App\Models\Laporan::STATUS_REVISION
                            ) && $laporan->isVerif != \App\Models\Laporan::STATUS_APPROVED;
                        @endphp

                        @if ($canSubmit)
                            <button class="btn btn-submit-weekly" data-bs-toggle="modal" data-bs-target="#mingguanModal-{{ $laporan->id }}">
                                <i class="fas fa-paper-plane me-2"></i>Submit Laporan Mingguan
                            </button>
                        @elseif ($laporan->isVerif == \App\Models\Laporan::STATUS_APPROVED)
                            <button class="btn btn-submit-weekly" disabled>
                                <i class="fas fa-check me-2"></i>Laporan Disetujui
                            </button>
                        @elseif ($laporan->isVerif == \App\Models\Laporan::STATUS_SUBMITTED)
                            <button class="btn btn-submit-weekly" disabled>
                                <i class="fas fa-clock me-2"></i>Menunggu Verifikasi
                            </button>
                        @else
                            <button class="btn btn-submit-weekly" disabled>
                                <i class="fas fa-edit me-2"></i>Lengkapi Laporan Harian
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="content-header">
                    <h4><i class="fas fa-file-alt me-2"></i>Detail Laporan</h4>
                    <p>Isi laporan harian dari Senin sampai Jumat, kemudian submit laporan mingguan.</p>
                </div>

                <!-- Laporan Mingguan -->
                @if ($laporan->mingguan != null)
                    <div class="card weekly-card">
                        <div class="card-header">
                            <h5><i class="fas fa-calendar-week me-2"></i>Laporan Mingguan</h5>
                            <span class="badge-weekly">Rangkuman</span>
                        </div>
                        <div class="card-body">
                            <div class="weekly-content">
                                {!! $laporan->mingguan !!}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Laporan Harian -->
                @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $index => $day)
                    @php
                        $cardClass = 'day-card-empty';
                        if ($laporan->$day != null) {
                            $cardClass = match ($laporan->isVerif) {
                                \App\Models\Laporan::STATUS_APPROVED => 'day-card-approved',
                                \App\Models\Laporan::STATUS_SUBMITTED => 'day-card-pending',
                                \App\Models\Laporan::STATUS_REVISION => 'day-card-draft',
                                \App\Models\Laporan::STATUS_NEW => 'day-card-new',
                                default => 'day-card-new',
                            };
                        }

                        $prev = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'][$index - 1] ?? null;

                        // Bisa edit jika:
                        // - Hari sebelumnya sudah diisi (atau ini hari pertama)
                        // - DAN (belum diisi ATAU status revisi ATAU status new)
                        $canEdit = ($prev == null || $laporan->$prev != null) &&
                            ($laporan->$day == null ||
                             $laporan->isVerif == \App\Models\Laporan::STATUS_REVISION ||
                             $laporan->isVerif == \App\Models\Laporan::STATUS_NEW);
                    @endphp

                    <div class="card day-card {{ $cardClass }}">
                        <div class="card-header">
                            <h5>{{ $weekStart->copy()->addDays($index)->isoFormat('dddd, D MMMM Y') }}</h5>
                            <span class="badge-daily">{{ ucfirst($day) }}</span>
                        </div>
                        <div class="card-body">
                            @if ($laporan->$day != null)
                                <div class="day-content">
                                    {!! $laporan->$day !!}
                                </div>
                            @else
                                <p class="empty-day-hint">Belum ada laporan untuk hari ini.</p>
                            @endif

                            @if ($canEdit)
                                <button class="btn btn-create-report" data-bs-toggle="modal" data-bs-target="#{{ $day }}Modal-{{ $laporan->id }}">
                                    <i class="fas fa-edit me-1"></i> {{ $laporan->$day != null ? 'Edit' : 'Buat' }} Laporan
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Modal Hari -->
                    <div class="modal fade" id="{{ $day }}Modal-{{ $laporan->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content shadow-lg">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fas fa-edit me-2"></i>Laporan {{ ucfirst($day) }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('updateLaporan', $laporan->id) }}" method="POST" onsubmit="tinymce.triggerSave()">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <textarea class="form-control tinymce-editor" name="{{ $day }}" rows="5">{{ $laporan->$day }}</textarea>
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

                <!-- Modal Mingguan -->
                <div class="modal fade" id="mingguanModal-{{ $laporan->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content shadow-lg">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-calendar-week me-2"></i>Laporan Mingguan
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('updateLaporan', $laporan->id) }}" method="POST" onsubmit="tinymce.triggerSave()">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p class="text-muted mb-3">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Rangkum aktivitas dan pencapaian Anda selama minggu ini.
                                    </p>
                                    <textarea class="form-control tinymce-editor" name="mingguan" rows="5">{{ $laporan->mingguan }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-modal-save">
                                        <i class="fas fa-paper-plane me-1"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                width: '100%',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
            });
        </script>
    @endpush
</x-app-layout>
