<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Pengguna</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal"
                            data-bs-target="#tambahUser"><i class="fas fa-plus"></i>&nbsp; Tambah Pengguna</button>
                    </div>
                </div>
            </div>
            <div class="card-body  px-0 pt-0 pb-2 table-responsive">

                <table id="datatable-search" class="table table-hover table-borderless align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center text-secondary text-xs fw-bold" width="60">No.</th>
                            <th class="text-center text-secondary text-xs fw-bold">E-mail</th>
                            <th class="text-center text-secondary text-xs fw-bold">Nama</th>
                            <th class="text-center text-secondary text-xs fw-bold">NIM</th>
                            <th class="text-center text-secondary text-xs fw-bold">Instansi</th>
                            <th class="text-center text-secondary text-xs fw-bold">Jurusan</th>
                            <th class="text-center text-secondary text-xs fw-bold">Talent</th>
                            <th class="text-center text-secondary text-xs fw-bold" width="130">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $i)
                            <tr>
                                <td class="text-center text-sm text-muted">{{ $loop->iteration }}</td>
                                <td class="text-sm">{{ $i->email }}</td>
                                <td class="text-center text-sm">{{ $i->name }}</td>
                                <td class="text-sm">{{ $i->nim }}</td>
                                <td class="text-sm">{{ $i->sekolah }}</td>
                                <td class="text-sm">{{ $i->kelas }}</td>
                                <td class="text-center">
                                    @if ($i->talent_id)
                                        <span class="badge bg-success text-white">Ada Talent</span>
                                    @else
                                        <span class="badge bg-danger text-white">Tidak Ada</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ url('user', $i->id) }}"
                                            class="btn btn-outline-warning btn-sm d-flex align-items-center gap-1 px-3">
                                            <i class="fas fa-edit fa-sm"></i> Ubah
                                        </a>
                                        <form action="{{ url('deleteUser', $i->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1 px-3">
                                                <i class="fas fa-trash-alt fa-sm"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>

    <div class="col-md-4">
        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="storeUser">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Nama</label>
                                <input type="text" class="form-control" required name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">NIM</label>
                                <input type="text" class="form-control" name="nim">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Instansi</label>
                                <input type="text" class="form-control" name="sekolah">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Jurusan</label>
                                <input type="text" class="form-control" name="kelas">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select class="form-control" name="role" required id="exampleFormControlSelect1">
                                    <option value="magang">Magang</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">E-Mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary">Submit!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($user as $i)
        <div class="col-md-4">
            <div class="modal fade" id="editUser-{{ $i->id }}" tabindex="-1" role="dialog"
                aria-labelledby="tambahUserTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('updateUser', $i->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $i->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $i->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select class="form-control" name="role" value="{{ $i->role }}"
                                        id="exampleFormControlSelect1">
                                        <option value="{{ $i->role }}" selected>{{ $i->role }}</option>
                                        <option value="admin">Admin</option>
                                        <option value="magang">Magang</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">E-Mail</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $i->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ $i->password }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Submit!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @push('scripts')
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true
            });
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Hapus Data?`,
                        text: "Jika data terhapus, data akan hilang selamanya!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
</x-app-layout>
