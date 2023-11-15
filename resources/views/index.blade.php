<!DOCTYPE html>

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="/assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sidak IST </title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="/logo/icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <style>
        @media (max-width: 768px) {
            .brand-name {
                display: none;
            }
        }

        body {
            background:
                linear-gradient(rgb(255, 255, 255), rgba(53, 196, 236, 0.884), rgba(255, 255, 255, 0.884)),
                url('/logo/background.png') no-repeat;
        }
    </style>
</head>

{{--

<body style="background-image: url('/logo/gambar1.png'); background-repeat: no-repeat;"> --}}

    <body>

        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fs-5" id="exampleModalLabel">Logout</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Apakah Anda yakin ingin keluar?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <nav
            class="main-header navbar navbar-expand navbar-detached d-flex justify-content-between bg-navbar-theme px-3">
            <div class="container">
                <a class="navbar-brand text-primary" href="/">
                    <img src="/logo/icon.png" alt="Logo" class="img-fluid" style="max-width: 50px;">
                    <span class="fs-3 mt-3" style="color: #21366F">Sidak IST</span>
                </a>

                <div class="navbar-nav-right d-flex align-items-end navbar-expand-xl" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        @auth
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <span class="brand-name" style='color: #21366F'>{{ Auth()->user()->name }}</span>
                                <i class='bx bxs-user-circle' style='font-size: 24px; color: #21366F'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ Auth()->user()->name }}</span>
                                                <small class="text-muted">{{ Auth()->user()->posisi_id }} - {{
                                                    Auth()->user()->jabatan_id }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/dashboard">
                                        <i class="bx bx-home me-2"></i>
                                        <span class="align-middle" style='color: #21366F'>Dashoard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/userprofile">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle" style='color: #21366F'>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle" style='color: #21366F'>Log Out</span>
                                    </a>

                                </li>
                            </ul>
                        </li>
                        @endauth

                        @guest
                        <a class="navbar-brand" href="/login" style="color: #21366F">Login</a>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container mt-5">
            <div class="p-4">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <img src="/logo/icon.png" class="img-fluid" style="max-width: 250px;">
                        <h2 class="text-capitalize" style="color: #00154e">
                            Sistem Data Absensi Karyawan (Sidak) pada
                        </h2>
                        <h1 class="text-capitalize" style="color: #00154e">PT. Indah Samudera Tech
                        </h1>
                        <p class="lead" style="color: #00154e">
                            sistem ini hanya untuk kelola data absensi karyawan
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <footer class="text-center fixed-bottom bg-white mt-3" style="color: #21366F">
            <div class="footer-below">
                <div class="container">
                    <div class="row p-3">
                        <div class="col-lg-6">
                            <span>Copyright &copy; Sidak
                                <?= date('Y') ?>
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <span class="float-lg-right">PT. Indah Samudera Tech</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/assets/vendor/libs/popper/popper.js"></script>
        <script src="/assets/vendor/js/bootstrap.js"></script>
        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/vendor/js/menu.js"></script>
        <script src="/assets/js/main.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>

</html>