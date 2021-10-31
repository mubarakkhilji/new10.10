<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;

class CareerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Career::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_title' => $this->faker->word(),
            'vacancy' => $this->faker->randomNumber(3),
            'job_location' => $this->faker->city,
            'salary' => $this->faker->randomNumber(6),
            'deadline' => $this->faker->date(),
            'employment_status' => 'Full time',
            'job_responsibilities' => $this->faker->paragraph(),
            'job_status' => false,
        ];
    }
}
