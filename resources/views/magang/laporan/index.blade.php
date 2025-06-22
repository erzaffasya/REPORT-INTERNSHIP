<x-app-layout>
    <main class="main-content max-height-vh-100 h-100">
        <div class="container-fluid my-3 py-3">
            <div class="row mb-5">
                <!-- Sidebar Program Info -->
                <div class="col-lg-3">
                    <div class=" position-sticky top-1">
                        <ul class="nav flex-column bg-white border-radius-lg p-3 shadow-sm">
                            <li class="nav-item my-4">
                                <div class=" text-center px-3 pt-4 pb-3">
                                    <!-- Icon Program -->
                                    <div class="d-flex justify-content-center mb-3">
                                        <div class="bg-light shadow rounded-circle d-flex justify-content-center align-items-center"
                                            style="width: 100px; height: 100px;">
                                            <img src="{{ asset('tadmin/assets/img/program-divisi.png') }}"
                                                alt="Divisi Icon" class="img-fluid" style="width: 60px; height: 60px;">
                                        </div>
                                    </div>

                                    <!-- Info Divisi & User -->
                                    <div class="mb-2">
                                        <h6 class="text-uppercase text-muted mb-1" style="font-size: 0.75rem;">
                                            {{ $divisi->nama_divisi }}
                                        </h6>
                                        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                    </div>

                                    <!-- Info Program -->
                                    <div class="mt-3">
                                        <h6 class="text-uppercase text-muted mb-1" style="font-size: 0.75rem;">Nama
                                            Program</h6>
                                        <hr class="horizontal dark my-2" style="max-width: 80%; margin: 0 auto;">
                                        <h5 class="mb-0">{{ $divisi->program->judul }}</h5>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-9">
                    <div class="card p-3 h-100 border-0 shadow-sm bg-white">
                        @foreach ($laporan as $item)
                            @php
                                $statusColor = match ($item->isVerif) {
                                    1 => '#d1f7d1', // green
                                    2 => '#fff3cd', // yellow
                                    default => '#fde2e2', // red
                                };
                                $textColor = match ($item->isVerif) {
                                    1 => 'text-success',
                                    2 => 'text-warning',
                                    default => 'text-danger',
                                };
                                $icon = match ($item->isVerif) {
                                    1 => 'ni ni-like-2',
                                    2 => 'ni ni-like-2',
                                    default => 'ni ni-ruler-pencil',
                                };
                                $label = match ($item->isVerif) {
                                    1 => 'Disetujui Mentor',
                                    2 => 'Sedang Diverifikasi',
                                    default => 'Belum Disubmit',
                                };
                            @endphp

                            <div class="card mt-4 border-0 shadow-sm"
                                style="background-color: {{ $statusColor }}; border-radius: 16px;">
                                <div class="card-header d-flex justify-content-between align-items-center border-0"
                                    style="background-color: transparent; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                                    <div>
                                        <h5 class="mb-0">{{ $item->created_at->isoFormat('D MMM') }} -
                                            {{ $item->created_at->addDays(6)->isoFormat('D MMM Y') }}</h5>
                                        <p class="text-sm mb-0 text-secondary">Lengkapi laporan harian untuk mengisi
                                            laporan
                                            mingguan</p>
                                    </div>
                                    <a href="{{ route('showLaporan', $item->id) }}"
                                        class="btn bg-gradient-primary btn-sm">Lihat Laporan</a>
                                </div>

                                <div class="card-body d-flex align-items-center"
                                    style="border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                                    <div class="d-flex align-items-center {{ $textColor }}">
                                        <i class="{{ $icon }} fs-4 me-2"></i>
                                        <div>
                                            <span class="fw-bold d-block text-sm">{{ $label }}</span>
                                            <small class="text-xs">Minggu ke-{{ $loop->iteration }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
