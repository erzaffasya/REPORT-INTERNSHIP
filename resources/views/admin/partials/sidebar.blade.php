<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main"
    style="background-color: #ffffff; border-right: 1px solid #e0e0e0; box-shadow: 2px 0 12px rgba(0, 0, 0, 0.03); z-index: 1030; position: fixed; height: 100vh;">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex align-items-center" href="/" target="_blank">
            <img src="{{ asset('tadmin/assets/img/pt-ajk.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <div class="ms-1">
                <span class="ms-1 mb-0 font-weight-bold fs-6">Monitoring System</span>
                {{-- <div class="ms-1">PT AJK</div> --}}
            </div>
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">

    <div class="collapse navbar-collapse w-auto h-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- Dashboard --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                    <div class="me-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->role == 'admin')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('Program.*') ? 'active' : '' }}" href="{{ route('Program.index') }}">
                        <div class="me-2 d-flex justify-content-center align-items-center">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <span class="nav-link-text ms-1">Program</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('user.*') ? 'active' : '' }}" href="{{ url('user') }}">
                        <div class="me-2 d-flex justify-content-center align-items-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('talent.*') ? 'active' : '' }}" href="{{ route('talent.index') }}">
                        <div class="me-2 d-flex justify-content-center align-items-center">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="nav-link-text ms-1">Talent</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'magang')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Program</h6>
                </li>

                @foreach ($AksesDivisi->where('user_id', Auth::user()->id) as $item)
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#program" class="nav-link {{ Route::is('yyy.*') ? 'active' : '' }}" aria-controls="program" role="button" aria-expanded="false">
                            <div class="me-2 d-flex justify-content-center align-items-center">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <span class="nav-link-text ms-1">{{ $item->divisi->program->judul }}</span>
                        </a>
                        <div class="collapse {{ Route::is('indexLaporan*','Program*','showLaporan') ? 'show' : '' }}" id="program">
                            <ul class="nav ms-4 ps-3">
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('indexLaporan','showLaporan') ? 'active' : '' }}"
                                        href="{{ url('Divisi/'.$item->divisi->id.'/Laporan') }}">
                                        <span class="sidenav-mini-icon"><i class="fas fa-pencil-alt"></i></span>
                                        <span class="sidenav-normal">Laporan Harian</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('Program*') ? 'active' : '' }}"
                                        href="{{ route('Program.show', $item->divisi->program->id) }}">
                                        <span class="sidenav-mini-icon"><i class="fas fa-eye"></i></span>
                                        <span class="sidenav-normal">Lihat Program</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
</aside>
