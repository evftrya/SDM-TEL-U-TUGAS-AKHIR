<?php

namespace Database\Seeders;

use App\Models\RefStatusPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefStatusPegawai>
 */
class RefStatusPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['Dosen Tetap','Dosen'],
            ['Dosen Tamu','Dosen'],
            [   'Honorer','Dosen'],
            ['Dosen Paruh Waktu'    ,'Dosen'],
            ['Pegawai Tetap','TPA'],
            ['Pegawai Kontrak','TPA'],
            ['Magang','TPA'],
            ['Outsourcing','TPA'],
        ];

        foreach ($statuses as $status) {
            RefStatusPegawai::create([
                'status_pegawai' => $status[0],
                'tipe_pegawai' => $status[1],
            ]);
        }
    }
}
