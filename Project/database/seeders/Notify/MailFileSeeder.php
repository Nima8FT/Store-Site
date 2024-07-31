<?php

namespace Database\Seeders\Notify;

use App\Models\Notify\EmailFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            EmailFile::factory()->count(3)->create();
    }
}
