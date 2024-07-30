<?php

namespace Database\Seeders\Notify;

use App\Models\Notify\SMS;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SMS::factory()->count(3)->create();
    }
}
