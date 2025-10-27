<?php

namespace Database\Seeders;

use App\Models\RefPangkatGolongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefPangkatGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['pangkat' => 'Asisten Ahli', 'golongan' => 'III/b'],
            ['pangkat' => 'Lektor', 'golongan' => 'III/c'],
            ['pangkat' => 'Lektor Kepala', 'golongan' => 'IV/a'],
            ['pangkat' => 'Guru Besar (Profesor)', 'golongan' => 'IV/c'],
        ];

        foreach ($data as $item) {
            RefPangkatGolongan::create($item);
        }
    }
}
