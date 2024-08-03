<?php

namespace Database\Factories\Market;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'amount' => fake()->randomNumber(),
            'delivery_time' => fake()->randomNumber(),
            'delivery_time_unit' => fake()->word(),
            'status' => 0,
        ];
    }
}
