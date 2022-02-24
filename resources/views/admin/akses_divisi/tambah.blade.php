<x-app-layout>
        <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card mt-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Akses Divisi</h6>
                </div>
              </div>
            </div>
            <div class="card-body  px-0 pt-0 pb-2">
      
              <table id="datatable-search" class="table align-items-center mb-0">
      
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100px">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"width="100px">Aksi</th>
                  </tr>
                </thead>
      
                <tbody>
                @foreach ($user as $i)
                  <tr>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-xs font-weight-bold mb-0">{{ $i->user->name }}</p>
                    </td>
                    <td>
                      <form action="{{url('storeAksesDivisi')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$i->user->id}}">
                        <input type="hidden" name="divisi_id" value="{{$divisi->id}}">
                        <button type="submit" class="btn btn-success btn-sm" >Tambah</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        @push('scripts')
        <script>
                const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
        </script>
        @endpush
    </x-app-layout>