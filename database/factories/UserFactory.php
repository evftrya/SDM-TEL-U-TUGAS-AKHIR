<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pilihan jenis kelamin acak
        $gender = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $nama = $this->faker->name($gender === 'Laki-laki' ? 'male' : 'female');

        return [
            'nama_lengkap' => $nama,
            'telepon' => $this->faker->unique()->numerify('08##########'),
            'alamat' => $this->faker->unique()->address(),
            'email_institusi' => $this->faker->unique()->safeEmailDomain() 
                ? 'user'.$this->faker->unique()->randomNumber(3).'@telkomuniversity.ac.id'
                : $this->faker->unique()->companyEmail(),
            'jenis_kelamin' => $gender,
            'tempat_lahir' => $this->faker->unique()->city(),
            'tgl_lahir' => $this->faker->unique()->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
            'tgl_bergabung' => $this->faker->unique()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'email_pribadi' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'username' => Str::slug($nama).'_'.$this->faker->unique()->randomNumber(3),
            // default password for factory users (hashed)
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'is_admin' => $this->faker->boolean(10), // 10% kemungkinan admin
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user is an admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_admin' => true,
        ]);
    }
}
