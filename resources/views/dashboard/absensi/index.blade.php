@extends('dashboard.partials.main')

@section('page')
Data Absensi
@endsection

@section('content')


<div class="container">

       <div class="card">


        <div class="row g-3 align-items-center m-3">
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AbsenModal"
                    onclick="takeSnapshot()">
                    Absen
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FilterModal">
                    Select
                </button>
                <button type="button" class="btn btn-secondary" id="resetDates">Reset</button>
                <a id="exportButton" href="{{ route('absensi.export', ['selected_date' => request('start_date')]) }}"
                    class="btn btn-success ">Ekspor</a>
            </div>
        </div>

        @include('dashboard.absensi.absen')
        @include('dashboard.absensi.filter')

        <div class="table-responsive text-nowrap p-3">
            <table id="dataTable1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>NIP</th>
                        <th>Karyawan</th>
                        <th>Jabatan</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                        <th>Tempat</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-capitalize">
                    @foreach ($absensi as $key => $absen)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{
                            \Carbon\Carbon::parse($absen->tanggal)->timezone('Asia/Jakarta')->formatLocalized('%d
                            %B %Y') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($absen->tanggal)->timezone('Asia/Jakarta')
                            ->format('H:i')}}
                        </td>

                        <td>{{ $absen->karyawan->nip }}</td>
                        <td>{{ $absen->karyawan->name }}</td>
                        <td>{{ $absen->karyawan->jabatan }}</td>
                        <td>{{ $absen->karyawan->posisi }}</td>
                        <td>{{ $absen->status }}</td>
                        @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')

                        <td>
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $absen->latitude }},{{ $absen->longitude }}"
                                class="btn btn-primary btn-sm" target="blank">
                                <i class="bi bi-geo-alt-fill"></i> lihat
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

<script>
    // Fungsi untuk mengatur ulang nilai input tanggal dan mengirim permintaan filter ke server
    document.getElementById('resetDates').addEventListener('click', function() {
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
        // Kirim permintaan filter tanpa parameter tanggal ke server
        window.location.href = "{{ route('absensi.index') }}";
    });

    document.getElementById('resetDates1').addEventListener('click', function() {
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
    });
</script>

<script>
    function exportToExcel(event) {
        event.preventDefault();

        // Mengambil semua data dari DataTable
        var table = $('#dataTable1').DataTable();

        // Mengonversi data dari DataTable menjadi bentuk array
        var data = table.rows().data().toArray();

        // Membuat array untuk menyimpan data yang akan di-eksport
        var exportData = [];

        // Menambahkan header kolom ke dalam data yang akan di-eksport (tanpa kolom "Aksi")
        var header = [];
        table.columns().every(function (index) {
            var columnHeader = this.header().textContent;
            if (columnHeader !== "Aksi") {
                header.push(columnHeader);
            }
        });
        exportData.push(header);

        // Menambahkan data ke dalam array (tanpa kolom "Aksi")
        for (var i = 0; i < data.length; i++) {
            var rowData = data[i];
            rowData.pop(); // Menghapus kolom "Aksi"
            exportData.push(rowData);
        }

        // Mengonversi data menjadi file Excel
        var ws = XLSX.utils.aoa_to_sheet(exportData);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        // Men-download file Excel
        XLSX.writeFile(wb, 'data_absensi.xlsx');
    }

    var exportButton = document.querySelector('#exportButton');
    exportButton.addEventListener('click', exportToExcel);

</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const nipInput = document.getElementById('nip');
        const namaKaryawanSelect = document.getElementById('nama');
        const jabatanSelect = document.getElementById('jabatan');
        const posisiSelect = document.getElementById('posisi');

        nipInput.addEventListener('change', function () {
            const selectedNIP = nipInput.value;
            // Implementasi AJAX atau periksa data secara lokal berdasarkan NIP
            // Misalnya, jika Anda memiliki data karyawan dalam bentuk JavaScript object:
            const karyawanData = {
                '00001': { nama: 'Nama 1', jabatan: 'Jabatan 1', posisi: 'Posisi 1' },
                '00002': { nama: 'Nama 2', jabatan: 'Jabatan 2', posisi: 'Posisi 2' },
            };

            if (karyawanData[selectedNIP]) {
                namaKaryawanSelect.value = selectedNIP;
                jabatanSelect.value = karyawanData[selectedNIP].jabatan;
                posisiSelect.value = karyawanData[selectedNIP].posisi;
            } else {
                namaKaryawanSelect.value = '';
                jabatanSelect.value = '';
                posisiSelect.value = '';
            }
        });
    });
</script> --}}

<script>
    // Mendapatkan lokasi pengguna
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    // Menunjukkan posisi dan mengisi input latitude dan longitude
    function showPosition(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
    }

    // Memanggil fungsi getLocation saat halaman dimuat
    window.onload = getLocation;
</script>

@endsection
