@extends('dashboard.partials.main')

@section('page')
Data Jabatan
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="col-md-5">
             @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
            <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#jabatancreate"><i
                    class="fas fa-edit text-light"></i> Tambah Data</button>
            @include('dashboard.jabatan.create')
            @endif
        </div>

        <div class="table-responsive text-nowrap p-3">
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="text-transform: capitalize">
                        <th>No</th>
                        <th>Nama</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($jabatan as $jabatan)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $jabatan->name }}</td>
                        <td>
                            <a href="/jabatan/{{ $jabatan->id }}" class="btn btn-sm btn-success">Struktur </a>

                             @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                            <button href="/jabatan/{{ $jabatan->id }}/edit" class="btn btn-sm btn-warning text-light"
                                data-bs-toggle="modal" data-bs-target="#editjabatan{{ $jabatan->id }}">
                                Ubah
                            </button>

                            @include('dashboard.jabatan.edit')

                            <button class="btn btn-sm btn-danger border-0" data-bs-toggle="modal"
                                data-bs-target="#hapusModal">
                                Hapus
                            </button>
                            @include('dashboard.jabatan.delete')
                            @endif
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
