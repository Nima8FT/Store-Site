<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'slug' => fake()->slug(),
            'summary' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'status' => 0,
            'commentable' => 0,
            'tags' => fake()->word(),
            'author_id' => 1,
            'category_id' => 1,
        ];
    }
}
