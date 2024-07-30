<?php

namespace Database\Seeders\Notify;

use App\Models\Notify\Mail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mail::factory()->count(3)->create();
    }
}
