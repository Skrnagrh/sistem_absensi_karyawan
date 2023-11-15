@extends('dashboard.partials.main')

@section('page')
Data {{ $jabatan->name }}
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="table-responsive text-nowrap p-3">
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="text-transform: capitalize">
                        <th>No</th>
                        <th>Nama Posisi Jabatan</th>
                        <th>Nama Karyawan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($posisis as $posisi)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td class="text-capitalize">{{ $posisi->nama }}
                            @if ($jabatan)
                            {{ $jabatan->name }}
                            @else
                            Jabatan tidak ditemukan
                            @endif
                        </td>
                        <td>
                            @php
                            $karyawans = [];
                            foreach ($karyawan as $karyawanItem) {
                                if ($karyawanItem->jabatan == ($jabatan ? $jabatan->name : null) && $karyawanItem->posisi == $posisi->nama) {
                                    $karyawans[] = $karyawanItem;
                                }
                            }
                            $count = count($karyawans);
                            @endphp

                            @if ($count > 0)
                                @if ($count > 1)
                                    <ul>
                                        @foreach ($karyawans as $karyawan)
                                            <li>{{ $karyawan->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{ $karyawans[0]->name }}
                                @endif
                            @else
                                <span class="font-weight-bold">-</span>
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

