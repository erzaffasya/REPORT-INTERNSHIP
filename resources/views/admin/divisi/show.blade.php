<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Info Divisi -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header p-0">
                        <img src="{{ asset('tadmin/assets/img/intership.png') }}" class="w-100 rounded-top"
                            style="height: 140px; object-fit: cover;" alt="Cover">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold text-xl mb-2">{{ $Divisi->nama_divisi }}</h5>
                        <p class="text-sm text-muted">{{ $Divisi->detail ?? 'Belum ada deskripsi tersedia.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="col-lg-3 col-12 mb-4">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-gradient-dark text-white rounded-circle p-3 me-3">
                                    <i class="ni ni-planet"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-sm text-muted">Total Anggota</p>
                                    <h5 class="mb-0 fw-bold">{{ $Akses_divisi->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-gradient-dark text-white rounded-circle p-3 me-3">
                                    <i class="ni ni-shop"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-sm text-muted">Laporan Terkirim</p>
                                    <h5 class="mb-0 fw-bold">{{ $Laporan->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berita Divisi -->
            <div class="col-lg-5 col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('tadmin/assets/img/small-logos/icon-bulb.svg') }}"
                                class="avatar avatar-sm me-2" alt="bulb">
                            <div>
                                <h6 class="mb-0">Info Divisi</h6>
                                <small class="text-muted">Update terbaru</small>
                            </div>
                        </div>
                        @can('admin')
                            <a href="{{ url("/berita-acara/$Divisi->id") }}" class="btn btn-sm bg-gradient-primary">+
                                Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @forelse ($beritaAcara as $item)
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <p class="fw-semibold mb-1">{{ $item->judul }}</p>
                                    <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                </div>
                                <button type="button" class="btn btn-sm text-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    Detail
                                </button>
                            </div>
                            @<!-- Modal Berita Acara -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                                                {{ $item->judul }}</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-2 text-sm text-muted">
                                                Dipublikasikan pada: {{ $item->created_at->format('d M Y, H:i') }}
                                            </p>
                                            <div class="text-dark">
                                                {!! nl2br(e($item->isi)) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p class="text-muted">Belum ada berita untuk divisi ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Harian -->
        @can('admin')
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="mb-0">Laporan Harian Belum Diverifikasi</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($Laporan->where('isVerif', '!=', 1) as $item)
<li class="list-group-item d-flex flex-column">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $item->user->name }} - {{ $item->divisi->nama_divisi }}</strong>
                                    <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                </div>
                                <small class="text-muted">
                                    Tanggal: {{ $item->created_at->isoFormat('D') }}-{{ $item->created_at->addDays(6)->isoFormat('D MMM Y') }}
                                </small>
                                <div class="mt-2">
                                    <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#laporanModal-{{ $item->id }}">
                                        Lihat Detail
                                    </a>
                                </div>
                            </li>

                            <!-- Modal untuk setiap laporan -->
                            <div class="modal fade" id="laporanModal-{{ $item->id }}" tabindex="-1" aria-labelledby="label-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="label-{{ $item->id }}">Detail Laporan - {{ $item->user->name }}</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Tanggal:</strong> {{ $item->created_at->isoFormat('dddd, D MMMM Y') }}</p>
                                            <p><strong>Deskripsi:</strong></p>
                                            <div class="border rounded p-2 text-dark">
                                                {!! nl2br(e($item->isi ?? '-')) !!}
                                            </div>
                                            @if ($item->gambar)
<div class="mt-3">
                                                    <p><strong>Foto Kegiatan:</strong></p>
                                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Lampiran Gambar" class="img-fluid rounded">
                                                </div>
@endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <li class="list-group-item">Tidak ada laporan yang menunggu verifikasi.</li>
@endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endcan


        <!-- Daftar Anggota -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h6 class="mb-0">Daftar Anggota</h6>
                            <small class="text-muted">Divisi {{ $Divisi->nama_divisi }}</small>
                        </div>
                        @can('admin')
    {{-- <button class="btn btn-sm bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#tambahAnggota">+ Tambah Anggota</button> --}}
@endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        @can('admin')
    <th>Aksi</th>
@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Akses_divisi as $item)
<tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->email }}</td>
                                            @can('admin')
    <td>
                                                                <a href="{{ url('destroyAksesDivisi', $item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                                                <a href="{{ url('penilaian/' . $item->user->id . '/' . $item->divisi->id) }}" class="btn btn-sm btn-secondary">Nilai</a>
                                                                <a href="{{ url('cetak-nilai/' . $item->user->id . '/' . $item->divisi->id . '/' . $program) }}" class="btn btn-sm btn-info">Cetak</a>
                                                            </td>
@endcan
                                        </tr>
                        @empty
                                        <tr><td colspan="4" class="text-center">Belum ada anggota terdaftar.</td></tr>
 @endforelse
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                </div>
                                </x-app-layout>)
