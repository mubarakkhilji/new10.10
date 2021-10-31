<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'category_id' => function() {
                return Category::all()->random();
            },
            'type_id' => function() {
                return Type::all()->random();
            },
            'short_description' => $this->faker->paragraph(),
            'is_featured' => true,
        ];
    }
}
