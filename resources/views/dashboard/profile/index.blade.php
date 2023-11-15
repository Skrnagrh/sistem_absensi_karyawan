@extends('dashboard.partials.main')

@section('page')
Profile
@endsection

@section('content')
<div class="row justify-content-center my-3">

    <div class="col-md-4">
        <div class="card border-primary shadow p-2 m-2" style="background-color: #0D6EFD;">
            <div class="row justify-content-center p-1">
                <img src="/logo/logo-card.png">
            </div>

            <div class="row justify-content-center mt-3">
                @if ($karyawan)
                @if ($karyawan->image)
                <img src="{{ 'storage/' . $karyawan->image }}" class="nav-icon" style="width: 210px">
                @else
                <img src="/default.png" class="nav-icon" style="width: 210px">
                @endif
                @else
                <img src="/default.png" class="nav-icon" style="width: 210px">
                @endif
            </div>

            <div class="row justify-content-center mt-3 p-1">
                <div class="col-md-12">
                    <h5 class="text-center text-light text-uppercase"><strong>{{ auth()->user()->name }}</strong></h5>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-light text-capitalize" style="margin-top: -2%">{{ auth()->user()->induk
                        }}</p>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-light text-capitalize" style="margin-top: -5%">{{
                        auth()->user()->posisi_id}} - {{ auth()->user()->jabatan_id}} </p>
                </div>
            </div>
            <div class="row justify-content-center p-1" style="border: 2px solid #ffff">
                <h6 class="text-center text-light text-uppercase">Jl. 45 Serang banten - indonesia</h6>
            </div>
        </div>
    </div>


    <div class="col-md-5 mt-2">
        <div class="card border-primary shadow">
            <div class="card-body">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mt-2" href="{{ route('profile.edit') }}" data-bs-toggle="modal"
                    data-bs-target="#userprofileEdit" style="cursor: pointer">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profile
                </a>
                <hr>
                <a class="dropdown-item mt-2" data-bs-toggle="modal" data-bs-target="#editpassword"
                    style="cursor: pointer">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ubah Password
                </a>

                <div class="dropdown-divider"></div>
                @include('dashboard.profile.edit')
                @include('dashboard.profile.password')
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')

@endsection
