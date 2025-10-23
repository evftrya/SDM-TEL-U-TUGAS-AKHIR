<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_fakultas' => 'Fakultas Teknik'],
            ['nama_fakultas' => 'Fakultas Ekonomi dan Bisnis'],
            ['nama_fakultas' => 'Fakultas Ilmu Komputer'],
            ['nama_fakultas' => 'Fakultas Komunikasi dan Desain'],
            ['nama_fakultas' => 'Fakultas Industri Kreatif'],
        ];

        foreach ($data as $item) {
            Fakultas::create($item);
        }
    }
}
