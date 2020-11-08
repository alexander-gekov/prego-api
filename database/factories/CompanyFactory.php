<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
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
            'manager_id' => User::factory()->manager(),
            'owner_name' => function (array $attributes) {
                return User::find($attributes['manager_id'])->name;
            },
            'company_name' => $this->faker->company,
            'office_number' => $this->faker->numberBetween(1,200),
            'logo_img' => 'http://placekitten.com/300/300'
        ];
    }
}
