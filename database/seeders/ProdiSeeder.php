<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $data = $data = [
            ['nama_prodi' => 'Teknik Telekomunikasi', 'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Elektro',         'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Komputer',       'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Industri',       'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Sistem Informasi',      'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Teknik Logistik',       'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Informatika',           'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Teknologi Informasi',   'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Rekayasa Perangkat Lunak', 'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Sains Data',             'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Bisnis Digital',         'fakultas_id' => 'Fakultas Ekonomi dan Bisnis']
        ];

        $allFakultas = Fakultas::all();

        foreach ($data as $item) {
            // dd($item);
            $item['fakultas_id'] = Fakultas::where('nama_fakultas', $item['fakultas_id'])->first()->id;
            // dd($item);
            Prodi::create($item);
        }
    }
}
