<?php

namespace Database\Seeders\Ticket;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()->count(1)->create();
    }
}
 