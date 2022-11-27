<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/admin/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/admin/favicon.png') }}">
        
        <title>Admin Panel KopiLoe.</title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
       
        <link href="{{ asset('css/admin/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/admin/nucleo-svg.css') }}" rel="stylesheet" />
        
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <link id="pagestyle" href="{{ asset('css/admin/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    </head>

    <body class="g-sidenav-show bg-gray-100">

    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('img/admin/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">{{ $profile -> username }}</h5>
                            <p class="mb-0 font-weight-bold text-sm">Admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profil</p>
                                <button class="btn btn-primary btn-sm ms-auto" onclick="window.location.href = '/dashboard';">Kembali Ke Dashboard</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="text-uppercase text-sm">Informasi Admin</p>

                            <form action="{{ route('edit_profile') }}" method="POST" onSubmit="if(!confirm('Apakah Anda Ingin Mengedit Profile?.')){return false;}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullname-edit" class="form-control-label">Nama Lengkap</label>
                                            <input name="username" id="fullname-edit" class="form-control" type="text" placeholder="{{ $profile -> username }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-edit" class="form-control-label">Alamat Email</label>
                                            <input name="email" id="email-edit" class="form-control" type="email" placeholder="{{ $profile -> email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-edit" class="form-control-label">Kata Sandi</label>
                                            <input name="password" id="password-edit" class="form-control" type="text" placeholder="ganti kata sandi">
                                        </div>
                                    </div>

                                    <button class="btn btn-primary">Edit Informasi Admin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    
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