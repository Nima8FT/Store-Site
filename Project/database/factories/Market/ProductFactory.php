<?php

namespace Database\Factories\Market;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'introduction' => fake()->sentence(),
            'slug' => fake()->slug(),
            'image' => fake()->imageUrl(),
            'weight' => 15,
            'length' => 15,
            'width' => 15,
            'height' => 15,
            'price' => 5000,
            'marketable' => 0,
            'status' => 0,
            'tags' => fake()->word(),
            'sold_number' => 10,
            'frozen_number' => 10,
            'marketable_number' => 10,
            'brand_id' => 7,
            'category_id' => 5,
        ];
    }
}
