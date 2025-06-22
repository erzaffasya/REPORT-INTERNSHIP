<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0  d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Data Bakat</h5>
                <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahTalent">
                    <i class="fas fa-plus fa-sm"></i> Tambah Bakat
                </button>
            </div>

            <div class="card-body px-0 pt-0 pb-2 table-responsive">
                <table id="datatable-search" class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center text-uppercase text-muted text-sm fw-semibold" width="80">No.</th>
                            <th class="text-center text-uppercase text-muted text-sm fw-semibold">Nama</th>
                            <th class="text-center text-uppercase text-muted text-sm fw-semibold" width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Talent as $i)
                            <tr>
                                <td class="text-center text-sm text-secondary">{{ $loop->iteration }}</td>
                                <td class="text-center text-sm text-dark fw-semibold">{{ $i->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-outline-warning btn-sm d-flex align-items-center gap-1"
                                            data-bs-toggle="modal" data-bs-target="#editTalent-{{ $i->id }}">
                                            <i class="fas fa-edit fa-sm"></i> Edit
                                        </button>
                                        <form action="{{ route('talent.destroy', $i->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1">
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

    <!-- Modal Tambah Talent -->
    <div class="modal fade" id="tambahTalent" tabindex="-1" role="dialog" aria-labelledby="tambahTalentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title text-primary fw-bold">Tambah Bakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('talent.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Bakat</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama bakat" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Talent -->
    @foreach ($Talent as $i)
        <div class="modal fade" id="editTalent-{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="editTalentTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0 shadow rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary fw-bold">Ubah Bakat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('talent.update', $i->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $i->id }}">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Bakat</label>
                                <input type="text" class="form-control" name="name" value="{{ $i->name }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
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
        </script>
    @endpush
</x-app-layout>
