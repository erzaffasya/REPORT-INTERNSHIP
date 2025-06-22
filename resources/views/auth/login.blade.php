<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.7
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-dashboard-pro
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="tadmin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="tadmin/assets/img/favicon.png">
  <title>
    Monitoring Kinerja Magang
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="tadmin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="tadmin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="tadmin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="tadmin/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
        {{-- Internship Management --}}
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('tadmin/assets/img/login-background.png'); ">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            {{-- <h1 class="text-white mb-2 mt-5">Welcome</h1>
            <p class="text-lead text-white">Internship Management System</p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center mb-0 pb-0">
              <h5 class="mb-0">Sign in</h5>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="{{route('login')}}" class="text-start">
                @csrf
                <div class="mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                </div>
                <div class="mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="tadmin/assets/js/core/popper.min.js"></script>
  <script src="tadmin/assets/js/core/bootstrap.min.js"></script>
  <script src="tadmin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="tadmin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="tadmin/assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="tadmin/assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="tadmin/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
