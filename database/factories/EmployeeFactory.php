<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->employee(),
            'first_name' => function (array $attributes) {
                $split = explode(" ", User::find($attributes['user_id'])->name);
                return $split[0];
            },
            'last_name' => function (array $attributes) {
                $split = explode(" ", User::find($attributes['user_id'])->name);
                return $split[1];
            },
            'email' => $this->faker->unique()->safeEmail
        ];
    }
}
