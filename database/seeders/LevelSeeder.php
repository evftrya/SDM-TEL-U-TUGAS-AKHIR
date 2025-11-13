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
            ['urutan'=>1,'id'=>null,'isi'=>['nama_level' => 'Direktur', 'singkatan_level' => 'DIR', 'atasan_level' => null],'atasan_level' => null],
            ['urutan'=>2,'id'=>null,'isi'=>['nama_level' => 'Wakil Direktur', 'singkatan_level' => 'WADIR', 'atasan_level' => null],'atasan_level' => 1],
            ['urutan'=>3,'id'=>null,'isi'=>['nama_level' => 'Kepala Bagian', 'singkatan_level' => 'Kabag', 'atasan_level' => null],'atasan_level' => 2],
            ['urutan'=>4,'id'=>null,'isi'=>['nama_level' => 'Dekan', 'singkatan_level' => 'DEKAN', 'atasan_level' => null],'atasan_level' => 2],
            ['urutan'=>5,'id'=>null,'isi'=>['nama_level' => 'Kepala Urusan', 'singkatan_level' => 'KAUR', 'atasan_level' =>null],'atasan_level' => 3],
            ['urutan'=>6,'id'=>null,'isi'=>['nama_level' => 'Kepala Program Studi', 'singkatan_level' => 'KAPRODI', 'atasan_level' => null],'atasan_level' => 4],
            ['urutan'=>7,'id'=>null,'isi'=>['nama_level' => 'Anggota Bagian', 'singkatan_level' => 'Anggota', 'atasan_level' => null],'atasan_level' => 5],
            ['urutan'=>8,'id'=>null,'isi'=>['nama_level' => 'Anggota Program Studi', 'singkatan_level' => 'Anggota', 'atasan_level' => null],'atasan_level' => 6],
        ];

        $count = 0;
        $id = [];
        foreach ($data as $item) {
            // dd($item);
            $level = Level::create($item['isi']);
            // dd($level->id);
            array_push($id, $level->id); 
            $count++;
        }
        $level = Level::all();
        dd($level);
        // dd($data);

        // dd($id);
        // Level::all();

    }
}
