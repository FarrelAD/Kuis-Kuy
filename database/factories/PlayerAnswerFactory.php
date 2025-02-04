<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerAnswer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerAnswer>
 */
class PlayerAnswerFactory extends Factory
{
    protected $model = PlayerAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_player' => Player::factory(),
            'id_question' => Question::factory(),
            'selected_answer' => $this->faker->randomElement(['a', 'b', 'c', 'd'])
        ];
    }
}
