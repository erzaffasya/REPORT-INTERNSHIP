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

        .btn-cancel {
            background: #fed7d7;
            color: #c53030;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: #fc8181;
            color: #742a2a;
        }

        .talent-section {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1rem;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
        }

        .info-text {
            font-size: 0.8rem;
            color: #718096;
            margin-top: 0.5rem;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Edit Divisi Form -->
            <div class="col-lg-7 col-12 mb-4">
                <div class="card edit-card">
                    <div class="card-header">
                        <h5><i class="fas fa-edit"></i> Ubah Divisi</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Divisi.update', $Divisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="program_id" value="{{ $Divisi->program_id }}">
                            <input type="hidden" name="status" value="{{ $Divisi->status }}">

                            <div class="mb-3">
                                <label class="form-label">Nama Divisi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_divisi"
                                    value="{{ $Divisi->nama_divisi }}" placeholder="Masukkan nama divisi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Detail <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="detail" rows="5"
                                    placeholder="Deskripsi lengkap divisi" required>{{ $Divisi->detail }}</textarea>
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="javascript:history.back()" class="btn btn-cancel">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mapping Bakat -->
            <div class="col-lg-5 col-12 mb-4">
                <div class="card edit-card">
                    <div class="card-header">
                        <h5><i class="fas fa-star"></i> Mapping Bakat</h5>
                    </div>
                    <div class="card-body">
                        <p class="info-text mb-3">
                            <i class="fas fa-info-circle me-1"></i>
                            Tentukan bobot kriteria bakat untuk rekomendasi divisi (0-1)
                        </p>

                        <form action="{{ route('Divisi.update', $Divisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="program_id" value="{{ $Divisi->program_id }}">
                            <input type="hidden" name="status" value="{{ $Divisi->status }}">
                            <input type="hidden" name="nama_divisi" value="{{ $Divisi->nama_divisi }}">
                            <input type="hidden" name="detail" value="{{ $Divisi->detail }}">

                            <div class="talent-section">
                                <div class="talent-section-title">
                                    <i class="fas fa-list"></i> Daftar Kriteria Bakat
                                </div>

                                @foreach ($Talent as $item)
                                    <div class="talent-item">
                                        <span class="talent-name">
                                            <i class="fas fa-lightbulb text-warning"></i>
                                            {{ $item->name }}
                                        </span>
                                        <input type="number" class="talent-score-input"
                                            name="criteria[{{ $item->name }}]"
                                            value="{{ json_decode($Divisi->criteria)->{$item->name} ?? 0 }}"
                                            min="0" max="1" step="0.01" required>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save me-1"></i> Simpan Kriteria
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
