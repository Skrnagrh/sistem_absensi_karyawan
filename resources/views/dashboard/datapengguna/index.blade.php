@extends('dashboard.partials.main')

@section('page')
Data Pengguna
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="col-md-3">
            <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#penggunacreate"
                data-bs-whatever="@mdo"><i class="fas fa-edit text-light"></i> Tambah Data</button>
            @include('dashboard.datapengguna.create')
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="text-transform: capitalize">
                        <th>No</th>
                        <th>Id Karyawan</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Posisi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user1 as $user)
                    <tr style="text-transform: capitalize">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->induk }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->jabatan_id }}</td>
                        <td>{{ $user->posisi_id }}</td>
                        <td>
                            <button href="/datapengguna/{{ $user->id }}/edit" class="btn btn-sm btn-warning text-light"
                                data-bs-toggle="modal" data-bs-target="#penggunaedit{{ $user->id }}">
                                Ubah
                            </button>
                            <button class="btn btn-sm btn-danger border-0" data-bs-toggle="modal"
                                data-bs-target="#Hapus{{ $user->id }}">
                                Hapus
                            </button>

                            @include('dashboard.datapengguna.edit')

                            @include('dashboard.datapengguna.delete')

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('sweetalert::alert')

@endsection