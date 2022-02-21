<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card card-background card-background-mask-info h-100 tilt" data-tilt=""
                            style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="full-background"
                                style="background-image: url('../../../tadmin/assets/img/curved-images/white-curved.jpeg')">
                            </div>
                            <div class="card-body pt-4 text-center">
                                <h2 class="text-white mb-0 mt-2 up">Persentase Progres</h2>
                                <h1 class="text-white mb-0 up">100%</h1>
                                <span class="badge badge-lg d-block bg-gradient-dark mb-2 up">%Kenaikan Progres</span>
                                <a href="javascript:;" class="btn btn-outline-white mb-2 px-5 up">View more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex">
                                    <div>
                                        <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Dana Divisi</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                Rp. 1.000.0000
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body p-3">
                                <div class="d-flex">
                                    <div>
                                        <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                            <i class="ni ni-planet text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Anggota</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{$Akses_divisi->count()}}
                                                <span class="text-success text-sm font-weight-bolder"></span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex">
                                    <div>
                                        <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Mentor</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                3
                                                <span class="text-success text-sm font-weight-bolder"></span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body p-3">
                                <div class="d-flex">
                                    <div>
                                        <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                            <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Laporan</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{$Laporan->count()}}
                                                <span class="text-success text-sm font-weight-bolder"></span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class="row">
                            <div class="col-8 d-flex">
                                <div>
                                    <img src="../../../tadmin/assets/img/team-3.jpg" class="avatar avatar-sm me-2"
                                        alt="avatar image">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $Divisi->nama_divisi }}</h6>
                                    <p class="text-xs">2h ago</p>
                                </div>
                            </div>
                            <div class="col-4">
                                {{-- <span class="badge bg-gradient-info ms-auto float-end">Recommendation</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-1">
                        {{-- <h6>I need a Ruby developer for my new website.</h6> --}}
                        <p class="text-sm">{{ $Divisi->detail }}</p>
                        <div class="d-flex bg-gray-100 border-radius-lg p-3">
                            <h4 class="my-auto">
                              {{-- Hapus Divisi --}}
                            </h4>
                            <a href="javascript:;" class="btn btn-danger mb-0 ms-auto">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Laporan Harian</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <small>23 - 30 March 2020</small>
                            </div>
                        </div>
                        <hr class="horizontal dark mb-0">
                    </div>
                    <div class="card-body p-3 pt-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            @foreach ($Laporan->where('isVerif', '!=', 1) as $item)
                                <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                    <div class="checklist-item checklist-item-dark ps-2 ms-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault1" checked>
                                            </div>
                                            <h6 class="mb-0 text-dark font-weight-bold text-sm">Management discussion
                                            </h6>
                                            <div class="dropstart float-lg-end ms-auto pe-0">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownTable3"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                    aria-labelledby="dropdownTable3" style="">
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Something else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center ms-4 mt-3 ps-1">
                                            <div>
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">Date</p>
                                                <span class="text-xs font-weight-bolder">24 March 2019</span>
                                            </div>
                                            <div class="ms-auto">
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">Project</p>
                                                <span class="text-xs font-weight-bolder">4411_8sIsdd23</span>
                                            </div>
                                            <div class="mx-auto">
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">Company</p>
                                                <span class="text-xs font-weight-bolder">Apple</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark mt-4 mb-0">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                <div class="card overflow-hidden">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="ms-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tasks</p>
                                <h5 class="font-weight-bolder mb-0">
                                    480
                                </h5>
                            </div>
                            <div class="progress-wrapper ms-auto w-25">
                                <div class="progress-info">
                                    <div class="progress-percentage">
                                        <span class="text-xs font-weight-bold">60%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-3 p-0">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden mt-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="d-flex">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Projects</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            115
                                        </h5>
                                    </div>
                                </div>
                                <span class="badge badge-dot d-block text-start pb-0 mt-3">
                                    <i class="bg-gradient-info"></i>
                                    <span class="text-muted text-xs font-weight-bold">Done</span>
                                </span>
                                <span class="badge badge-dot d-block text-start">
                                    <i class="bg-gradient-secondary"></i>
                                    <span class="text-muted text-xs font-weight-bold">In progress</span>
                                </span>
                            </div>
                            <div class="col-lg-7 my-auto">
                                <div class="chart ms-auto">
                                    <canvas id="chart-bar" class="chart-canvas" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header pb-0">
                            <div class="d-lg-flex">
                                <div>
                                    <h5 class="mb-0">Daftar Anggota</h5>
                                    <p class="text-sm mb-0">
                                        Daftar anggota dalam divisi {{$Divisi->nama_divisi}} .
                                    </p>
                                </div>
                                <div class="ms-auto my-auto mt-lg-0 mt-4">
                                    <div class="ms-auto my-auto">
                                        <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#tambahAnggota">
                                            +&nbsp; Anggota 
                                        </button>
                                        {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0"
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
                                            data-type="csv" type="button" name="button">Export</button> --}}
                                    </div>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Akses_divisi as $item)
                                            <tr>
                                                <td class="text-sm">{{ $loop->iteration }}</td>
                                                <td class="text-sm">{{$item->user->name}}</td>
                                                <td class="text-sm">{{$item->user->email}}</td>
                                                {{-- <td>
                                                    <span class="badge badge-danger badge-sm">Out of Stock</span>
                                                </td> --}}
                                                <td class="text-sm">
                                                    <a href="javascript:;" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Preview product">
                                                        <i class="fas fa-eye text-secondary"></i>
                                                    </a>
                                                    <a href="javascript:;" class="mx-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    <a href="javascript:;" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete product">
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </a>
                                                </td>
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
    </div>

    <div class="col-md-4">

        <!-- Discussion Modal -->
        <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('aksesDivisi.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Nama Anggota</label>
                    <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                      @foreach ($akses_program as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select> 
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Divisi</label>
                    <select class="form-control" name="divisi_id" id="exampleFormControlSelect1">
                      <option value="{{$Divisi->id}}" selected disabled>{{$Divisi->judul}}</option>
                    </select> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
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
