<?php

namespace Database\Factories;

use App\Models\WhyChooseUs;
use Illuminate\Database\Eloquent\Factories\Factory;

class WhyChooseUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WhyChooseUs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'image' => 'default.png',
        ];
    }
}
