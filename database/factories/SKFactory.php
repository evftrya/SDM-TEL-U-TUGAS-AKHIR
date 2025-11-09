<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SK>
 */
class SKFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_sk' => $this->faker->optional()->numerify('SK-###/YPT'),
            'tanggal_berlaku' => $this->faker->optional()->date(),
            'file_sk' => $this->faker->optional()->lexify('file_????.pdf'),
            'tipe_sk' => $this->faker->randomElement(['LLDIKTI', 'Pengakuan YPT']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
