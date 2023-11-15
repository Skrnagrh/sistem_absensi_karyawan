<?php

// database/seeders/PosisiSeeder.php
namespace Database\Seeders;

use App\Models\Posisi;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosisiSeeder extends Seeder
{
    
    public function run()
    {
        // Ambil semua ID jabatan yang ada dalam database
        $jabatanIds = Jabatan::pluck('id')->all();

        $posisiNames = ['Ketua', 'Staff', 'Sekretaris', 'Bendahara', 'Anggota'];

        foreach ($jabatanIds as $jabatanId) {
            foreach ($posisiNames as $posisiName) {
                Posisi::create([
                    'nama' => $posisiName,
                    'jabatan_id' => $jabatanId,
                ]);
            }
        }
    }
}
