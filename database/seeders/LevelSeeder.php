<?php

namespace Database\Seeders;

use App\Models\Level;
// use App\Models\RefPangkatGolongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id'=>'f091dbb2-7532-4c5e-b94f-9e4bc045dc7a','nama_level' => 'Direktur', 'singkatan_level' => 'DIR', 'atasan_level' =>null],
            ['id'=>'0de96d16-c872-4195-9f45-e837d659b571','nama_level' => 'Wakil Direktur', 'singkatan_level' => 'WADIR', 'atasan_level' =>'f091dbb2-7532-4c5e-b94f-9e4bc045dc7a'],
            ['id'=>'316e0668-9bb5-4f27-867d-5a209cbcd228','nama_level' => 'Kepala Bagian', 'singkatan_level' => 'KABAG', 'atasan_level' =>'0de96d16-c872-4195-9f45-e837d659b571'],
            ['id'=>'be5adb40-ae9f-4fa4-aeeb-d6b37394b1e7','nama_level' => 'Dekan', 'singkatan_level' => 'DEKAN', 'atasan_level' =>'0de96d16-c872-4195-9f45-e837d659b571'],
            ['id'=>'037b9e77-a77b-4bee-820d-e52b62c74c92','nama_level' => 'Kepala Urusan', 'singkatan_level' => 'KAUR', 'atasan_level' =>'316e0668-9bb5-4f27-867d-5a209cbcd228'],
            ['id'=>'e33399cf-0049-45bb-b9e7-db5cd8661b18','nama_level' => 'Kepala Program Studi', 'singkatan_level' => 'KAPRODI', 'atasan_level' =>'0de96d16-c872-4195-9f45-e837d659b571'],
            ['id'=>'05e59440-c012-4b20-83e7-eb841bb44525','nama_level' => 'Anggota Bagian', 'singkatan_level' => 'ANGGOTA', 'atasan_level' =>'037b9e77-a77b-4bee-820d-e52b62c74c92'],
            ['id'=>'813b1182-c975-406a-a60a-e75b7ace942d','nama_level' => 'Anggota Program Studi', 'singkatan_level' => 'ANGGOTA', 'atasan_level' =>'e33399cf-0049-45bb-b9e7-db5cd8661b18'],
        ];

        // $count = 0;
        // $jabatan = [];
        // $id = [];
        for($i=0;$i<count($data);$i++) {
            Level::create($data[$i]);
        }  

    }
}
