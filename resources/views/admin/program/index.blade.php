<x-app-layout>
    <div class="container-fluid py-4">
        <section class="py-3">
            <div class="row">
                <div class="col-md-8 me-auto text-left">
                    <h5>Some of Our Awesome Projects</h5>
                    <p>This is the paragraph where you can write more details about your projects. Keep you user engaged
                        by providing meaningful information.</p>
                </div>
            </div>
            <div class="row mt-lg-4 mt-2">

                @foreach ($Program as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex">
                                    <div class="avatar avatar-xl bg-gradient-dark border-radius-md p-2">
                                        <img src="{{ asset('tadmin/assets/img/small-logos/logo-slack.svg') }}"
                                            alt="slack_logo">
                                    </div>
                                    <div class="ms-3 my-auto">
                                        <a href="{{route('Program.show',$item->id)}}">
                                            <h6>{{ $item->judul }}</h6>
                                        </a>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-secondary ps-0 pe-2"
                                                id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-lg"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3"
                                                aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('Program.edit',$item->id)}}">Ubah</a>
                                                <a class="dropdown-item" href="{{url('destroyProgram', $item->id)}}">Hapus</a>
                                                <a class="dropdown-item" href="{{route('Program.show',$item->id)}}">Detail Program</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm mt-3">{{$item->detail}}</p>
                                <hr class="horizontal dark">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="text-sm mb-0">{{$item->anggota->count()}}</h6>
                                        <p class="text-secondary text-sm font-weight-bold mb-0">Anggota</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h6 class="text-sm mb-0">{{ \Carbon\Carbon::parse($item->periode_berakhir)->format('d M Y') }}</h6>
                                        <p class="text-secondary text-sm font-weight-bold mb-0">Periode Berakhir</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <a href="{{route('Program.create')}}">
                                <i class="fa fa-plus text-secondary mb-3"></i>
                                <h5 class=" text-secondary"> Tambah Program </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>

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
