<x-app-layout>
    <style>
        .edit-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .edit-card .card-header {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            padding: 1.25rem 1.5rem;
            border: none;
        }

        .edit-card .card-header h5 {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }

        .edit-card .card-body {
            padding: 1.5rem;
        }

        .user-profile-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 12px 12px 0 0;
        }

        .user-avatar-lg {
            width: 64px;
            height: 64px;
            background: rgba(255,255,255,0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        .user-profile-info h4 {
            color: #fff;
            font-weight: 600;
            margin: 0 0 0.25rem 0;
            font-size: 1.2rem;
        }

        .user-profile-info p {
            color: rgba(255,255,255,0.8);
            margin: 0;
            font-size: 0.9rem;
        }

        .form-label {
            color: #2d3748;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #4a5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
        }

        .form-control[readonly] {
            background-color: #f7fafc;
            color: #718096;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn-save {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            color: #fff;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-save:hover {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(45, 55, 72, 0.3);
            transform: translateY(-1px);
        }

        .btn-back {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #2d3748;
        }

        .btn-add {
            background: #48bb78;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 600;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .btn-add:hover {
            background: #38a169;
            color: #fff;
        }

        .btn-update-talent {
            background: #4a5568;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 600;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .btn-update-talent:hover {
            background: #2d3748;
            color: #fff;
        }

        .talent-section {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .talent-section-title {
            font-size: 0.85rem;
            font-weight: 700;
            color: #4a5568;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .talent-item {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .talent-item:last-child {
            margin-bottom: 0;
        }

        .talent-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
            flex: 1;
        }

        .talent-score-input {
            width: 80px;
            text-align: center;
            border: 1.5px solid #e2e8f0;
            border-radius: 6px;
            padding: 0.4rem;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .talent-score-input:focus {
            border-color: #4a5568;
            outline: none;
        }

        .add-talent-row {
            display: flex;
            gap: 0.75rem;
            align-items: flex-end;
        }

        .add-talent-row > div:first-child {
            flex: 1;
        }

        .add-talent-row > div:nth-child(2) {
            width: 100px;
        }

        .divider {
            height: 1px;
            background: #e2e8f0;
            margin: 1.25rem 0;
        }

        .empty-talent {
            text-align: center;
            padding: 1.5rem;
            color: #718096;
            font-size: 0.9rem;
        }

        .empty-talent i {
            font-size: 2rem;
            color: #cbd5e0;
            margin-bottom: 0.5rem;
            display: block;
        }

        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-badge-admin {
            background: #fed7d7;
            color: #c53030;
        }

        .role-badge-magang {
            background: #c6f6d5;
            color: #22543d;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            .add-talent-row {
                flex-direction: column;
                align-items: stretch;
            }
            .add-talent-row > div:nth-child(2) {
                width: 100%;
            }
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- User Profile & Edit Form -->
            <div class="col-lg-7 col-12 mb-4">
                <div class="card edit-card">
                    <div class="user-profile-header">
                        <div class="user-avatar-lg">
                            {{ strtoupper(substr($User->name, 0, 2)) }}
                        </div>
                        <div class="user-profile-info">
                            <h4>{{ $User->name }}</h4>
                            <p>{{ $User->email }}</p>
                        </div>
                        <span class="role-badge role-badge-{{ $User->role }} ms-auto">
                            {{ $User->role }}
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateUser', $User->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row mb-3">
                                <div>
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" value="{{ $User->name }}" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $User->email }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role" required>
                                    <option value="magang" {{ $User->role == 'magang' ? 'selected' : '' }}>Magang</option>
                                    <option value="admin" {{ $User->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <div>
                                    <label class="form-label">NIM / NIS</label>
                                    <input type="text" class="form-control" name="nim" value="{{ $User->nim }}" placeholder="Masukkan NIM">
                                </div>
                                <div>
                                    <label class="form-label">Jurusan / Kelas</label>
                                    <input type="text" class="form-control" name="kelas" value="{{ $User->kelas }}" placeholder="Masukkan jurusan">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Instansi / Sekolah</label>
                                <input type="text" class="form-control" name="sekolah" value="{{ $User->sekolah }}" placeholder="Masukkan nama instansi">
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ url('user') }}" class="btn btn-back">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Talent Management -->
            <div class="col-lg-5 col-12 mb-4">
                <div class="card edit-card">
                    <div class="card-header">
                        <h5><i class="fas fa-star"></i> Bakat Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <!-- Add New Talent -->
                        <form action="{{ route('addTalentUser', $User->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $User->id }}">
                            <div class="add-talent-row">
                                <div>
                                    <label class="form-label">Tambah Bakat</label>
                                    <select class="form-select" name="talent_id" required>
                                        <option value="" disabled selected>Pilih bakat...</option>
                                        @foreach ($talent as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Score</label>
                                    <input type="number" class="form-control" name="score" placeholder="0-100" min="0" max="100" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="divider"></div>

                        <!-- Existing Talents -->
                        @if($talentUser->count() > 0)
                            <form action="{{ route('updateTalentUser', $User->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $User->id }}">

                                <div class="talent-section">
                                    <div class="talent-section-title">
                                        <i class="fas fa-list"></i> Daftar Bakat ({{ $talentUser->count() }})
                                    </div>

                                    @foreach ($talentUser as $item)
                                        @php
                                            $talentData = $talent->firstWhere('id', $item->talent_id);
                                        @endphp
                                        @if($talentData)
                                            <div class="talent-item">
                                                <span class="talent-name">
                                                    <i class="fas fa-lightbulb text-warning me-2"></i>
                                                    {{ $talentData->name }}
                                                </span>
                                                <input type="number" class="talent-score-input"
                                                    name="talent[{{ $item->talent_id }}]"
                                                    value="{{ $item->score }}"
                                                    min="0" max="100" required>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-update-talent">
                                        <i class="fas fa-sync-alt me-1"></i> Perbarui Semua
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="empty-talent">
                                <i class="fas fa-star"></i>
                                <p>Belum ada bakat yang ditambahkan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
