<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Visitor;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $time = $this->faker->dateTimeThisYear('now');

        return [
            'time' => $time->format('Y-m-d H'),
            'visitor_id' => Visitor::factory()->state([
                'checked_in' => $this->faker->dateTimeInInterval($time, '-20 minutes'),
                'checked_out' => $this->faker->dateTimeInInterval($time, '+20 minutes')
            ])
        ];
    }
}
