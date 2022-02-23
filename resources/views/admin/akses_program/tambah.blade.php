<x-app-layout>
    <div class="container">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Akses Program</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body  px-0 pt-0 pb-2">
                    {{-- <button style="margin-bottom: 10px" class="btn btn-primary success_all" data-url="{{ url('tambahSemuaAksesProgram') }}">Tambahkan semua yang dipilih</button> --}}
                    <table id="datatable-search" class="table align-items-center mb-0">
                        <tr>
                            {{-- <th width="50px"><input type="checkbox" id="master"></th> --}}
                            <th width="80px">No</th>
                            <th>Nama Mahasiswa</th>
                            <th width="100px">Action</th>
                        </tr>
                        @foreach ($user as $item)
                            <tr id="tr_{{ $item->id }}">
                                {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <form action="{{ url('storeAksesProgram') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    <td>
                                        {{-- @if ($AksesDivisi->user_id == $user_id) --}}
                                            <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                            {{-- @else
                                            @endif --}}
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </table>
                </div>

</x-app-layout>
