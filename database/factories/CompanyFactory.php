<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            'company_name' => $this->faker->name,
            'office_number' => $this->faker->numberBetween(1,200),
            'owner_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'logo_img' => 'http://placekitten.com/300/300'
        ];
    }
}
