<x-app-layout>
    <div class="container-fluid py-4">
        <section class="py-3">
            <div class="row mb-4">
                <div class="col-12">
                    <div
                        class="bg-gradient-primary p-4 rounded shadow-sm d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bold text-white mb-2 mb-md-0" style="font-size: 1.5rem;">
                                📘 Daftar Program Magang
                            </h4>
                            <p class="mb-0 text-white" style="font-size: 1rem; opacity: 0.85; line-height: 1.5;">
                                Daftar program magang yang sedang dibuka dan aktif dijalankan. Kamu bisa melihat
                                detailnya atau menambahkan program baru sesuai kebutuhan.
                            </p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="{{ route('Program.create') }}" class="btn btn-light text-primary fw-semibold">
                                <i class=""></i> Tambah Program
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4">
                @foreach ($Program as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm border-0 hover-shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl bg-gradient-dark border-radius-md p-2 me-3">
                                            <img src="{{ asset('tadmin/assets/img/logo-program.png') }}"
                                                alt="logo">
                                        </div>
                                        <div>
                                            <a href="{{ route('Program.show', $item->id) }}"
                                                class="text-dark text-decoration-none">
                                                <h6 class="mb-0">{{ $item->judul }}</h6>
                                            </a>
                                            <small class="text-muted">Klik untuk detail program</small>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="text-secondary" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="{{ route('Program.edit', $item->id) }}">Ubah</a>
                                            <a class="dropdown-item"
                                                href="{{ url('destroyProgram', $item->id) }}">Hapus</a>
                                            <a class="dropdown-item"
                                                href="{{ route('Program.show', $item->id) }}">Detail Program</a>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-sm text-secondary">
                                    {{ \Illuminate\Support\Str::limit($item->detail, 120) }}</p>

                                <hr class="horizontal dark my-3">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">{{ $item->anggota->count() }}</h6>
                                        <small class="text-muted">Anggota</small>
                                    </div>
                                    <div class="text-end">
                                        <h6 class="mb-0">
                                            {{ \Carbon\Carbon::parse($item->periode_berakhir)->format('d M Y') }}
                                        </h6>
                                        <small class="text-muted">Periode Berakhir</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-dashed">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <a href="{{ route('Program.create') }}" class="text-decoration-none text-secondary">
                                <i class="fa fa-plus fa-2x mb-2"></i>
                                <h5 class="mb-0">Tambah Program</h5>
                                <small>Daftarkan program magang baru</small>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
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
