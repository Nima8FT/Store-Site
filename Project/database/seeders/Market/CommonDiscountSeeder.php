<?php

namespace Database\Seeders\Market;

use App\Models\Market\CommonDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommonDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommonDiscount::factory()->count(3)->create();
    }
}
