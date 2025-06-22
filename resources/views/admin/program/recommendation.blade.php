<x-app-layout>
    <div class="container-fluid py-4">
        <!-- Rekomendasi Divisi -->
        <div class="row">
            <div class="col-11">
                <div class="card shadow border-0">
                    <div class="card-header bg-white pb-0">
                        <h5 class="fw-bold mb-1 text-primary">Rekomendasi Divisi</h5>
                        <p class="text-muted mb-0">Divisi berikut direkomendasikan berdasarkan minat, kompetensi, dan hasil asesmen peserta. Pilihan ini bertujuan untuk memaksimalkan potensi serta kesesuaian peran dalam program magang.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($recommendedDepartments as $item)
                                <div class="col-xl-4 col-md-6 mb-4 mt-2">
                                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-center">
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

                                        <!-- Footer Aksi -->
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <span class="text-muted small">Skor Kecocokan: <strong class="text-dark">{{ $item['score'] }}</strong></span>
                                            <form action="{{ url('storeAksesDivisi') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                <input type="hidden" name="divisi_id" value="{{ $item['divisi']->id }}">
                                                <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill px-3">Pilih Divisi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> <!-- row -->
                    </div> <!-- card-body -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
