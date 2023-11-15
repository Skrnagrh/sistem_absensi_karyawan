@extends('dashboard.partials.main')

@section('page')
Data Posisi
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="col-md-3 m-3">
            @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#posisicreate"><i
                    class="fas fa-edit text-light"></i> Tambah Data</button>
            @include('dashboard.posisi.create')
            @endif
        </div>

        <div class="table-responsive text-nowrap p-3">
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="text-transform: capitalize">
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Jabatan</th>
                        <th>Nama Karyawan</th>
                        @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                        <th>action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 text-capitalize">
                    @foreach ($posisis as $posisi)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $posisi->nama }}</td>
                        <td>{{ $posisi->jabatan->name }}</td>
                        <td>
                            @php
                            $karyawans = \App\Models\Karyawan::where('posisi', $posisi->nama)->where('jabatan',
                            $posisi->jabatan->name)->get();
                            $count = $karyawans->count();
                            @endphp

                            @if ($count > 1)
                            <ul>
                                @foreach ($karyawans as $karyawan)
                                <li>{{ $karyawan->name }}</li>
                                @endforeach
                            </ul>
                            @elseif ($count === 1)
                            {{ $karyawans->first()->name }}
                            @else
                            <span class="text-danger">belum ada karyawan diposisi ini</span>
                            @endif
                        </td>



                        @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                        <td>
                            {{-- <a href="{{ route('posisi', ['jabatan_id' => $loop->iteration]) }}"
                                class="btn btn-sm btn-success">Struktur {{ $posisi->jabatan->name }}</a> --}}

                            <button href="/posisi/{{ $posisi->id }}/edit" class="btn btn-sm btn-warning text-light"
                                data-bs-toggle="modal" data-bs-target="#editposisi{{ $posisi->id }}">
                                Ubah
                            </button>

                            @include('dashboard.posisi.edit')

                            <button class="btn btn-sm btn-danger border-0" data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $posisi->id }}">
                                Hapus
                            </button>
                            @include('dashboard.posisi.delete')
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
