<?php

namespace Database\Seeders;

use App\Models\Posisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run()
    {
        $users = [];

        $karyawanData = Karyawan::all();

        foreach ($karyawanData as $karyawan) {
            $users[] = [
                'name' => $karyawan->name,
                'induk' => $karyawan->nip,
                'jabatan_id' => $karyawan->jabatan,
                'posisi_id' => $karyawan->posisi,
                'image' => $karyawan->image,
                'password' => Hash::make('password'),
            ];
        }


        DB::table('users')->insert($users);
    }
}
