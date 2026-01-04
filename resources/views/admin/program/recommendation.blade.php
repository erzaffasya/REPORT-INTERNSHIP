<x-app-layout>
    <div class="container-fluid py-4">
        <!-- Rekomendasi Divisi -->
        <div class="row">
            <div class="col-11">
                <div class="card shadow border-0">
                    <div class="card-header bg-white pb-0">
                        <h5 class="fw-bold mb-1 text-primary">Rekomendasi Divisi (Metode SAW)</h5>
                        <p class="text-muted mb-0">Divisi berikut direkomendasikan berdasarkan perhitungan <strong>Simple Additive Weighting (SAW)</strong>. Skor menunjukkan tingkat kesesuaian antara talent peserta dengan kriteria divisi.</p>
                    </div>
                    <div class="card-body">
                        @if($recommendedDepartments->isEmpty())
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Tidak ada divisi yang sesuai dengan kriteria talent peserta.
                            </div>
                        @else
                            <div class="row">
                                @foreach ($recommendedDepartments as $index => $item)
                                    <div class="col-xl-4 col-md-6 mb-4 mt-2">
                                        <div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-center position-relative">
                                            <!-- Ranking Badge -->
                                            <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-{{ $index === 0 ? 'success' : ($index === 1 ? 'primary' : 'secondary') }}" style="margin-left: 30px; margin-top: 15px;">
                                                #{{ $index + 1 }}
                                            </span>

                                            <!-- Icon -->
                                            <div class="mb-3">
                                                <div class="mx-auto bg-light rounded-circle shadow d-flex justify-content-center align-items-center" style="width: 100px; height: 100px;">
                                                    <img src="{{ asset('tadmin/assets/img/program-divisi.png') }}" alt="Divisi Icon" class="img-fluid" style="width: 60px; height: 60px;">
                                                </div>
                                            </div>

                                            <!-- Nama Divisi -->
                                            <h5 class="text-dark fw-semibold mb-2">{{ $item['divisi']->nama_divisi }}</h5>

                                            <!-- Deskripsi Divisi -->
                                            <p class="text-muted small mb-3">
                                                {{ $item['divisi']->detail ?? 'Divisi ini berfokus pada pengembangan keterampilan, pengelolaan program, serta kolaborasi lintas departemen untuk mencapai tujuan organisasi.' }}
                                            </p>

                                            <!-- SAW Score Progress Bar -->
                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <small class="text-muted">Skor Kesesuaian (SAW)</small>
                                                    <small class="fw-bold text-{{ $item['score_percentage'] >= 70 ? 'success' : ($item['score_percentage'] >= 40 ? 'warning' : 'danger') }}">{{ $item['score_percentage'] }}%</small>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-{{ $item['score_percentage'] >= 70 ? 'success' : ($item['score_percentage'] >= 40 ? 'warning' : 'danger') }}" role="progressbar" style="width: {{ $item['score_percentage'] }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Footer Aksi -->
                                            <div class="d-flex justify-content-center align-items-center mt-auto">
                                                <form action="{{ url('storeAksesDivisi') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                    <input type="hidden" name="divisi_id" value="{{ $item['divisi']->id }}">
                                                    <button type="submit" class="btn btn-sm btn-{{ $index === 0 ? 'primary' : 'outline-primary' }} rounded-pill px-3">
                                                        {{ $index === 0 ? 'Pilih (Rekomendasi Terbaik)' : 'Pilih Divisi' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div> <!-- card-body -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
