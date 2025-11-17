<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dupak\Kegiatan;

class DupakKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatan = [
            // Pendidikan
            [
                'kategori' => 'Pendidikan',
                'sub_kategori' => 'Pendidikan Formal',
                'nama' => 'Doktor (S3)',
                'satuan_hasil' => 'Ijazah',
                'angka_kredit' => 200.00
            ],
            [
                'kategori' => 'Pendidikan',
                'sub_kategori' => 'Pendidikan Formal',
                'nama' => 'Magister (S2)',
                'satuan_hasil' => 'Ijazah',
                'angka_kredit' => 150.00
            ],

            // Pengajaran
            [
                'kategori' => 'Pengajaran',
                'sub_kategori' => 'Melaksanakan Perkuliahan',
                'nama' => 'Mengajar 1 SKS',
                'satuan_hasil' => 'SKS',
                'angka_kredit' => 1.00
            ],
            [
                'kategori' => 'Pengajaran',
                'sub_kategori' => 'Membimbing Seminar',
                'nama' => 'Membimbing mahasiswa seminar',
                'satuan_hasil' => 'Semester',
                'angka_kredit' => 1.00
            ],

            // Penelitian
            [
                'kategori' => 'Penelitian',
                'sub_kategori' => 'Publikasi Ilmiah',
                'nama' => 'Jurnal internasional bereputasi',
                'satuan_hasil' => 'Artikel',
                'angka_kredit' => 40.00
            ],
            [
                'kategori' => 'Penelitian',
                'sub_kategori' => 'Publikasi Ilmiah',
                'nama' => 'Jurnal internasional',
                'satuan_hasil' => 'Artikel',
                'angka_kredit' => 30.00
            ],
            [
                'kategori' => 'Penelitian',
                'sub_kategori' => 'Publikasi Ilmiah',
                'nama' => 'Jurnal nasional terakreditasi',
                'satuan_hasil' => 'Artikel',
                'angka_kredit' => 25.00
            ],

            // Pengabdian Masyarakat
            [
                'kategori' => 'Pengabdian',
                'sub_kategori' => 'Pengabdian Masyarakat',
                'nama' => 'Menduduki jabatan pimpinan pada lembaga pemerintahan',
                'satuan_hasil' => 'Semester',
                'angka_kredit' => 5.00
            ],
            [
                'kategori' => 'Pengabdian',
                'sub_kategori' => 'Pengabdian Masyarakat',
                'nama' => 'Melaksanakan pengembangan hasil pendidikan dan penelitian',
                'satuan_hasil' => 'Program',
                'angka_kredit' => 3.00
            ],

            // Penunjang
            [
                'kategori' => 'Penunjang',
                'sub_kategori' => 'Organisasi Profesi',
                'nama' => 'Menjadi anggota dalam organisasi profesi',
                'satuan_hasil' => 'Tahun',
                'angka_kredit' => 1.00
            ],
            [
                'kategori' => 'Penunjang',
                'sub_kategori' => 'Penghargaan',
                'nama' => 'Memperoleh penghargaan',
                'satuan_hasil' => 'Penghargaan',
                'angka_kredit' => 3.00
            ],
        ];

        foreach ($kegiatan as $k) {
            Kegiatan::create($k);
        }
    }
}