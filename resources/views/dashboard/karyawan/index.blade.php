@extends('dashboard.partials.main')

@section('page')
Data Karyawan
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="col-md-3">
            @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
            <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createkaryawan"><i
                    class="fas fa-edit text-light"></i> Tambah Data</button>
            @include('dashboard.karyawan.create')
            @endif

            @if(isset($showTambahButton) && $showTambahButton)
            <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createkaryawan">
                <i class="fas fa-edit text-light"></i> Tambah Data
            </button>
            @include('dashboard.karyawan.create')
            @endif

        </div>
        <div class="table-responsive text-nowrap p-3">
            @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                @else
                <table class="table table-bordered my-5">
                    @endif
                    <thead>
                        <tr style="text-transform: capitalize">
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Posisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-capitalize">
                        @foreach ($karyawan1 as $karyawan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $karyawan->nip }}</td>
                            <td>{{ $karyawan->name }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>{{ $karyawan->posisi }}</td>
                            <td>
                                <a href="/karyawan/{{ $karyawan->nip }}" class="btn btn-sm btn-success"
                                    data-bs-toggle="modal" data-bs-target="#showKaryawan{{ $karyawan->nip }}">
                                    Detail
                                </a>

                                <a href="/karyawan/{{ $karyawan->nip }}/edit" class="btn btn-sm btn-warning text-light"
                                    data-bs-toggle="modal" data-bs-target="#editKaryawan{{ $karyawan->nip }}">
                                    Ubah
                                </a>

                                {{-- <a href="/karyawan/{{ $karyawan->nip }}" class="btn btn-sm btn-secondary"
                                    data-bs-toggle="modal" data-bs-target="#print{{ $karyawan->nip }}">
                                    Print
                                </a> --}}

                                @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                                <button class="btn btn-sm btn-danger border-0" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $karyawan->nip }}">
                                    Hapus
                                </button>
                                @include('dashboard.karyawan.delete')
                                @endif
                                {{-- @include('dashboard.karyawan.show') --}}
                                @include('dashboard.karyawan.edit')
                                @include('dashboard.karyawan.print')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

</div>

@include('sweetalert::alert')

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
