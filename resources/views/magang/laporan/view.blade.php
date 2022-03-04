<x-app-layout>
  <main class="main-content max-height-vh-100 h-100">
    <div class="container-fluid my-3 py-3">
      <div class="row mb-5">
        <div class="col-lg-3">
          <div class="card position-sticky top-1">
            <ul class="nav flex-column bg-white border-radius-lg p-3">
              <li class="nav-item pt-2">
                <a class="nav-link text-body bg-danger" data-scroll="" href="{{ route('indexLaporan', $laporan->divisi_id) }}">
                  <div class="icon me-2">
                    <svg class="text-white" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <title>spaceship</title> <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Rounded-Icons" transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero"> <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)"> <g id="spaceship" transform="translate(4.000000, 301.000000)"> <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path> <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z" id="Path"></path> <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" id="color-2" opacity="0.598539807"></path> <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" id="color-3" opacity="0.598539807"></path> </g> </g> </g> </g> </svg>
                  </div>
                  <span class="text-sm text-white">Kembali</span>
                </a>
              </li>
              <li class="nav-item mx-3 mt-2 text-start">
                <h5>{{$laporan->created_at->isoFormat('D MMM')}} - {{$laporan->created_at->addDays(6)->isoFormat('D MMM Y')}}</h5>
                <span class="text-dark font-weight-bold d-block text-sm">Minggu ke-1</span>
              </li>
              @if ($laporan->isVerif == 0 || $laporan->isVerif == 2)
                <li class="nav-item mx-3 mt-3 text-start">
                  <span class="text-dark font-weight-bold d-block text-sm">Revisi</span>
                  <p align = "justify">
                    {{ $laporan->komentar }}
                  </p>
                </li>
              @endif
              <li class="nav-item my-3 text-center">
                @if (($laporan->jumat != NULL && $laporan->mingguan == NULL) || $laporan->isVerif == 0)
                  <button type="button" class="btn bg-gradient-info mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#mingguanModal-{{$laporan->id}}">
                    Buat Laporan Mingguan
                  </button>
                @else
                  <button type="button" class="btn bg-gradient-info mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#mingguanModal" disabled>
                    Buat Laporan Mingguan
                  </button>
                @endif
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 mt-lg-0 mt-4">
          <!-- Card Profile -->
          <div class="card card-body" id="profile">
            <div class="row justify-content-center align-items-center">
              <div class="col-sm-auto col-4">
                <div class="avatar avatar-xl position-relative">
                  <img src="{{asset('tadmin/assets/img/bruce-mars.jpg')}}" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                </div>
              </div>
              <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <h5 class="mb-1 font-weight-bolder">
                    {{ Auth::user()->name }}
                  </h5>
                  <p class="mb-0 font-weight-bold text-sm">
                    {{ $laporan->divisi->nama_divisi }}
                  </p>
                </div>
              </div>
              <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                <div class="form-check form-switch ms-2">
                  {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()"> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- Card Laporan Mingguan -->
          @if ($laporan->mingguan != NULL)
            <div class="card mt-4">
              <div class="card-header">
                <h5>Laporan Mingguan</h5>
              </div>
              <div class="row">
                <div class="card-body d-sm-flex pt-0">
                  <div class="d-flex align-items-center mb-sm-0 mb-4">
                    <div class="ms-2 mx-4">
                      <p align = "justify">
                        {!! $laporan->mingguan !!}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @else

          @endif
          <!-- Card Laporan Harian -->
          <div class="card mt-4">
            <div class="card-header">
              <h5>{{$laporan->created_at->format('l, d M Y')}}</h5>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="ms-2 mx-4">
                    <p align = "justify">
                      {!! $laporan->senin !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                @if ($laporan->senin == NULL || $laporan->isVerif == 0)
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#seninModal-{{$laporan->id}}">
                    Buat Laporan
                  </button>
                @endif
              </div>
            </div>
          </div>
          <!-- Card Laporan Harian -->
          <div class="card mt-4">
            <div class="card-header">
              <h5>{{$laporan->created_at->addDays(1)->format('l, d M Y')}}</h5>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="ms-2 mx-4">
                    <p align = "justify">
                      {!! $laporan->selasa !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <!-- Button trigger modal -->
                @if (($laporan->senin != NULL && $laporan->selasa == NULL) || $laporan->isVerif == 0 )
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#selasaModal-{{$laporan->id}}">
                    Buat Laporan
                  </button>
                @elseif ($laporan->senin == Null)
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#selasaModal" disabled>
                    Buat Laporan
                  </button>
                @endif
              </div>
            </div>
          </div>
          <!-- Card Laporan Harian -->
          <div class="card mt-4">
            <div class="card-header">
              <h5>{{$laporan->created_at->addDays(2)->format('l, d M Y')}}</h5>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="ms-2 mx-4">
                    <p align = "justify">
                      {!! $laporan->rabu !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <!-- Button trigger modal -->
                @if (($laporan->selasa != NULL && $laporan->rabu == NULL) || $laporan->isVerif == 0 )
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#rabuModal-{{$laporan->id}}">
                    Buat Laporan
                  </button>
                @elseif ($laporan->selasa == Null)
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#rabuModal" disabled>
                    Buat Laporan
                  </button>
                @endif
              </div>
            </div>
          </div>
          <!-- Card Laporan Harian -->
          <div class="card mt-4">
            <div class="card-header">
              <h5>{{$laporan->created_at->addDays(3)->format('l, d M Y')}}</h5>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="ms-2 mx-4">
                    <p align = "justify">
                      {!! $laporan->kamis !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <!-- Button trigger modal -->
                @if (($laporan->rabu != NULL && $laporan->kamis == NULL) || $laporan->isVerif == 0 )
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#kamisModal-{{$laporan->id}}">
                    Buat Laporan
                  </button>
                @elseif ($laporan->rabu == Null)
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#kamisModal" disabled>
                    Buat Laporan
                  </button>
                @endif
              </div>
            </div>
          </div>
          <!-- Card Laporan Harian -->
          <div class="card mt-4">
            <div class="card-header">
              <h5>{{$laporan->created_at->addDays(4)->format('l, d M Y')}}</h5>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="ms-2 mx-4">
                    <p align = "justify">
                      {!! $laporan->jumat !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body d-sm-flex pt-0">
                <!-- Button trigger modal -->
                @if (($laporan->kamis != NULL && $laporan->jumat == NULL) || $laporan->isVerif == 0 )
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#jumatModal-{{$laporan->id}}">
                    Buat Laporan
                  </button>
                @elseif ($laporan->kamis == Null)
                  <button type="button" class="btn bg-gradient-primary mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#jumatModal" disabled>
                    Buat Laporan
                  </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="seninModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="seninModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="seninModalLabel">Senin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor" aria-label="With textarea" name="senin" rows="5" required>{{$laporan->senin}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="selasaModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="selasaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="selasaModalLabel">Selasa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor"  aria-label="With textarea" name="selasa" rows="5" required>{{$laporan->selasa}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rabuModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="rabuModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="rabuModalLabel">Rabu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor"  aria-label="With textarea" name="rabu" rows="5" required>{{$laporan->rabu}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="kamisModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="kamisModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="kamisModalLabel">Kamis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor"  aria-label="With textarea" name="kamis" rows="5" required>{{$laporan->kamis}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="jumatModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="jumatModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="jumatModalLabel">Jumat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor"  aria-label="With textarea" name="jumat" rows="5" required>{{$laporan->jumat}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mingguanModal-{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="mingguanModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mingguanModalLabel">Mingguan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" action="{{ route('updateLaporan',$laporan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <textarea class="form-control tinymce-editor" aria-label="With textarea" name="mingguan" rows="5" required>{{$laporan->mingguan}} </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  @push('scripts')  
  <script type="text/javascript">
      tinymce.init({
          selector: 'textarea.tinymce-editor',
          width: 450,
          height: 300,
          menubar: false,
          plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | ' +
              'bold italic backcolor | alignleft aligncenter ' +
              'alignright alignjustify | bullist numlist outdent indent | ' +
              'removeformat | help',
          content_css: '//www.tiny.cloud/css/codepen.min.css'
      });
  </script>
  @endpush
</x-app-layout>