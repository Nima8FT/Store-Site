<?php

namespace Database\Factories\Ticket;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => 0,
            'seen' => 1,
            'refrence_id' => 3,
            'user_id' => 1,
            'category_id' => 4,
            'priority_id' => 4,
            'ticket_id' => 1,   
        ];
    }
}
