<?php

namespace Database\Factories;

use App\Models\RefBagian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tpa>
 */
class TpaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $RefBagian = RefBagian::all();
        $indexRefBagian = fake()->numberBetween(0, count($RefBagian)-1);
        return [
            'users_id' => null,
            'nitk' => $this->faker->unique()->numerify('#############'),
            'bagian_id'=>$RefBagian[$indexRefBagian]['id'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
