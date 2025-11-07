<?php

namespace Database\Seeders;

use App\Models\RefJabatanFungsional;
use App\Models\refJabatanFungsionalKeahlian;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    $this->call([
        // FakultasSeeder::class,
        RefJenjangPendidikanSeeder::class,
        RefPangkatGolonganSeeder::class,
        RefStatusPegawaiSeeder::class,
        RefJabatanFungsionalAkademikSeeder::class,
        RefJabatanFungsionalKeahlianSeeder::class,
        FakultasSeeder::class,
        ProdiSeeder::class,
        UserSeeder::class,
    ]);


    
}

}
