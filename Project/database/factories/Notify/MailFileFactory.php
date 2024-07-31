<?php

namespace Database\Factories\Notify;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MailFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_mail_id' => 1,
            'file_path' => fake()->url(),
            'file_size' => fake()->randomNumber(),
            'file_type' => fake()->format(),
            'status' => 0,
        ];
    }
}
