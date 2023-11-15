<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $karyawan = Karyawan::all();
        $startDate = now()->subDays(7);

        foreach ($karyawan as $karyawan) {
            $currentDate = $startDate->copy(); // Salin tanggal mulai untuk setiap karyawan baru

            for ($i = 0; $i < 7; $i++) {
                $absen = rand(1, 100) <= 80;
                $status = $absen ? 'Hadir' : 'Tidak Hadir';

                $longitude = mt_rand(95, 141) + (mt_rand(0, 999) / 10000);
                $latitude = mt_rand(-11, 6) + (mt_rand(0, 999) / 10000);

                Absensi::create([
                    'karyawan_id' => $karyawan->id,
                    'tanggal' => $currentDate,
                    'status' => $status,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);

                $currentDate->addDay(); // Tambah satu hari setelah membuat entri absensi
            }
        }
    }
}
