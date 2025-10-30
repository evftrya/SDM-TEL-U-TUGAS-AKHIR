<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_level' => $this->faker->jobTitle(),
            'singkatan_level' => strtoupper($this->faker->lexify('???')),
            'atasan_level' => null,
        ];
    }
}
