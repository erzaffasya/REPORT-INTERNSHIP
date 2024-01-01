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
                        Erza Fahmi Fasya
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        SMKN 2 Balikpapan
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-1">Pekerjaan Teknis</h6>
                    {{-- <p class="text-sm mb-0">Pilih divisi yang sesuai</p> --}}
                </div>
                <div class="card-body px-3 pt-0">
                    <form method="POST" action="storeUser">
                        @csrf
                        <div class="my-2">
                            <label for="exampleFormControlSelect1">Pilih Kategori Pekerjaan</label>
                            <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                    <option value="admin">001</option>
                                    <option value="magang">002</option>
                            </select>
                        </div>
                        <p class="text-sm fw-bold my-3">Masukkan Nilai</p>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">1. </span>
                            <label for="exampleFormControlSelect1" style="width: 80%" class="me-2">Mengoperasikan paket program pengolah angka (spreadsheet/ excel)</label>
                            <div style="width:15%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">2. </span>
                            <label for="exampleFormControlSelect1" style="width: 80%" class="me-2">Mengoperasikan aplikasi pengolah kata (mc. word)</label>
                            <div style="width:15%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">3. </span>
                            <label for="exampleFormControlSelect1" style="width: 80%" class="me-2">Mengoperasikan aplikasi perangkat lunak</label>
                            <div style="width:15%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">4. </span>
                            <label for="exampleFormControlSelect1" style="width: 80%" class="me-2">Melakukan pengarsipan surat/ berkas/ dokumen</label>
                            <div style="width:15%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">5. </span>
                            <label for="exampleFormControlSelect1" style="width: 80%" class="me-2">Mengatur penggandaan, pemindaian dan pendistribusian surat/ berkas/ dokumen</label>
                            <div style="width:15%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        
                        {{-- <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button> --}}
                    </form>
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
                    <form method="POST" action="storeUser">
                        @csrf
                        <div class="my-2">
                            <label for="exampleFormControlSelect1">Pilih Kategori Pekerjaan</label>
                            <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                    <option value="admin">001</option>
                                    <option value="magang">002</option>
                            </select>
                        </div>
                        <p class="text-sm fw-bold my-3">Masukkan Nilai</p>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">1. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Disiplin</label>
                            <div style="width:25%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">2. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Tanggung Jawab</label>
                            <div style="width:25%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">3. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Inisiatif</label>
                            <div style="width:25%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">4. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Kebersihan dan kerapihan</label>
                            <div style="width:25%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <span class="text-sm fw-bold" style="width: 5%">5. </span>
                            <label for="exampleFormControlSelect1" style="width: 70%" class="me-2">Keselamatan dan kesehatan kerja (K3)</label>
                            <div style="width:25%">
                                <input type="text" class="form-control-sm m-0" name="name" placeholder="nilai" style="width:100%; border: 1px solid lightgrey">
                                <span class="text-xxs mt-n4 p-0 text-success fw-bold">Sangat Baik</span>
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Baik</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-success fw-bold">Cukup</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-warning fw-bold">Kurang</span> --}}
                                {{-- <span class="text-xxs mt-n4 p-0 text-danger fw-bold">Sangat Kurang</span> --}}
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button> --}}
                    </form>
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
                                <span class="text-md fw-bold">1092</span>
                            </div>
                            <div class="me-3">
                                <span class="text-md">Rata-rata</span>
                                <span class="text-md fw-bold">89.5 (Sangat Baik)</span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
