<?php

namespace Database\Seeders\Content;

use App\Models\Content\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::factory()->count(3)->create();
    }
}
