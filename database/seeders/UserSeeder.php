<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin pegawai
        User::factory()->admin()->create([
            'nama_lengkap' => 'Admin Telkom University',
            'username' => 'admin',
            'email' => 'admin@telkomuniversity.ac.id',
            'gelar_depan' => 'Dr.',
            'gelar_belakang' => 'M.T.',
        ]);

        // Create test pegawai accounts
        User::factory()->create([
            'nama_lengkap' => 'Budi Santoso',
            'username' => 'budi.santoso',
            'email' => 'budi.santoso@telkomuniversity.ac.id',
            'jenis_kelamin' => 'Laki-laki',
        ]);

        User::factory()->create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'username' => 'siti.nurhaliza',
            'email' => 'siti.nurhaliza@telkomuniversity.ac.id',
            'jenis_kelamin' => 'Perempuan',
        ]);

        // Create additional random pegawai
        // User::factory(10)->create();
    }
}
