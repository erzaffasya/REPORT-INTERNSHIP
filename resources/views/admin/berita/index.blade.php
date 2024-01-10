<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
    <a href="javascript:history.back();" style="margin-left: 1rem; color: gray;">
          <svg fill="#808080" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 476.213 476.213" xml:space="preserve">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                  <polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 57.427,253.107 476.213,253.107 "></polygon>
              </g>
          </svg>
          Kembali
      </a>

        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center d-flex flex-col">
                <h5 class="mb-0 d-block">Berita Acara</h6>
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#tambahBerita"><i class="fas fa-plus"></i>&nbsp; Berita </button>
              </div>
            </div>
          </div>
          <div class="card-body  px-0 pt-0 pb-2 table-responsive">
    
            <table id="datatable-search" class="table align-items-center mb-0">
    
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100px">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"width="100px">Aksi</th>
                </tr>
              </thead>
    
              <tbody>
              @foreach ($berita as $i)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $i->judul }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0" style="max-width: 800px; overflow: hidden; text-overflow: ellipsis; white-space: wrap; display: flex; justify-content: center; align-items: center;`">{{ $i->deskripsi }} </p>
                  

                  </td>
                  <td>
                    <div class="col-12 text-end">
                        <a type="button" class="btn btn-sm bg-gradient-warning mb-0" data-bs-toggle="modal" data-bs-target="#editBerita-{{$i->id}}"><i class="fas fa-user"></i>&nbsp; Edit</a>

                        
                      <form id="form-delete" action="{{url('deleteUser', $i->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm bg-gradient-danger mb-0 show_confirm" style="padding: 10px 24px"><i class="fas fa-trash"></i>&nbsp; Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <div class="col-md-4">
        <div class="modal fade" id="tambahBerita" tabindex="-1" role="dialog" aria-labelledby="tambahBerita"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="storeUser">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Judul</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="5"></textarea>
                            </div>
                          
                          
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn bg-gradient-primary">Simpan!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($berita as $i)
    <div class="col-md-4">
        <div class="modal fade" id="editBerita-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editBeritaTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('updateUser', $i->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$i->id}}">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Judul</label>
                                <input type="text" class="form-control" name="name" value="{{$i->judul}}">
                            </div>

                          
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="5">{{$i->deskripsi}}</textarea>
                            </div>
                           
                           
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn bg-gradient-primary">Perbarui!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
      @push('scripts')
      <script>
              const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: true
  });
  $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
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
