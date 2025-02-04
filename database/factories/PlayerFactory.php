<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Quizzez;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'score' => $this->faker->numberBetween(0, 100),
            'id_quiz' => Quizzez::factory()
        ];
    }
}
