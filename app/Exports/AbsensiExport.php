<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $tanggal;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function collection()
    {
        // Query data absensi sesuai tanggal
        return Absensi::whereDate('tanggal', $this->tanggal)->get();
    }

    public function headings(): array
    {
        // Menentukan judul kolom dalam file Excel
        return [
            'Nama Karyawan',
            'Tanggal',
            'Status',
        ];
    }
}
