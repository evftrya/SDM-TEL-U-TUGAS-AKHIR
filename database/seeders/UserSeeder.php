<?php

namespace Database\Seeders;

use App\Models\Tpa;
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
        $user1 = User::factory()->admin()->create([
            'nama_lengkap' => 'Admin Telkom University',
            'email_institusi' => 'admin@telkomuniversity.ac.id',
        ]);

        Tpa::factory()->create([
            'users_id' => $user1->id,
            'nitk' => fake()->unique()->numerify('#############'),
        ]);

        // Create test user accounts
        $user2 = User::factory()->create([
            'nama_lengkap' => 'Budi Santoso',
            'email_institusi' => 'budi.santoso@telkomuniversity.ac.id',
        ]);

        Tpa::factory()->create([
            'users_id' => $user2->id,
            'nitk' => fake()->unique()->numerify('#############'),
        ]);

        $user3 = User::factory()->create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email_institusi' => 'siti.nurhaliza@telkomuniversity.ac.id',
        ]);

        Tpa::factory()->create([
            'users_id' => $user3->id,
            'nitk' => fake()->unique()->numerify('#############'),
        ]);

        // Create additional random users
        // User::factory(10)->create();
    }
}
