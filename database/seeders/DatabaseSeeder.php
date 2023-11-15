<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Company;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PosisiSeeder;
use Database\Seeders\AbsensiSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\JabatanSeeder;
use Database\Seeders\KaryawanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JabatanSeeder::class,
            PosisiSeeder::class,
            KaryawanSeeder::class,
            AbsensiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
