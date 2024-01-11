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
                        {{$nilai->user->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        SMKN 2 Balikpapan
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <form method="POST" action="{{ route('penilaian.store') }}" class="row">
            @csrf
            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Pekerjaan Teknis</h6>
                        {{-- <p class="text-sm mb-0">Pilih divisi yang sesuai</p> --}}
                    </div>

                    <div class="card-body px-3 pt-0">
                        <p class="text-sm fw-bold my-3">Poin Penilaian</p>
                        <div class=" align-items-center row my-3">
                            <div class="col-lg-9 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input type="text" class="form-control" id="inlineFormInputName" name="judul_1"
                                    value="{{ $nilai->judul_1 }}" placeholder="Masukkan Poin Penilaian">
                                <p style="font-size: 0.7rem;">cth: Mengoperasikan paket program pengolah angka
                                    (spreadsheet/ excel) </p>
                            </div>
                            <div class="col-lg-2 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nilai</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ $nilai->nilai_1 }}"
                                        name="nilai_1" id="inlineFormInputGroupUsername" placeholder="Nilai">

                                    <input type="hidden"name="id" value="{{ $nilai->id }}">
                                </div>
                                <p style="font-size: 0.7rem;">cth: 86</p>
                            </div>

                        </div>



                        <div class=" align-items-center row my-3">
                            <div class="col-lg-9 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input type="text" class="form-control" value="{{ $nilai->nilai_2 }}" name="judul_2"
                                    id="inlineFormInputName" placeholder="Masukkan Poin Penilaian">
                                <p style="font-size: 0.7rem;">cth: Mengoperasikan paket program pengolah angka
                                    (spreadsheet/ excel) </p>
                            </div>
                            <div class="col-lg-2 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nilai</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_2"
                                        id="inlineFormInputGroupUsername" placeholder="Nilai"
                                        value="{{ $nilai->nilai_2 }}">
                                </div>
                                <p style="font-size: 0.7rem;">cth: 86</p>
                            </div>


                        </div>

                        <div class=" align-items-center row my-3">
                            <div class="col-lg-9 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input type="text" class="form-control" id="inlineFormInputName" name="judul_3"
                                    value="{{ $nilai->judul_3 }}" placeholder="Masukkan Poin Penilaian">
                                <p style="font-size: 0.7rem;">cth: Mengoperasikan paket program pengolah angka
                                    (spreadsheet/ excel) </p>
                            </div>
                            <div class="col-lg-2 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nilai</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_3"
                                        value="{{ $nilai->nilai_3 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <p style="font-size: 0.7rem;">cth: 86</p>
                            </div>


                        </div>

                        <div class=" align-items-center row my-3">
                            <div class="col-lg-9 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input type="text" class="form-control" id="inlineFormInputName" name="judul_4"
                                    value="{{ $nilai->judul_4 }}" placeholder="Masukkan Poin Penilaian">
                                <p style="font-size: 0.7rem;">cth: Mengoperasikan paket program pengolah angka
                                    (spreadsheet/ excel) </p>
                            </div>
                            <div class="col-lg-2 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nilai</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_4"
                                        value="{{ $nilai->nilai_4 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <p style="font-size: 0.7rem;">cth: 86</p>
                            </div>


                        </div>


                        <div class=" align-items-center row my-3">
                            <div class="col-lg-9 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input type="text" class="form-control" id="inlineFormInputName" name="judul_5"
                                    value="{{ $nilai->judul_5 }}" placeholder="Masukkan Poin Penilaian">
                                <p style="font-size: 0.7rem;">cth: Mengoperasikan paket program pengolah angka
                                    (spreadsheet/ excel) </p>
                            </div>
                            <div class="col-lg-2 col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Nilai</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_5"
                                        value="{{ $nilai->nilai_5 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <p style="font-size: 0.7rem;">cth: 86</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Pekerjaan Non Teknis</h6>
                        {{-- <p class="text-sm mb-0">Pilih divisi yang sesuai</p> --}}
                    </div>
                    <div class="card-body px-3 pt-0">
                        @csrf
                        <p class="text-sm fw-bold my-3">Poin Penilaian</p>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">1. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Disiplin</label>
                            <div style="width:25%">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_6"
                                        value="{{ $nilai->nilai_6 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">2. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Tanggung
                                Jawab</label>
                            <div style="width:25%">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_7"
                                        value="{{ $nilai->nilai_7 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">3. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%"
                                class="me-2">Inisiatif</label>
                            <div style="width:25%">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_8"
                                        value="{{ $nilai->nilai_8 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">4. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Kebersihan dan
                                kerapihan</label>
                            <div style="width:25%">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_9"
                                        value="{{ $nilai->nilai_9 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">5. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Keselamatan dan
                                kesehatan kerja (K3)</label>
                            <div style="width:25%">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="nilai_10"
                                        value="{{ $nilai->nilai_10 }}" id="inlineFormInputGroupUsername"
                                        placeholder="Nilai">
                                </div>
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-3">
                                    <span class="text-md">Total Nilai</span>
                                    <span class="text-md fw-bold">{{ $nilai->total }}</span>
                                </div>
                                <div class="me-3">
                                    <span class="text-md">Rata-rata</span>
                                    <span class="text-md fw-bold">{{ $nilai->rata_rata }}</span>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn mb-0 bg-gradient-primary">Simpan!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
</x-app-layout>

<script>
    function editRow(id) {
        var inputName = document.getElementById('inlineFormInputName');
        var inputNilai = document.getElementById('inlineFormInputGroupUsername');
        var button = document.querySelector('.btn-primary');

        if (button.innerText === 'Simpan') {
            // Set nilai input dan disabled
            inputName.value = "Mengoperasikan paket program pengolah angka (spreadsheet/ excel)";
            inputNilai.value = 86;
            inputName.disabled = true;
            inputNilai.disabled = true;

            // Ganti teks tombol dan hapus atribut data-id
            button.innerText = 'Perbarui';
            button.removeAttribute('data-id');
        } else {
            // Reset nilai input dan disabled
            inputName.value = "";
            inputNilai.value = "";
            inputName.disabled = false;
            inputNilai.disabled = false;

            // Ganti teks tombol dan tambahkan atribut data-id
            button.innerText = 'Simpan';
            button.setAttribute('data-id', id);
        }
    }
</script>
