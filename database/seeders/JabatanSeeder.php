<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatanNames = ['HRGA', 'Safety', 'Cleaning', 'OHE', 'HELPER'];

        foreach ($jabatanNames as $jabatanName) {
            Jabatan::create(['name' => $jabatanName]);
        }
    }
}
