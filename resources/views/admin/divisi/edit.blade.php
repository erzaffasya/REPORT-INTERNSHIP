<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Edit Divisi</h6>
                    <hr class="horizontal dark my-3">
                    <div class="card-body">
                        <form role="form text-left" action="{{ route('Divisi.update', $Divisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="program_id" value="{{ $Divisi->program_id }}">
                            <input type="hidden" name="status" value="{{ $Divisi->status }}">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Nama Divisi</label>
                                <input type="text" class="form-control" name="nama_divisi"
                                    value="{{ $Divisi->nama_divisi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Detail</label>
                                <textarea class="form-control" aria-label="With textarea" name="detail" rows="9" required>{{ $Divisi->detail }}</textarea>
                            </div>
                            <div class="text-end">
                                <a href="javascript:history.back()" class="btn bg-gradient-danger"><i
                                        class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a>
                                <button type="submit" class="btn bg-gradient-dark"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Talent Divisi</h6>
                    <hr class="horizontal dark my-3">
                    <div class="card-body">
                        <form role="form text-left" action="{{ route('Divisi.update', $Divisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            @foreach ($Talent as $item)
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">{{ $item->name }}</label>
                                    <input type="number" class="form-control" name="criteria[{{ $item->name }}]"
                                    value="{{ json_decode($Divisi->criteria)->{$item->name}??0 }}" required>
                                
                                </div>
                            @endforeach

                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
