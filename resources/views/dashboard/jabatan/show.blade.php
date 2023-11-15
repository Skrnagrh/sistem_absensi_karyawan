@extends('dashboard.partials.main')

@section('page')
Struktur Jabatan {{ $jabatan->name }}
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
                            $karyawanInPosition = [];
                            @endphp

                            @foreach ($karyawan as $karyawanItem)
                            @if ($karyawanItem->jabatan == ($jabatan ? $jabatan->name : null) && $karyawanItem->posisi
                            == $posisi->nama)
                            @php
                            $karyawanInPosition[] = $karyawanItem->name;
                            @endphp
                            @endif
                            @endforeach

                            @if (count($karyawanInPosition) > 1)
                            <ul>
                                @foreach ($karyawanInPosition as $name)
                                <li class="text-capitalize">{{ $name }}</li>
                                @endforeach
                            </ul>
                            @elseif (count($karyawanInPosition) == 1)
                            <span class="text-capitalize">{{ $karyawanInPosition[0] }}</span>
                            @else
                            <span>-</span>
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