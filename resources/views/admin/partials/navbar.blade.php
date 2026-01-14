<nav class="navbar navbar-main navbar-expand-lg position-sticky top-1 px-4 shadow-sm border-radius-xl z-index-sticky"
    id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-2 px-0 d-flex justify-content-between align-items-center">

        <!-- Sidebar toggle button for mobile -->
        <a href="javascript:;" class="nav-link text-body p-0 d-xl-none" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-dark"></i>
                <i class="sidenav-toggler-line bg-dark"></i>
                <i class="sidenav-toggler-line bg-dark"></i>
            </div>
        </a>

        <!-- Sidebar toggle button for desktop -->
        <div class="sidenav-toggler d-none d-xl-block">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>

        <!-- Search or Other Content Placeholder -->
        <div class="flex-grow-1 d-flex justify-content-end align-items-center">
            <!-- Optional input/search can go here -->
        </div>

        <!-- User dropdown -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center text-dark" href="#" id="userDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>
                    <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>