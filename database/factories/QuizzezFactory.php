<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\Quizzez;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quizzez>
 */
class QuizzezFactory extends Factory
{
    protected $model = Quizzez::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_instructor' => Instructor::factory(),
            'name' => $this->faker->word(),
            'shared_public_key' => $this->faker->sha256(),
            'total_question' => $this->faker->numberBetween(5, 20),
            'date_created' => $this->faker->dateTimeThisYear()
        ];
    }
}
