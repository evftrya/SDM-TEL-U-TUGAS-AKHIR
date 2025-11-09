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
            ['nama_prodi' => 'Teknik Telekomunikasi','kode'=>'TT', 'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Elektro','kode'=>'TE',         'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Komputer','kode'=>'TK',       'fakultas_id' => 'Fakultas Teknik Elektro'],
            ['nama_prodi' => 'Teknik Industri','kode'=>'TI',       'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Sistem Informasi','kode'=>'SI',      'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Teknik Logistik','kode'=>'TL',       'fakultas_id' => 'Fakultas Rekayasa Industri'],
            ['nama_prodi' => 'Informatika','kode'=>'IF',           'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Teknologi Informasi','kode'=>'IT',   'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Rekayasa Perangkat Lunak','kode'=>'RPL', 'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Sains Data','kode'=>'DS',             'fakultas_id' => 'Fakultas Informatika'],
            ['nama_prodi' => 'Bisnis Digital','kode'=>'DB',         'fakultas_id' => 'Fakultas Ekonomi dan Bisnis']
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
