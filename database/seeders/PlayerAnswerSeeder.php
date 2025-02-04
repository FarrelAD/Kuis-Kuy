<?php

namespace Database\Seeders;

use App\Models\PlayerAnswer;
use Illuminate\Database\Seeder;

class PlayerAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayerAnswer::factory()->count(10)->create();
    }
}
