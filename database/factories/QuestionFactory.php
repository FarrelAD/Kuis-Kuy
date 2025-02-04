<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quizzez;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(),
            'answer_a' => $this->faker->word(),
            'answer_b' => $this->faker->word(),
            'answer_c' => $this->faker->word(),
            'answer_d' => $this->faker->word(),
            'correct_answer' => $this->faker->randomElement(['a', 'b', 'c', 'd']),
            'id_quiz' => Quizzez::factory()
        ];
    }
}
