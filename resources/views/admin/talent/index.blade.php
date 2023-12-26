<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Talent</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal"
                            data-bs-target="#tambahTalent"><i class="fas fa-plus"></i>&nbsp; Talent</button>
                    </div>
                </div>
            </div>
            <div class="card-body  px-0 pt-0 pb-2 table-responsive">

                <table id="datatable-search" class="table align-items-center mb-0">

                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                width="100px">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"width="100px">
                                Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Talent as $i)
                            <tr>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $i->name }}</p>
                                </td>
                                <td>
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-sm bg-gradient-warning mb-0"
                                            data-bs-toggle="modal" data-bs-target="#editTalent-{{ $i->id }}"
                                            style="padding: 10px 24px"><i class="fas fa-user"></i>&nbsp; Edit</button>
                                        <form id="form-delete" action="{{ route('talent.destroy', $i->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm bg-gradient-danger mb-0 show_confirm"
                                                style="padding: 10px 24px"><i class="fas fa-trash"></i>&nbsp;
                                                Hapus</button>
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
        <div class="modal fade" id="tambahTalent" tabindex="-1" role="dialog" aria-labelledby="tambahTalentTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Talent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('talent.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Nama</label>
                                <input type="text" class="form-control" name="name">
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

    @foreach ($Talent as $i)
        <div class="col-md-4">
            <div class="modal fade" id="editTalent-{{ $i->id }}" tabindex="-1" role="dialog"
                aria-labelledby="tambahTalentTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Talent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('talent.update', $i->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $i->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $i->name }}">
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
