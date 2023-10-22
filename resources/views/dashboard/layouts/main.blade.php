<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ExploreRoutes</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('skydash/template') }}/js/select.dataTables.min.css">
    <link rel="stylesheet"
        href="{{ asset('skydash/template') }}/public/skydash/template/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('skydash/template') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('skydash/template') }}/images/logoku.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-8"><img
                        src="{{ asset('skydash/template') }}/images/ExploreRoutes.png" width="150" height="500"
                        class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ asset('skydash/template') }}/index.html"><img
                        src="{{ asset('skydash/template') }}/images/logo-kecil.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">

                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('skydash/template') }}/images/faces/admin.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-2 me-5">
                                        <img src="{{ asset('skydash/template') }}/images/faces/admin.jpg"
                                            class="mr-2" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                    <div class="d-flex mt-2" style="font-size: 16px"><b>{{ auth()->user()->name }}</b>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="ti-power-off text-primary"></i>
                                        Logout
                                    </button>
                                </form>

                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('type.index') }}">
                                <i class="icon ti-dashboard menu-icon"></i>
                                <span class="menu-title">Tipe Transpotasi</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transportations.index') }}">
                                <i class="icon ti-bookmark-alt menu-icon"></i>
                                <span class="menu-title">Bandara / Stasiun</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rutes.index') }}">
                                <i class="icon ti-map-alt menu-icon"></i>
                                <span class="menu-title">Rute Perjalanan</span>
                            </a>
                        </li>


                        <li class="nav-item mt-3">
                            <small class="ps-2 ms-1 text-uppercase text-xs font-weight-bolder opacity-9">Account
                                pages</small>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pengguna.index') }}">
                                <i class="icon-paper menu-icon"></i>
                                <span class="menu-title">Data Pengguna</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('payments.index') }}">
                                <i class="icon ti-shopping-cart-full menu-icon"></i>
                                <span class="menu-title">Pesanan</span>
                            </a>
                        </li>
                    @else
                        <!-- Menu Penumpang -->
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pemesanan.index') }}">
                                <i class="icon ti-shopping-cart-full menu-icon"></i>
                                <span class="menu-title">Riwayat</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

            <!-- partial -->
            @yield('konten')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('skydash/template') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('skydash/template') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('skydash/template') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('skydash/template') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('skydash/template') }}/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('skydash/template') }}/js/off-canvas.js"></script>
    <script src="{{ asset('skydash/template') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('skydash/template') }}/js/template.js"></script>
    <script src="{{ asset('skydash/template') }}/js/settings.js"></script>
    <script src="{{ asset('skydash/template') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('skydash/template') }}/js/dashboard.js"></script>
    <script src="{{ asset('skydash/template') }}/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
