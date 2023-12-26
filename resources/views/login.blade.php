<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="style/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="style/assets/img/favicon.png"> --}}
    <title>
        PDAM Surya Sembada
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="style/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="style/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="style/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="style/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        {{-- <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{route('admin.dashboard')}}">
                            PDAM Surya Sembada
                        </a> --}}
                        <img src="/icon/logopdam.png" class="navbar-brand-img  ms-lg-0 ms-3 " style="max-height: 35px; max-width:auto" >
                        {{-- <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button> --}}
                        {{-- <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{route('admin.dashboard')}}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100 min-vw-100">
                <div class="container" >
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-9 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            <b>Opps!</b> {{ session('error') }}
                                        </div>
                                    @endif
                                    <form role="form" action="{{ route('login_proses') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="email" class="form-control form-control-lg"
                                                placeholder="email" aria-label="Email">
                                        </div>
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password">
                                        </div>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative  h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                                <img src="../icon/pose1.png" style="max-height: 450px; max-width: 300px" >
                                {{-- <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="style/assets/js/core/popper.min.js"></script>
    <script src="style/assets/js/core/bootstrap.min.js"></script>
    <script src="style/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="style/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="style/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
