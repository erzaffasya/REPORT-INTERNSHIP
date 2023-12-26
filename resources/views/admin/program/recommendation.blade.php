<x-app-layout>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../tadmin/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../tadmin/assets/img/bruce-mars.jpg" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $Program->judul }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            M-Knows Consulting
                        </p>
                    </div>
                </div>
                {{-- <form method="post" action="{{ route('laporanManual') }}">
                    @csrf
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center">
                        <i class="fas fa-info" aria-hidden="true"></i>
                    </button>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Informasi Program</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                {{-- <a class="btn " data-bs-toggle="modal" data-bs-target="#tambahdivisi">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Profile"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $Program->detail }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        {{-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                    Name:</strong> &nbsp; Alec M. Thompson</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Location:</strong> &nbsp; USA</li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                </a>
                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </a>
                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
