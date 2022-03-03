<x-guest-layout>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../tadmin/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../tadmin/assets/img/bruce-mars.jpg" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $Program->judul }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            M-Knows Consulting
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Informasi Program</h6>
                            </div>
                            <div class="col-md-4 text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $Program->detail }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-sm-0 mt-4 mb-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-7 text-start">
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Periode Program</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $periode }} Hari lagi
                                    </h5>
                                    {{-- <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12%
                                        <span class="font-weight-normal text-secondary">since last month</span></span> --}}
                                </div>
                                <div class="col-5">
                                    <div class="dropdown text-end">
                                        <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span
                                                class="text-xs text-secondary">{{ \Carbon\Carbon::parse($Program->periode_mulai)->format('d M Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse($Program->periode_berakhir)->format('d M Y') }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3"
                                            aria-labelledby="dropdownUsers2">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7
                                                    days</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Last
                                                    week</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30
                                                    days</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around mt-4">
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <div class="card"
                            style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                            <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                            <div class="card-body p-3 position-relative">
                                <div class="row">
                                    <div class="col-8 text-start">
                                        <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                            <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10"
                                                aria-hidden="true"></i>
                                        </div>
                                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                            {{ $Akses_program->count() }}
                                        </h5>
                                        <span class="text-white text-sm">Jumlah Anggota</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card"
                            style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                            <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                            <div class="card-body p-3 position-relative">
                                <div class="row">
                                    <div class="col-8 text-start">
                                        <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                            <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10"
                                                aria-hidden="true"></i>
                                        </div>
                                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                            {{ $Divisi->count() }}
                                        </h5>
                                        <span class="text-white text-sm">Jumlah Divisi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Laporan Harian</h6>
                    </div>
                    <div class="card-body pb-0 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-0">
                                <div class="w-100">
                                    <div class="d-flex mb-2">
                                        <span class="me-2 text-sm font-weight-bold text-capitalize">Positive
                                            reviews</span>
                                        <span class="ms-auto text-sm font-weight-bold">80%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-info w-80" role="progressbar"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex mb-2">
                                        <span class="me-2 text-sm font-weight-bold text-capitalize">Neutral
                                            reviews</span>
                                        <span class="ms-auto text-sm font-weight-bold">17%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-dark w-10" role="progressbar"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                <div class="w-100">
                                    <div class="d-flex mb-2">
                                        <span class="me-2 text-sm font-weight-bold text-capitalize">Negative
                                            reviews</span>
                                        <span class="ms-auto text-sm font-weight-bold">3%</span>
                                    </div>
                                    <div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-gradient-danger w-5" role="progressbar"
                                                aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer pt-0 p-3 d-flex align-items-center">
                        <div class="w-60">
                            <p class="text-sm">
                                More than <b>1,500,000</b> developers used Creative Tim's products and over
                                <b>700,000</b> projects were created.
                            </p>
                        </div>
                        <div class="w-40 text-end">
                            <a href="{{ route('guestlihatlaporan') }}" class="btn bg-gradient-dark mb-0 text-end"
                                href="javascript:;">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Divisi</h6>
                        <p class="text-sm">Daftar divisi yang ada pada program {{ $Program->judul }}. </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            @foreach ($Divisi as $item)
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="../tadmin/assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                                    class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <p class="text-gradient text-dark mb-2 text-sm">Divisi</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    {{ $item->nama_divisi }}
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                {{ $item->detail }}
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a type="button"
                                                    href="{{ url('Program/' . $Program->id . '/Divisi/' . $item->id) }}"
                                                    class="btn btn-outline-primary btn-sm mb-0">View</a>
                                                {{-- <a type="button" href="#"
                                                    class="btn btn-outline-primary btn-sm mb-0">View</a> --}}
                                                {{-- <button type="button"
                                                class="btn btn-outline-primary btn-sm mb-0 btn-update" data-bs-toggle="modal" data-bs-target="#editdivisi" data-link="{{ route('Divisi.update', $item->id) }}" data-nama_divisi="{{ $item->nama_divisi }}" data-program_id="{{$item->program_id}}" data-status="{{$item->status}}" data-detail="{{ $item->detail }}">Edit</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Daftar Anggota</h5>
                                <p class="text-sm mb-0">
                                    Daftar anggota yang mengikuti program magang {{ $Program->judul }}.
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="products-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Divisi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Akses_program as $item)
                                        <tr>
                                            <td class="text-sm">{{ $loop->iteration }}</td>
                                            <td class="text-sm">{{ $item->user->name }}</td>
                                            <td class="text-sm">{{ $item->user->email }}</td>
                                            {{-- <td class="text-sm">{{ $item->divisi->divisi->nama_divisi }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Divisi</th> --}}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            if (document.getElementById('products-list')) {
                const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
                    searchable: true,
                    fixedHeight: false,
                    perPage: 7
                });

                document.querySelectorAll(".export").forEach(function(el) {
                    el.addEventListener("click", function(e) {
                        var type = el.dataset.type;

                        var data = {
                            type: type,
                            filename: "soft-ui-" + type,
                        };

                        if (type === "csv") {
                            data.columnDelimiter = "|";
                        }

                        dataTableSearch.export(data);
                    });
                });
            };
        </script>
    @endpush
</x-guest-layout>
