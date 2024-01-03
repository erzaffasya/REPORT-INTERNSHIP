<x-app-layout>
    <div class="card card-body blur shadow-blur overflow-hidden">
        <div class="row">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../tadmin/assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $student->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{-- SMKN 2 Balikpapan --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-1">Rekomendasi Divisi</h6>
                    <p class="text-sm mb-0">Pilih divisi yang sesuai</p>
                </div>
                <div class="card-body px-3 pt-0">
                    <div class="row">
                        @foreach ($recommendedDepartments as $item)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mt-4">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block shadow border-radius-xl">
                                            <img src="../tadmin/assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pt-2 pb-0">
                                        <h6 class="mt-1">
                                            {{ $item['divisi']->nama_divisi }}
                                        </h6>
                                        <p class="mb-3 text-xs lh-base">
                                            {{ $item['divisi']->detail }}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <span>Skor</span>
                                                <span class="fw-bold">{{ $item['score'] }}</span>
                                            </div>
                                            <form action="{{ url('storeAksesDivisi') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                <input type="hidden" name="divisi_id"
                                                    value="{{ $item['divisi']->id }}">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm mb-0">Tambah</button>
                                            </form>
                                            {{-- <a type="button"
                                            href="{{ url('Program/' . $Program->id . '/Divisi/' . $item->id) }}"
                                            class="btn btn-outline-primary btn-sm mb-0">View</a>
                                        @can('admin')
                                            <a type="button" href="{{ url('destroyDivisi', $item->id) }}"
                                                class="btn btn-outline-primary btn-sm mb-0">Hapus</a>
                                            <a type="button" href="{{ route('Divisi.edit', $item->id) }}"
                                                class="btn btn-outline-primary btn-sm mb-0">Edit</a>
                                        @endcan --}}

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
</x-app-layout>
