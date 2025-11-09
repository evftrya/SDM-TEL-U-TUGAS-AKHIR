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
            'TENAGA LEPAS HARIAN', 
            'PEGAWAI PROFESSIONAL', 
            'PEGAWAI TETAP', 
            'CALON PEGAWAI TETAP',
            'TENAGA PERBANTUAN',
            'OURSOURCING'
        ];

        foreach ($statuses as $status) {
            RefStatusPegawai::create([
                'status_pegawai' => $status,
            ]);
        }
    }
}
