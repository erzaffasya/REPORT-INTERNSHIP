<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Pekerjaan Teknis</h6>
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#tambahkerja1"><i class="fas fa-plus"></i>&nbsp; Tambah Data</button>
              </div>
            </div>
          </div>
          <div class="card-body  px-0 pt-0 pb-2 table-responsive">
    
            <table id="datatable-search" class="table align-items-center mb-0">
    
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100px">No.</th>
                  <th width="70%" class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Uraian Pekerjaan</th>
                  <th class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Kategori Pekerjaan</th>
                  <th class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
    
              <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">1</span>
                  </td>
                  <td class="align-middle text-start">
                    <p class="text-xs font-weight-bold mb-0">Mengoperasikan paket program pengolah angka (spreadsheet/ excel)</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">001</p>
                  </td>
                  <td>
                    <div class="col-12 text-start">
                        <a type="button" class="btn btn-sm bg-gradient-warning mb-0" href=""><i class="fas fa-user"></i>&nbsp; Edit</a>
                      <form id="form-delete" action="" method="POST" style="display: inline">
                        <button type="submit" class="btn btn-sm bg-gradient-danger mb-0 show_confirm" style="padding: 10px 24px"><i class="fas fa-trash"></i>&nbsp; Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Pekerjaan Non Teknis</h6>
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#tambahkerja2"><i class="fas fa-plus"></i>&nbsp; Tambah Data</button>
              </div>
            </div>
          </div>
          <div class="card-body  px-0 pt-0 pb-2 table-responsive">
    
            <table id="datatable-search" class="table align-items-center mb-0">
    
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100px">No.</th>
                  <th width="70%" class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Uraian Pekerjaan</th>
                  <th class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Kategori Pekerjaan</th>
                  <th class="text-uppercase text-secondary text-xs ps-2 font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
    
              <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">1</span>
                  </td>
                  <td class="align-middle text-start">
                    <p class="text-xs font-weight-bold mb-0">Disiplin</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">001</p>
                  </td>
                  <td>
                    <div class="col-12 text-start">
                        <a type="button" class="btn btn-sm bg-gradient-warning mb-0" href=""><i class="fas fa-user"></i>&nbsp; Edit</a>
                      <form id="form-delete" action="" method="POST" style="display: inline">
                        <button type="submit" class="btn btn-sm bg-gradient-danger mb-0 show_confirm" style="padding: 10px 24px"><i class="fas fa-trash"></i>&nbsp; Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      
    {{-- Modal Teknis --}}
    <div class="col-md-4">
        <div class="modal fade" id="tambahkerja1" tabindex="-1" role="dialog" aria-labelledby="tambahkerja1Title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Form Pekerjaan Teknis</h6>
                        <button type="button" class="btn-close text-dark text-md" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="storeUser">
                            @csrf
                            <div class="mb-2">
                                <label>Uraian pekerjaan</label>
                                <textarea class="multisteps-form__input form-control" name="detail" type="text">
                                </textarea>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlSelect1">Kategori Pekerjaan</label>
                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                        <option value="admin">001</option>
                                        <option value="magang">002</option>
                                </select>
                            </div>
                            
                            <div class="modal-footer mt-3" style="border-top: 0!important;">
                                <button type="button" class="btn mb-0 bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal NonTeknis --}}
    <div class="col-md-4">
        <div class="modal fade" id="tambahkerja2" tabindex="-1" role="dialog" aria-labelledby="tambahkerja2Title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Form Pekerjaan Non Teknis</h6>
                        <button type="button" class="btn-close text-dark text-md" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="storeUser">
                            @csrf
                            <div class="mb-2">
                                <label>Uraian pekerjaan</label>
                                <textarea class="multisteps-form__input form-control" name="detail" type="text">
                                </textarea>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlSelect1">Kategori Pekerjaan</label>
                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                        <option value="admin">001</option>
                                        <option value="magang">002</option>
                                </select>
                            </div>
                            
                            <div class="modal-footer mt-3" style="border-top: 0!important;">
                                <button type="button" class="btn mb-0 bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn mb-0 bg-gradient-primary">Submit!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
