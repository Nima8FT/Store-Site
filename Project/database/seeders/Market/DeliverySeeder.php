<?php

namespace Database\Seeders\Market;

use App\Models\Market\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery::factory()->count(3)->create();
    }
}
