@section('konten')
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
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('argon/assets/img/favicon.png') }}">
        <title>
            Argon Dashboard 2 by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('argon') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    </head>

    <body class="">
        <!-- Navbar -->
        <nav
            class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
            <div class="container">
                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white"
                    href="{{ asset('argon/pages/dashboard.html') }}">
                    ExploreRoutes.
                </a>
                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                    aria-label="Toggle navigation">
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
            <div class="page-header align-items-start min-vh-80 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Registrasi!</h1>
                            <p class="text-lead text-white">Pastikan Anda mendaftar terlebih dahulu sebelum menggunakan
                                layanan kami. Terimakasih.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
                    <div class="col-xl-5 col-lg-10 col-md-15 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Sign Up </h5>
                            </div>

                            <div class="card-body">
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">USERNAME</label>
                                        <input type="text" class="form-control @error('username')is-invalid @enderror"
                                            name="username" placeholder="Masukkan Username Kamu" aria-label="Username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">PASSWORD</label>
                                        <input type="password" class="form-control @error('password')is-invalid @enderror"
                                            name="password" placeholder="Masukkan Password Kamu" aria-label="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">NAMA LENGKAP</label>
                                        <input type="text" class="form-control @error('name')is-invalid @enderror"
                                            name="name" placeholder="Masukkan Nama Lengkap Kamu" aria-label="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_penumpang" class="form-label">ALAMAT</label>
                                        <input type="text"
                                            class="form-control @error('alamat_penumpang')is-invalid @enderror"
                                            name="alamat_penumpang" placeholder="Masukkan Alamat Kamu"
                                            aria-label="Username">
                                        @error('alamat_penumpang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_lahir" class="form-label">TANGGAL LAHIR</label>
                                        <input type="date" class="form-control @error('tgl_lahir')is-invalid @enderror"
                                            name="tgl_lahir" aria-label="Username">
                                        @error('tanggal lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">JENIS KELAMIN</label>
                                        <div class="row">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jenis_kelamin"
                                                        id="membershipRadios1" value="Laki-Laki" checked="">
                                                    Laki-Laki</label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="jenis_kelamin"
                                                        id="membershipRadios2" value="Perempuan">
                                                    Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">JENIS KELAMIN</label>
                  <select name="jenis_kelamin" class="form-control" required>
                      <option value="jenis_kelamin" disabled selected>--Pilih Disini--</option>
                      <option value="1">Laki-Laki</option>
                      <option value="2">Perempuan</option>
                  </select>
              </div> --}}

                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">NOMOR TELEPON</label>
                                        <input type="number" class="form-control @error('telepon')is-invalid @enderror"
                                            name="telepon" placeholder="Masukkan Nomor Telepon Kamu"
                                            aria-label="Username">
                                        @error('telepon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Sudah Punya Akun? <a href="/login"
                                            class="text-dark font-weight-bolder">Login Sekarang!</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Indi Rahmadani.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="{{ asset('argon') }}/assets/js/core/popper.min.js"></script>
        <script src="{{ asset('argon') }}/assets/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('argon') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('argon') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
        <script src="{{ asset('argon') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    </body>

    </html>
