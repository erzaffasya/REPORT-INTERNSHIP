<x-app-layout>
    <!-- Modal Tambah Divisi -->
    <div class="modal fade" id="tambahdivisi" tabindex="-1" role="dialog" aria-labelledby="tambahdivisiLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('Divisi.store') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahdivisiLabel">Tambah Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Divisi:</label>
                            <input type="text" class="form-control" name="nama_divisi">
                            <input type="hidden" class="form-control" value="1" name="status">
                            <input type="hidden" class="form-control" value="{{ $Program->id }}" name="program_id">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Detail:</label>
                            <textarea class="form-control" name="detail"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit Divisi -->
    <div class="modal fade" id="editdivisi" tabindex="-1" role="dialog" aria-labelledby="editdivisiLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="divisiUpdate" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editdivisiLabel">Edit Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <input type="hidden" value="{{$Divisi->id}}"> --}}
                    <div class="modal-body">
                        {{-- <input type="hidden" value="{{$Divisi->id}}"> --}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Divisi:</label>
                            <input type="text" class="form-control" name="nama_divisi" id="nama_divisi">
                            <input type="hidden" class="form-control" value="1" name="status" id="status">
                            <input type="hidden" class="form-control" value="{{ $Program->id }}" name="program_id"
                                id="program_id">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Detail:</label>
                            <textarea class="form-control" name="detail" id="detail"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary btn-update">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
                {{-- <form method="post" action="{{ route('laporanManual') }}">
                    @csrf
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center">
                        <i class="fas fa-info" aria-hidden="true"></i>
                    </button>
                </form> --}}
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
                                {{-- <a class="btn " data-bs-toggle="modal" data-bs-target="#tambahdivisi">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Profile"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $Program->detail }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        {{-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                    Name:</strong> &nbsp; Alec M. Thompson</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Location:</strong> &nbsp; USA</li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                </a>
                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </a>
                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-sm-0 mt-4">
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
                <div class="card mt-4 ">
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                            <div class="col-7 text-start">
                                <p class="text-sm mb-1 text-capitalize font-weight-bold">Jumlah Anggota</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $Akses_program->count() }}
                                </h5>
                                {{-- <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                        class="font-weight-normal text-secondary">since last month</span></span> --}}
                            </div>
                            {{-- <div class="col-5">
                                <div class="dropdown text-end">
                                    <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-xs text-secondary">6 May - 7 May</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3"
                                        aria-labelledby="dropdownUsers2">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7
                                                days</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a>
                                        </li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30
                                                days</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card mt-4 ">
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                            <div class="col-7 text-start">
                                <p class="text-sm mb-1 text-capitalize font-weight-bold">Jumlah Divisi</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $Divisi->count() }}
                                </h5>
                                {{-- <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                        class="font-weight-normal text-secondary">since last month</span></span> --}}
                            </div>
                            {{-- <div class="col-5">
                                <div class="dropdown text-end">
                                    <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-xs text-secondary">6 May - 7 May</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3"
                                        aria-labelledby="dropdownUsers2">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7
                                                days</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a>
                                        </li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30
                                                days</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0">Channels</h6>
                            <button type="button"
                                class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                data-bs-original-title="See traffic channels">
                                <i class="fas fa-info" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 mt-md-0 mt-4">
                        <div class="row">
                            <div class="col-7 text-start">
                                <div class="chart">
                                    <canvas id="pie-chart" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                            <div class="col-5 my-auto">
                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                                    <i class="bg-info"></i>
                                    <span class="text-dark text-xs">Facebook</span>
                                </span>
                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                                    <i class="bg-primary"></i>
                                    <span class="text-dark text-xs">Direct</span>
                                </span>
                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                                    <i class="bg-dark"></i>
                                    <span class="text-dark text-xs">Organic</span>
                                </span>
                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                                    <i class="bg-secondary"></i>
                                    <span class="text-dark text-xs">Referral</span>
                                </span>
                            </div>
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
                                                @can('admin')
                                                    <a type="button" href="{{ url('destroyDivisi', $item->id) }}"
                                                        class="btn btn-outline-primary btn-sm mb-0">Hapus</a>
                                                    <a type="button" href="{{ route('Divisi.edit', $item->id) }}"
                                                        class="btn btn-outline-primary btn-sm mb-0">Edit</a>
                                                @endcan

                                                {{-- <button type="button"
                                                class="btn btn-outline-primary btn-sm mb-0 btn-update" data-bs-toggle="modal" data-bs-target="#editdivisi" data-link="{{ route('Divisi.update', $item->id) }}" data-nama_divisi="{{ $item->nama_divisi }}" data-program_id="{{$item->program_id}}" data-status="{{$item->status}}" data-detail="{{ $item->detail }}">Edit</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @can('admin')
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card h-100 card-plain border">
                                        <div class="card-body d-flex flex-column justify-content-center text-center">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#tambahdivisi">
                                                <i class="fa fa-plus text-secondary mb-3"></i>
                                                <h5 class=" text-secondary"> Tambah Divisi </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
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
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                @can('admin')
                                    <div class="ms-auto my-auto">
                                        <a href="{{ url('tambahAksesProgram', $Program->id) }}"
                                            class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Anggota</a>
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0"
                                            data-bs-toggle="modal" data-bs-target="#import">
                                            Import
                                        </button>
                                        <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog mt-lg-10">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                        <i class="fas fa-upload ms-3"></i>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You can browse your computer for a file.</p>
                                                        <input type="text" placeholder="Browse file..."
                                                            class="form-control mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="importCheck" checked="">
                                                            <label class="custom-control-label" for="importCheck">I
                                                                accept
                                                                the terms and conditions</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button"
                                                            class="btn bg-gradient-primary btn-sm">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                            data-type="csv" type="button" name="button">Export</button>
                                    </div>
                                @endcan
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
                                        {{-- <th>Status</th> --}}
                                        @can('admin')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Akses_program as $item)
                                        <tr>
                                            <td class="text-sm">{{ $loop->iteration }}</td>
                                            <td class="text-sm">{{ $item->user->name }}</td>
                                            <td class="text-sm">{{ $item->user->email }}</td>
                                            {{-- <td>
                                                <span class="badge badge-danger badge-sm">Out of Stock</span>
                                            </td> --}}
                                            @can('admin')
                                                <td class="text-sm">
                                                    <a href="{{ url('destroyAksesProgram', $item->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('aksesProgram.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Nama Anggota</label>
                                <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Program</label>
                                <select class="form-control" name="program_id" id="exampleFormControlSelect1">
                                    <option value="{{ $Program->id }}" selected>{{ $Program->judul }}</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{-- <script>
            var ctx2 = document.getElementById("chart-pie").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

            var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
            new Chart(ctx2, {
                type: "pie",
                data: {
                    labels: ['Facebook', 'Direct', 'Organic', 'Referral'],
                    datasets: [{
                        label: "Projects",
                        weight: 9,
                        cutout: 0,
                        tension: 0.9,
                        pointRadius: 2,
                        borderWidth: 2,
                        backgroundColor: ['#17c1e8', '#cb0c9f', '#3A416F', '#a8b8d8'],
                        data: [15, 20, 12, 60],
                        fill: false
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                display: false,
                            }
                        },
                    },
                },
            });
        </script> --}}
        <script>
            // Pie chart
            var ctx4 = document.getElementById("pie-chart").getContext("2d");

            new Chart(ctx4, {
                type: "pie",
                data: {
                    labels: ['Facebook', 'Direct', 'Organic', 'Referral'],
                    datasets: [{
                        label: "Projects",
                        weight: 9,
                        cutout: 0,
                        tension: 0.9,
                        pointRadius: 2,
                        borderWidth: 2,
                        backgroundColor: ['#17c1e8', '#cb0c9f', '#3A416F', '#a8b8d8'],
                        data: [15, 20, 12, 60],
                        fill: false
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                display: false,
                            }
                        },
                    },
                },
            });
        </script>
        <script>
            $('.btn-update').click(function(event) {
                var id = $(this).data("link");
                var nama_divisi = $(this).data("nama_divisi");
                var detail = $(this).data("detail");
                var status = $(this).data("status");
                var program_id = $(this).data("program_id")
                $('#divisiUpdate').attr('action', id);
                $('#nama_divisi').val(nama_divisi);
                $('#detail').val(detail);
                $('#status').val(status);
                $('#program_id').val(program_id);
                console.log($('nama_divisi'));
                console.log($('detail'));
                console.log($('status'));
                console.log($('program_id'));
            });
        </script>
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
</x-app-layout>
