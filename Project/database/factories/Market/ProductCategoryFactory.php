<?php

namespace Database\Factories\Market;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'slug' => fake()->slug(),
            'image' => fake()->imageUrl(),
            'status' => 0,
            'show_in_menu' => 0,
            'tags' => fake()->word(),
            'parent_id' => 1,
        ];      
    }
}
