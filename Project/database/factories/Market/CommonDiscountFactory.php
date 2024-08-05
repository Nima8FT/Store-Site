<?php

namespace Database\Factories\Market;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market\CommonDiscount>
 */
class CommonDiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'percentage' => fake()->randomNumber(),
            'discount_ceiling' => fake()->randomNumber(),
            'minimal_order_amount' => fake()->randomNumber(),
            'status' => 0,
        ];
    }
}
