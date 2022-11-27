<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app() -> getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/kopiloe-fav.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/kopiloe-fav.png') }}">
  <title>Admin Panel KopiLoe.</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('css/admin/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/admin/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('css/admin/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/admin/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="justify-content-center page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">Masukan Email dan Password untuk Login</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Masukan Email" aria-label="Email" required />
                      <br>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Masukan Password" aria-label="Password" required />
                      <br>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" />
                      <label class="form-check-label" for="rememberMe">Ingatkan Saya.</label>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Kamu belum memiliki akun ?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Daftar</a>
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/admin/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/admin/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/admin/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/admin/plugins/smooth-scrollbar.min.js') }}"></script>
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
  <script src="{{ asset('js/admin/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>