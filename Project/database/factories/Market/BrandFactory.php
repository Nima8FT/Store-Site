<?php

namespace Database\Factories\Market;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'persian_name' => fake()->name(),
            'original_name' => fake()->name(),
            'logo' => fake()->imageUrl(),
            'tags' => fake()->word(),
        ];
    }
}
