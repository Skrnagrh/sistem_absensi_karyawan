@extends('dashboard.partials.main')

@section('page')
Dashboard
@endsection

@section('content')

<?php
date_default_timezone_set('Asia/Jakarta');

$waktu = date("H");

if ($waktu >= 5 && $waktu < 11){
     $salam = "Pagi"; $warna = "green";
}
elseif ($waktu >= 11 && $waktu < 15){
    $salam = "Siang"; $warna = "blue";
}
elseif ($waktu >= 15 && $waktu < 18){
    $salam = "Sore"; $warna = "orange";
}
else{
    $salam = "Malam"; $warna = "red";
    }
?>

@if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
<div class="row">
    <div class="col-lg-9">
        <div class="small-box bg-light p-3 shadow">
            <div class="row">
                <div class="col-md-10">
                    <div class="inner">
                        <h3 id="current-time" style="color: {{ $warna }}"></h3>
                        <h6 class="font-weight-bold">Selamat <span style="color: {{ $warna }}">{{ $salam }}</span>
                            {{ Auth()->user()->name }}.
                        </h6>
                        @if ($latestAbsensi)
                        <span class="font-weight-bold">Terimakasih, anda telah melakukan abensi hari ini pada jam
                            <span style="color: {{ $warna }}">{{
                                \Carbon\Carbon::parse($latestAbsensi->tanggal)->setTimezone('Asia/Jakarta')->format('H:i')
                                }}
                            </span> WIB
                        </span>
                        <br>
                        @else
                        <span style="color: red" class="font-weight-bold">Anda belum melakukan absensi pada hari
                            ini.</span>
                        @endif
                        </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="icon">
                        @if ($karyawans->image)
                        <img src="{{ 'storage/' . $karyawans->image }}" class="img-thumbnail"
                            style="max-width: 110px; max-height: 110px">
                        @else
                        <img src="/default.png" class="img-fluid nav-icon" style="max-width: 110px; max-height: 110px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <a href="/jabatan" class="text-decoration-none">
            <div class="small-box bg-primary p-3 shadow">
                <div class="inner">
                    <h3>{{ $jabatan }}</h3>
                    <p>Data Jabatan</p>
                </div>
                <div class="icon">
                    <i class="bi bi-signpost-split-fill nav-icon"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="/karyawan" class="text-decoration-none">
            <div class="small-box bg-success p-3 shadow">
                <div class="inner">
                    <h3>{{ $karyawan }}</h3>
                    <p>Data Karyawan</p>
                </div>
                <div class="icon">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="/absensi" class="text-decoration-none">
            <div class="small-box bg-info p-3 shadow">
                <div class="inner">
                    <h3>{{ Auth()->user()->induk }}</h3>
                    <p>Data Absensi</p>
                </div>
                <div class="icon">
                    <i class="bi bi-book nav-icon"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="/posisi" class="text-decoration-none">
            <div class="small-box bg-warning p-3 shadow">
                <div class="inner" style="color: #FFFFFF;">
                    <h3>{{ $posisi }}</h3>
                    <p>Data Posisi</p>
                </div>
                <div class="icon">
                    <i class="bi bi-signpost-split-fill nav-icon"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="/datapengguna" class="text-decoration-none">
            <div class="small-box bg-danger p-3 shadow">
                <div class="inner">
                    <h3>{{ $datapengguna }}</h3>
                    <p>Data Pengguna</p>
                </div>
                <div class="icon">
                    <i class="bi bi-person-fill-gear nav-icon"></i>
                </div>
            </div>
        </a>
    </div>
</div>
@else

<div class="col-lg-12">
    <div class="small-box bg-light p-3">
        <div class="row">
            <div class="col-lg-10">
                <div class="inner">
                    <h3 id="current-time" style="color: {{ $warna }}"></h3>
                    @if(!isset($showButton) || $showButton->isEmpty())
                    <h5 class="font-weight-bold">
                        Selamat
                        <span style="color: {{ $warna }}">{{ $salam }}</span> {{ Auth()->user()->name }}.
                    </h5>
                    <span class="font-weight-bold">
                        silahkan lengkapi data anda terlebih dahulu pada halaman <a href="/karyawan"
                            class="text-danger text-decoration-none">Data Karyawan</a> agar bisa melakukan
                        proses absensi.
                    </span>
                    @else
                    <h5 class="font-weight-bold">
                        Selamat
                        <span style="color: {{ $warna }}">{{ $salam }}</span> {{ Auth()->user()->name }}.
                    </h5>

                    @if ($latestAbsensi)
                    <span class="font-weight-bold">Terimakasih, anda telah melakukan abensi hari ini pada jam
                        <span style="color: red">{{ \Carbon\Carbon::parse($latestAbsensi->tanggal)->format('H:i') }}
                        </span>WIB
                    </span>
                    <br>
                    <span class="font-weight-bold">dan selamat beraktivitas semoga selalu diberikan <span
                            style="color: red">keselamatan dan
                            kesehatan</span> dalam
                        bekerja.</span>
                    @else
                    <span style="color: red" class="font-weight-bold">Anda belum melakukan absensi pada hari
                        ini.</span>
                    @endif

                    @endif


                </div>
            </div>
            <div class="col-lg-2">
                <div class="icon">
                    @if ($karyawans)
                    @if ($karyawans->image)
                    <img src="{{ asset('storage/' . $karyawans->image) }}" class="img-thumbnail"
                        style="max-width: 150px; max-height: 150px">
                    @else
                    <img src="/default.png" class="nav-icon" style="width: 100px">
                    @endif
                    @else
                    <img src="/assets/img/male.jpg" class="nav-icon" style="width: 100px">
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4">
            <a href="/jabatan" class="text-decoration-none">
                <div class="small-box bg-primary p-3">
                    <div class="inner">
                        <h3>{{ $jabatan }}</h3>
                        <p>Jabatan</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-signpost-split-fill nav-icon"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="/karyawan" class="text-decoration-none">
                <div class="small-box bg-success p-3">
                    <div class="inner">
                        <h3>{{ $karyawan }}</h3>
                        <p>Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </a>
        </div>

        @if(Auth()->user()->jabatan_id !== 'HRGA' || Auth()->user()->posisi_id !== 'Staff')
        @if(isset($showButton) && !$showButton->isEmpty())
        <div class="col-lg-4">
            <a href="/absensi" class="text-decoration-none">
                <div class="small-box bg-info p-3">
                    <div class="inner">
                        <h3>{{ Auth()->user()->induk }}</h3>
                        <p>Absensi</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-book nav-icon"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @endif
    </div>
</div>
@endif

@include('sweetalert::alert')
<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        var currentTime = hours + ":" + minutes + ":" + seconds;
        document.getElementById("current-time").innerText = currentTime;

        setTimeout(updateTime, 1000);
    }

    updateTime();
</script>
@endsection