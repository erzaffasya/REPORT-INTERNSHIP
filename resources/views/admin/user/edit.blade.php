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
                                <input type="text" class="form-control" name="nama_divisi"
                                    value="{{ $User->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Email</label>
                                <input type="text" class="form-control" name="nama_divisi"
                                    value="{{ $User->email }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Talent User</h6>
                    <hr class="horizontal dark my-3">
                    <div class="card-body">
                        <form role="form text-left" action="{{ route('updateTalentUser', $User->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" name="user_id" value="{{ $User->id }}" required>  

                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlSelect1">Talent</label>
                                        <select class="form-select" name="" required>
                                            <option value="" selected disabled>Select Talent</option>
                                            @foreach ($talent as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlSelect1">Score</label>
                                        <input type="number" class="form-control" name="" value="" required>
                                    </div>
                                </div>
                            

                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                        </form>

                        <form role="form text-left" action="{{ route('updateTalentUser', $User->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" name="user_id" value="{{ $User->id }}" required>

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
