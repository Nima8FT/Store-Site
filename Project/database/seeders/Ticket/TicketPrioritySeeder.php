<?php

namespace Database\Seeders\Ticket;

use App\Models\Ticket\TicketPriority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketPriority::factory()->count(3)->create();
    }
}
