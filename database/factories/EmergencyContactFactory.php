<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emergency_contact>
 */
class EmergencyContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Emergency_contact::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => null,
            'nama_lengkap' => $this->faker->name(),
            'status_hubungan' => $this->faker->randomElement(['Orang Tua', 'Saudara', 'Teman', 'Pasangan', 'Lainnya']),
            'telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'email' => $this->faker->optional()->safeEmail(),
        ];
    }
}
