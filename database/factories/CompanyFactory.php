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
            'company_name' => $this->faker->company,
            'office_number' => $this->faker->numberBetween(1,200),
            'manager_name' => $this->faker-> name,
            'description' => $this->faker-> text(500),
            'history' => $this->faker-> text(500),
            'img1' => 'https://picsum.photos/600',
            'img2' => 'https://picsum.photos/600',
            'img3' => 'https://picsum.photos/600',
            'logo_img' => 'https://picsum.photos/600'
        ];
    }
}
