<?php

namespace Database\Factories;

use App\Models\LandOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandOwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LandOwner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'land_size' => '5 kata',
            'contact_person' => $this->faker->name(),
            'contact_address' => $this->faker->address(),
            'contact_number' => $this->faker->phoneNumber(),
            'status' => false,
        ];
    }
}
