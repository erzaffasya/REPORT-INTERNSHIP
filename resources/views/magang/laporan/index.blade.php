<x-app-layout>
  <main class="main-content max-height-vh-100 h-100">
    <div class="container-fluid my-3 py-3">
      <div class="row mb-5">
        <div class="col-lg-3">
          <div class="card position-sticky top-1">
            <ul class="nav flex-column bg-white border-radius-lg p-3">
              <li class="nav-item my-4 text-center">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fas fa-landmark opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">PT. Menara Indonesia</h6>
                    <span class="text-xs">Nama Program</span>
                    <hr class="horizontal dark my-2">
                    <h5 class="mb-0">{{ $divisi->program->judul }}</h5>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 mt-lg-0 mt-4">
          <!-- Card Profile -->
          <div class="card card-body" id="profile">
            <div class="row justify-content-center align-items-center">
              <div class="col-sm-auto col-4">
                <div class="avatar avatar-xl position-relative">
                  <img src="{{asset('tadmin/assets/img/bruce-mars.jpg')}}" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                </div>
              </div>
              <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <h5 class="mb-1 font-weight-bolder">
                    {{Auth::user()->name}}
                  </h5>
                  <p class="mb-0 font-weight-bold text-sm">
                    {{$divisi->nama_divisi}}
                  </p>
                </div>
              </div>
              <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                <div class="form-check form-switch ms-2">
                  {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()"> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- Card Laporan Harian -->
          @foreach ($laporan as $item)
            <div class="card mt-4" id="delete">
              <div class="card-header">
                <h5>{{$item->created_at->isoFormat('D MMM')}} - {{$item->created_at->addDays(6)->isoFormat('D MMM Y')}} </h5>
                <p class="text-sm mb-0">Lengkapi laporan harian untuk mengisi laporan mingguan</p>
              </div>
              <div class="card-body d-sm-flex pt-0">
                @if ($item->isVerif == 1)
                  <div class="d-flex align-items-center mb-sm-0 mb-4">
                    <div>
                      <i class="ni ni-like-2 text-success"></i>
                    </div>
                    <div class="ms-2">
                      <span class="text-dark font-weight-bold d-block text-sm">Disetujui Mentor</span>
                      <span class="text-xs d-block">Minggu ke-{{$loop->iteration}}</span>
                    </div>
                  </div>
                @elseif($item->isVerif == 2)
                  <div class="d-flex align-items-center mb-sm-0 mb-4">
                    <div>
                      <i class="ni ni-like-2 text-warning"></i>
                    </div>
                    <div class="ms-2">
                      <span class="text-dark font-weight-bold d-block text-sm">Sedang dicek</span>
                      <span class="text-xs d-block">Minggu ke-{{$loop->iteration}}</span>
                    </div>
                  </div>
                @else
                  <div class="d-flex align-items-center mb-sm-0 mb-4">
                    <div>
                      <i class="ni ni-ruler-pencil text-danger"></i>
                    </div>
                    <div class="ms-2">
                      <span class="text-dark font-weight-bold d-block text-sm">Belum dibuat</span>
                      <span class="text-xs d-block">Minggu ke-{{$loop->iteration}}</span>
                    </div>
                  </div>
                @endif
                <div class="mb-0 ms-auto">
                </div>
                {{-- <button class="btn btn-outline-info mb-0 ms-auto" type="button" name="button">Laporan Mingguan</button> --}}
                <a href="{{ route('showLaporan', $item->id) }}" class="btn bg-gradient-primary mb-0 ms-2">Lengkapi Laporan</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </main>
</x-app-layout>