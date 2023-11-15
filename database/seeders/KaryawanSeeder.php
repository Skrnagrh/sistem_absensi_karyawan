<?php

namespace Database\Seeders;

use App\Models\Posisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaryawanSeeder extends Seeder
{


    public function run()
    {
        $faker = Faker::create('id_ID');

        $dataKaryawan = [];

        for ($i = 1; $i <= 10; $i++) {
            $jabatan = Jabatan::inRandomOrder()->first();
            $posisi = Posisi::inRandomOrder()->first();

            $data = [
                'user_id' => $i,
                // 'name' => ($i === 1) ? 'Staff' : $faker->name,
                'name' => $faker->name,
                'jabatan' => $jabatan->name,
                'posisi' => $posisi->nama,
                'idcard' => '123456789' . $i,
                'tempat' => 'Tempat Lahir ' . $i,
                'tgllahir' => '1990-01-0' . $i,
                'jenkel' => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
                'agama' => $i % 2 == 0 ? 'Islam' : 'Kristen',
                'pendidikan' => $i % 2 == 0 ? 'S1' : 'D3',
                'nohp' => '08123456789' . $i,
                'lulus' => '200' . $i,
                'status' => $i % 2 == 0 ? 'Menikah' : 'Belum Menikah',
                'alamat' => 'Alamat Karyawan ' . $i,
                'image' => '',
            ];

            // Pengecekan jabatan dan posisi untuk ID 1
            if ($i === 1) {
                $data['nip'] = '00001';
                $data['jabatan'] = 'HRGA';
                $data['posisi'] = 'Staff';
            } else {
                $data['nip'] = str_pad($i, 5, '0', STR_PAD_LEFT);
            }

            $dataKaryawan[] = $data;
        }

        // Insert data karyawan ke tabel karyawans
        DB::table('karyawans')->insert($dataKaryawan);
    }
}
