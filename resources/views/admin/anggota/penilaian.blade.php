<x-app-layout>
    <style>
        .profile-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .profile-content {
            position: relative;
            z-index: 1;
        }

        .profile-avatar {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
        }

        .profile-name {
            color: #fff;
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0 0 0.25rem 0;
        }

        .profile-school {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
            margin: 0;
        }

        .profile-badge {
            background: rgba(255,255,255,0.15);
            color: #fff;
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .assessment-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            height: 100%;
        }

        .assessment-card .card-header {
            background: #fff;
            border-bottom: 2px solid #edf2f7;
            padding: 1.25rem 1.5rem;
        }

        .assessment-card .card-header h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .assessment-card .card-header .badge {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .assessment-card .card-body {
            padding: 1.5rem;
        }

        .assessment-item {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .assessment-item:last-child {
            margin-bottom: 0;
        }

        .assessment-item:hover {
            background: #edf2f7;
        }

        .assessment-number {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .assessment-input {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .assessment-input:focus {
            border-color: #4a5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
            outline: none;
        }

        .assessment-input::placeholder {
            color: #a0aec0;
        }

        .score-input {
            width: 80px;
            text-align: center;
            font-weight: 600;
        }

        .input-hint {
            font-size: 0.7rem;
            color: #718096;
            margin-top: 0.35rem;
        }

        .soft-skill-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            background: #f7fafc;
            border-radius: 10px;
            margin-bottom: 0.75rem;
            transition: all 0.2s ease;
        }

        .soft-skill-item:last-child {
            margin-bottom: 0;
        }

        .soft-skill-item:hover {
            background: #edf2f7;
        }

        .soft-skill-label {
            flex: 1;
            font-size: 0.9rem;
            color: #2d3748;
            font-weight: 500;
        }

        .soft-skill-input {
            width: 70px;
        }

        .summary-card {
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            box-shadow: 0 4px 15px rgba(45, 55, 72, 0.3);
            overflow: hidden;
        }

        .summary-card .card-body {
            padding: 1.5rem;
        }

        .summary-item {
            text-align: center;
            padding: 0 1.5rem;
            border-right: 1px solid rgba(255,255,255,0.15);
        }

        .summary-item:last-child {
            border-right: none;
        }

        .summary-label {
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .summary-value {
            color: #fff;
            font-size: 1.75rem;
            font-weight: 700;
        }

        .btn-save {
            background: #fff;
            color: #2d3748;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 10px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-save:hover {
            background: #edf2f7;
            color: #1a202c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

        .grade-indicator {
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .grade-excellent { background: #c6f6d5; color: #22543d; }
        .grade-good { background: #bee3f8; color: #2b6cb0; }
        .grade-fair { background: #fefcbf; color: #b7791f; }
        .grade-poor { background: #fed7d7; color: #c53030; }
    </style>

    <div class="container-fluid py-4">
        <form method="POST" action="{{ route('penilaian.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $nilai->id }}">

            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-content d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="profile-avatar">
                            {{ strtoupper(substr($nilai->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <h4 class="profile-name">{{ $nilai->user->name }}</h4>
                            <p class="profile-school">{{ $nilai->user->sekolah }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="profile-badge">
                            <i class="fas fa-clipboard-check"></i> Form Penilaian
                        </span>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Pekerjaan Teknis -->
                <div class="col-lg-7">
                    <div class="card assessment-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><i class="fas fa-cogs text-secondary"></i> Pekerjaan Teknis</h5>
                            <span class="badge">5 Poin</span>
                        </div>
                        <div class="card-body">
                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                    $judulField = "judul_$i";
                                    $nilaiField = "nilai_$i";
                                @endphp
                                <div class="assessment-item">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="assessment-number">{{ $i }}</div>
                                        <div class="flex-grow-1">
                                            <div class="row g-2 align-items-center">
                                                <div class="col-lg-9">
                                                    <input type="text"
                                                           class="form-control assessment-input"
                                                           name="judul_{{ $i }}"
                                                           value="{{ $nilai->$judulField }}"
                                                           placeholder="Masukkan poin penilaian teknis">
                                                    <p class="input-hint mb-0">Contoh: Mengoperasikan paket program pengolah angka (spreadsheet/excel)</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="number"
                                                           class="form-control assessment-input score-input"
                                                           name="nilai_{{ $i }}"
                                                           value="{{ $nilai->$nilaiField }}"
                                                           placeholder="Nilai"
                                                           min="0"
                                                           max="100">
                                                    <p class="input-hint mb-0 text-center">0 - 100</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Pekerjaan Non Teknis -->
                <div class="col-lg-5">
                    <div class="card assessment-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><i class="fas fa-user-check text-secondary"></i> Pekerjaan Non Teknis</h5>
                            <span class="badge">5 Poin</span>
                        </div>
                        <div class="card-body">
                            @php
                                $softSkills = [
                                    6 => ['label' => 'Disiplin', 'icon' => 'fas fa-clock'],
                                    7 => ['label' => 'Tanggung Jawab', 'icon' => 'fas fa-shield-alt'],
                                    8 => ['label' => 'Inisiatif', 'icon' => 'fas fa-lightbulb'],
                                    9 => ['label' => 'Kebersihan & Kerapihan', 'icon' => 'fas fa-broom'],
                                    10 => ['label' => 'Keselamatan & Kesehatan Kerja (K3)', 'icon' => 'fas fa-hard-hat'],
                                ];
                            @endphp

                            @foreach ($softSkills as $num => $skill)
                                @php $nilaiField = "nilai_$num"; @endphp
                                <div class="soft-skill-item">
                                    <div class="assessment-number">{{ $num - 5 }}</div>
                                    <i class="{{ $skill['icon'] }} text-secondary"></i>
                                    <span class="soft-skill-label">{{ $skill['label'] }}</span>
                                    <input type="number"
                                           class="form-control assessment-input soft-skill-input"
                                           name="nilai_{{ $num }}"
                                           value="{{ $nilai->$nilaiField }}"
                                           placeholder="Nilai"
                                           min="0"
                                           max="100">
                                </div>
                            @endforeach

                            <div class="mt-4 p-3 rounded" style="background: #edf2f7;">
                                <p class="mb-2 text-sm fw-bold text-secondary">
                                    <i class="fas fa-info-circle me-1"></i> Panduan Penilaian
                                </p>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="grade-indicator grade-excellent">86-100: Sangat Baik</span>
                                    <span class="grade-indicator grade-good">71-85: Baik</span>
                                    <span class="grade-indicator grade-fair">56-70: Cukup</span>
                                    <span class="grade-indicator grade-poor">0-55: Kurang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Footer -->
                <div class="col-12">
                    <div class="card summary-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <div class="d-flex align-items-center">
                                    <div class="summary-item">
                                        <p class="summary-label mb-0">Total Nilai</p>
                                        <p class="summary-value mb-0">{{ $nilai->total ?? 0 }}</p>
                                    </div>
                                    <div class="summary-item">
                                        <p class="summary-label mb-0">Rata-rata</p>
                                        <p class="summary-value mb-0">{{ $nilai->rata_rata ?? 0 }}</p>
                                    </div>
                                    <div class="summary-item border-0">
                                        <p class="summary-label mb-0">Predikat</p>
                                        <p class="summary-value mb-0">
                                            @php
                                                $avg = $nilai->rata_rata ?? 0;
                                                if ($avg >= 86) $predikat = 'A';
                                                elseif ($avg >= 71) $predikat = 'B';
                                                elseif ($avg >= 56) $predikat = 'C';
                                                else $predikat = 'D';
                                            @endphp
                                            {{ $predikat }}
                                        </p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save"></i> Simpan Penilaian
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
