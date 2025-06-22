<x-app-layout>
    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="background-color: #f8f9fc;">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center px-4 py-3">
                    <div>
                        <h4 class="fw-bold mb-1 text-dark">Selamat Datang, {{ Auth::user()->name }} 👋</h4>
                        <p class="text-muted mb-0">Berikut ringkasan aktivitas magang terbaru.</p>
                    </div>
                    <div class="icon icon-shape bg-gradient-primary text-white text-center rounded-circle shadow">
                        <i class="ni ni-hat-3 text-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row">
        @php
            $cards = [
                ['title' => 'Total Program', 'value' => $Program, 'icon' => 'ni ni-folder-17', 'bg' => 'bg-gradient-primary'],
                ['title' => 'Total Divisi', 'value' => $Divisi, 'icon' => 'ni ni-collection', 'bg' => 'bg-gradient-info'],
                ['title' => 'Total Mahasiswa', 'value' => $User, 'icon' => 'ni ni-single-02', 'bg' => 'bg-gradient-success'],
                ['title' => 'Total Laporan', 'value' => $Laporan, 'icon' => 'ni ni-archive-2', 'bg' => 'bg-gradient-warning'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center justify-content-between px-4 py-3">
                        <div>
                            <p class="text-muted mb-1">{{ $card['title'] }}</p>
                            <h4 class="mb-0 fw-bold">{{ $card['value'] }}</h4>
                        </div>
                        <div class="icon icon-shape {{ $card['bg'] }} text-white text-center rounded-circle shadow-sm">
                            <i class="{{ $card['icon'] }} text-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chart Sections -->
    {{-- <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h6 class="mb-0 text-dark">📊 Statistik Aktivitas</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted">Grafik atau chart bisa kamu tempatkan di sini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h6 class="mb-0 text-dark">📈 Performa Bulanan</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted">Tampilkan grafik laporan bulanan di sini.</p>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
