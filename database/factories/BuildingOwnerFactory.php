<?php

namespace Database\Factories;

use App\Models\BuildingOwner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingOwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BuildingOwner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->buildingManager(),
            'first_name' => $this->faker->firstName,
            'last_name' =>  $this->faker->lastName,
            'building_name' => $this->faker->buildingNumber
        ];
    }
}
