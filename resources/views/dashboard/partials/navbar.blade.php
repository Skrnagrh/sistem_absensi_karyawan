<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0f4c81;"
    id="layout-navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #fff;" data-widget="pushmenu" href="#">
                <i class="fas fa-bars mx-3"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <a class="nav-link dropdown-toggle hide-arrow text-light mx-3 d-md-block" href="javascript:void(0);"
            data-bs-toggle="dropdown">
            <span class="d-none d-sm-inline text-capitalize">{{ Auth()->user()->name }} </span>
            <span class=""><i class="nav-icon fas fa-user-circle"></i></span>
        </a>



        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <ul class="dropdown-menu dropdown-menu-end mx-3">
                <li>
                    <a class="dropdown-item text-dark">
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
                    <a class="dropdown-item" href="/">
                        <i class="nav-icon fas fa-home"></i>
                        <span class="align-middle">Homepage</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/userprofile">
                        <i class="nav-icon fas fa-user"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span class="align-middle">Logout</span>
                    </a>

                </li>
            </ul>
        </li>
    </ul>
</nav>