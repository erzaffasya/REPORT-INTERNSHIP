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
            style="background-image: url('../tadmin/assets/img/sampul-program.png'); background-position-y: 50%;">
            <span class="mask opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="" style="display: flex; justify-content: space-between; align-items: center;">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../tadmin/assets/img/program-profile.png" alt="profile_image" class="w-100 ">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $Program->judul }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Internship
                            </p>
                        </div>
                    </div>
                </div>

                @if ($userDivision && $periode < 0)
                    <div class="mr-0">
                        <a href="{{ url('cetak-nilai/' . Auth::user()->id . '/' . $userDivision->divisi_id . '/' . $Program->id) }}"
                            class="btn bg-gradient-primary"
                            style="display: flex; flex-direction: column; align-items: center;">
                            <svg width="80px" height="80px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12"
                                        stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <span>
                                Unduh Sertifikat
                            </span>
                        </a>
                    </div>
                @endif


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
        <div class="modal fade" id="tambahdivisi" tabindex="-1" aria-labelledby="tambahdivisiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow border-0">
                    <form method="POST" action="{{ route('Divisi.store') }}">
                        @csrf
                        <div class="modal-header bg-gradient-primary text-white">
                            <h5 class="modal-title mb-0">Tambah Divisi</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_divisi" id="nama_divisi_input"
                                    placeholder="Nama Divisi">
                                <label for="nama_divisi_input">Nama Divisi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="detail" id="detail_input" placeholder="Detail" style="height: 100px"></textarea>
                                <label for="detail_input">Detail</label>
                            </div>
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="program_id" value="{{ $Program->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-2">Informasi Program</h5>
                            <p class="text-sm mb-2">{{ $Program->detail }}</p>
                            <span
                                class="badge bg-gradient-secondary text-white">{{ \Carbon\Carbon::parse($Program->periode_mulai)->format('d M Y') }}
                                - {{ \Carbon\Carbon::parse($Program->periode_berakhir)->format('d M Y') }}</span>
                        </div>
                        <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
                            <p class="mb-1 fw-bold text-sm">
                                @if ($periode < 0)
                                    Program Telah Selesai
                                @else
                                    {{ $periode }} Hari lagi
                                @endif
                            </p>
                            <p class="mb-1 text-sm">👥 <strong>{{ $Akses_program->count() }}</strong> Anggota</p>
                            <p class="mb-0 text-sm">🏢 <strong>{{ $Divisi->count() }}</strong> Divisi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Divisi -->
        <div class="modal fade" id="editdivisi" tabindex="-1" aria-labelledby="editdivisiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow border-0">
                    <form id="divisiUpdate" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-gradient-info text-white">
                            <h5 class="modal-title mb-0">Edit Divisi</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_divisi" id="nama_divisi"
                                    placeholder="Nama Divisi">
                                <label for="nama_divisi">Nama Divisi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="detail" id="detail" placeholder="Detail" style="height: 100px"></textarea>
                                <label for="detail">Detail</label>
                            </div>
                            <input type="hidden" name="status" id="status" value="1">
                            <input type="hidden" name="program_id" id="program_id" value="{{ $Program->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Konten utama -->

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
                                <div class="col-xl-4 col-md-6 mb-4 mt-4">
                                    <div class="card shadow-sm border-0 text-center py-4 px-3"
                                        style="border-radius: 20px;">
                                        <!-- Icon Container -->
                                        <div class="d-flex justify-content-center align-items-center mb-3"
                                            style="height: 120px;">
                                            <div class="bg-light shadow rounded-circle d-flex justify-content-center align-items-center"
                                                style="width: 100px; height: 100px;">
                                                <img src="../tadmin/assets/img/program-divisi.png" alt="Divisi Icon"
                                                    class="img-fluid" style="width: 60px; height: 60px;">
                                            </div>
                                        </div>

                                        <!-- Divisi Info -->
                                        <p class="text-muted mb-1 text-uppercase" style="letter-spacing: 1px;">
                                        </p>
                                        <h5 class="text-primary fw-bold mb-2">{{ $item->nama_divisi }}</h5>
                                        <p class="text-sm mb-3" style="color: #6c757d;">
                                            {{ $item->detail ?? 'Divisi ini bertanggung jawab atas koordinasi pelaksanaan program secara profesional dan kolaboratif.' }}
                                        </p>

                                        <!-- Action Buttons -->
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('Program/' . $Program->id . '/Divisi/' . $item->id) }}"
                                                class="btn btn-outline-primary btn-sm px-3">View</a>

                                            @can('admin')
                                                <a href="{{ url('destroyDivisi', $item->id) }}"
                                                    class="btn btn-outline-danger btn-sm px-3">Hapus</a>
                                                <a href="{{ route('Divisi.edit', $item->id) }}"
                                                    class="btn btn-outline-secondary btn-sm px-3">Edit</a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @can('admin')
                                <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
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
                                        <th>Divisi</th>
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
                                            <td class="text-sm">{{ $item->akses_divisi->divisi->nama_divisi ?? null }}
                                            </td>
                                            @can('admin')
                                                <td class="text-sm">
                                                    @if (!$item->isDivisi())
                                                        <a href="{{ url('destroyAksesProgram', $item->id) }}"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete product">
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </a>

                                                        <a href="{{ url('rekomendasi/' . $item->user->id . '/program/' . $item->program_id) }}"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete product">
                                                            <i class="fas fa-edit text-secondary"></i>
                                                        </a>
                                                    @endif
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

        <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog"
            aria-labelledby="tambahAnggotaTitle" aria-hidden="true">
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
