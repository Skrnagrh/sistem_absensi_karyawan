<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link text-decoration-none">
        <img src="/logo/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light text-uppercase"><strong>Sistem Absensi</strong></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"
                        id="dashboard">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/jabatan" class="nav-link {{ Request::is('jabatan*') ? 'active' : '' }}" id="jabatan">
                        <i class="nav-icon bi bi-signpost-split-fill"></i>
                        <p>Data Jabatan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/karyawan" class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}" id="karyawan">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Data Karyawan</p>
                    </a>
                </li>

                @if(Auth()->user()->jabatan_id !== 'HRGA' || Auth()->user()->posisi_id !== 'Staff')
                @if(isset($showButton) && !$showButton->isEmpty())
                <li class="nav-item">
                    <a href="/absensi" class="nav-link {{ Request::is('absensi*') ? 'active' : '' }}" id="absensi">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Data Absensi</p>
                    </a>
                </li>
                @endif
                @endif

                @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                <li class="nav-item">
                    <a href="/absensi" class="nav-link {{ Request::is('absensi*') ? 'active' : '' }}" id="absensi">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Data Absensi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/posisi" class="nav-link {{ Request::is('posisi*') ? 'active' : '' }}" id="posisi">
                        <i class="bi bi-signpost-split-fill"></i>
                        <p>Data posisi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/datapengguna" class="nav-link {{ Request::is('datapengguna*') ? 'active' : '' }}"
                        id="datapengguna">
                        <i class="nav-icon bi bi-person-fill-gear"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
