<?php

namespace Database\Seeders;

use App\Models\Quizzez;
use Illuminate\Database\Seeder;

class QuizzezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quizzez::factory()->count(10)->create();
    }
}
