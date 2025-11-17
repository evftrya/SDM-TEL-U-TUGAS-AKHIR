<?php

namespace Database\Seeders;

use App\Models\RefBagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefBagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_bagian' => 'Sekretariat & Perencanaan Strategis','kode'=>'SEKPER'],
            ['nama_bagian' => 'Pusat Teknologi Informasi','kode'=>'PTI'],
            ['nama_bagian' => 'Akademik','kode'=>'AKADEMIK'],
            ['nama_bagian' => 'Pasca Sarjana dan Advance Learning','kode'=>'PASCA'],
            ['nama_bagian' => 'Keuangan','kode'=>'KEU'],
            ['nama_bagian' => 'Logistik dan Aset','kode'=>'LOG'],
            ['nama_bagian' => 'Sumber Daya Manusia','kode'=>'SDM'],
            ['nama_bagian' => 'Pemasaran & Admisi','kode'=>'PADMI'],
            ['nama_bagian' => 'Pengembangan Karir, Alumni, & Endowment','kode'=>'ALM'],
            ['nama_bagian' => 'Kemahasiswaan','kode'=>'KEMA'],
            ['nama_bagian' => 'Kerja Sama Strategis & Kantor Urusan Internasional','kode'=>'KERJA'],
            ['nama_bagian' => 'Penelitian dan Pengabdian Masyarakat','kode'=>'LPPM'],
            ['nama_bagian' => 'Bandung Techno Park','kode'=>'BTP'],
        ];

        foreach ($data as $item) {
            RefBagian::create($item);
        }
    }
}
