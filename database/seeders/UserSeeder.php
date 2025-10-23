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
        // Create admin user
        User::factory()->admin()->create([
            'nama_lengkap' => 'Admin Telkom University',
            'email_institusi' => 'admin@telkomuniversity.ac.id',
        ]);

        // Create test user accounts
        User::factory()->create([
            'nama_lengkap' => 'Budi Santoso',
            'email_institusi' => 'budi.santoso@telkomuniversity.ac.id',
        ]);

        User::factory()->create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email_institusi' => 'siti.nurhaliza@telkomuniversity.ac.id',
        ]);

        // Create additional random users
        // User::factory(10)->create();
    }
}
