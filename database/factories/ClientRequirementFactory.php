<?php

namespace Database\Factories;

use App\Models\ClientRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientRequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'preferred_location' => $this->faker->word(),
            'preferred_size' => $this->faker->word(),
            'Property_amenities' => $this->faker->paragraph(),
            'client_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'profession' => $this->faker->word(),
            'address' => $this->faker->address(),
            'contact_number' => $this->faker->phoneNumber(),
            'status' => false,
        ];
    }
}
