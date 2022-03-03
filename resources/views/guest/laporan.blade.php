<x-guest-layout>
    <div class="container-fluid py-4">
        <div class="row col-lg-6">
            <form action="{{ route('filterlaporan') }}" method="get">
                <div class="card mt-4" id="password">
                    <div class="card-header">
                        <h5>Cek Laporan Harian Mahasiswa</h5>
                        <hr>
                    </div>
                    <div class="card-body pt-0">
                        <label class="form-label">Nama Mahasiswa</label>
                        <div class="form-group">
                            <select class="form-control" name="user" id="choices-gender">
                                @foreach ($User as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label">Departemen</label>
                        <div class="form-group">
                            <select class="form-control" name="divisi" id="choices-gender">
                                @foreach ($Divisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }} -
                                        {{ $item->program->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h5 class="mt-5">Pastikan data sudah benar</h5>
                        <p class="text-muted mb-2">
                            Sarat pencarian ada dibawah ini:
                        </p>
                        <ul class="text-muted ps-4 mb-0 float-start">
                            <li>
                                <span class="text-sm">Input Nama Mahasiswa</span>
                            </li>
                            <li>
                                <span class="text-sm">Input Divisi Mahasiswa</span>
                            </li>
                        </ul>
                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Cek
                            Laporan</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Daftar List Laporan</h5>
                                <p class="text-sm mb-0">
                                    {{-- Daftar anggota yang mengikuti program magang {{ $Program->judul }}. --}}
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
                                        <th>Tanggal Laporan</th>
                                        <th>Status Laporan</th>
                                        <th>Aksi</th>
                                        {{-- <th>Divisi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($LaporanHarian != null)
                                        @foreach ($LaporanHarian as $item)
                                            <tr>
                                                <td class="text-sm">{{ $loop->iteration }}</td>
                                                <td class="text-sm">{{ $item->user->name }}</td>
                                                <td class="text-sm">{{ $item->created_at->Format('D, H M Y') }}
                                                </td>
                                                <td class="text-sm">
                                                    @if ($item->isVerif == 0)
                                                        Revisi
                                                    @elseif ($item->isVerif == 1)
                                                        Laporan Disetujui
                                                    @elseif ($item->isVerif == 2)
                                                        Revisi Telah Dikirim
                                                    @elseif ($item->isVerif == 3)
                                                        Revisi
                                                    @elseif ($item->isVerif == 4)
                                                        Laporan Belum Dibuat
                                                    @endif
                                                </td>
                                                <td>
                                                    <a type="button"
                                                        href="{{ route('guestdetaillaporan', $item->id) }}"
                                                        class="btn btn-sm btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-3"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                        data-bs-original-title="Refund rate is higher with 70% than other users">
                                                        <i class="fas fa-info" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Status Laporan</th>
                                        <th>Aksi</th>
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
