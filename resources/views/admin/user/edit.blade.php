<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Edit User</h6>
                    <hr class="horizontal dark my-3">
                    <div class="card-body">
                        <form role="form text-left" action="{{ route('updateUser', $User->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $User->name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $User->email }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select class="form-control" name="role" required id="exampleFormControlSelect1">
                                    <option @if ($User->role == 'magang') selected @endif value="magang">Magang
                                    </option>
                                    <option @if ($User->role == 'admin') selected @endif value="admin">Admin
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $User->nim }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Instansi</label>
                                <input type="text" class="form-control" name="sekolah" value="{{ $User->sekolah }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Jurusan</label>
                                <input type="text" class="form-control" name="kelas" value="{{ $User->kelas }}">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark">Update Data</button>
                                <a href="{{ url('user') }}" class="btn bg-gradient-dark">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Bakat Pengguna</h6>
                    <hr class="horizontal dark my-3">
                    <div class="card-body">
                        <form role="form text-left" action="{{ route('addTalentUser', $User->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" name="user_id" value="{{ $User->id }}"
                                required>
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="exampleFormControlSelect1">Talent</label>
                                    <select class="form-select" name="talent_id" required>
                                        @foreach ($talent as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="exampleFormControlSelect1">Score</label>
                                    <input type="number" class="form-control" name="score" value="" required>
                                </div>
                            </div>


                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Add</button>
                            </div>
                        </form>

                        <form role="form text-left" action="{{ route('updateTalentUser', $User->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" name="user_id" value="{{ $User->id }}"
                                required>

                            @foreach ($talentUser as $item)
                                @php
                                    $talent = $talent->where('id', $item->talent_id)->first();
                                @endphp
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">{{ $talent->name }}</label>
                                    <input type="number" class="form-control" name="talent[{{ $item->talent_id }}]"
                                        value="{{ $item->score }}" required>
                                </div>
                            @endforeach

                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark">Perbarui</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
