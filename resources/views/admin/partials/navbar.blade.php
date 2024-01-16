<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
    id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
         
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                 
                </div>
            </div>
            <ul class="navbar-nav justify-content-end" >
                <div class="dropdown">
                <li class="nav-item d-flex align-items-center dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <a href="/logout" class="nav-link text-body font-weight-bold px-0" id="userDropdown" role="button">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">{{Auth::user()->name}}</span>
                  </a>
                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/logout">Sign Out</a></li>
                  </ul>
              </div>
                
            </ul>
        </div>
    </div>
</nav>
