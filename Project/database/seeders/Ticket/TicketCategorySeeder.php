<?php

namespace Database\Seeders\Ticket;

use App\Models\Ticket\TicketCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::factory()->count(3)->create();
    }
}
