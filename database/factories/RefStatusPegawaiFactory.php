<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefStatusPegawai>
 */
class RefStatusPegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_pegawai' => null,
            'tipe_pegawai'=>null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
