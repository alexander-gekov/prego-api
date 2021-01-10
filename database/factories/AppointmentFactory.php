<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpseclib\Crypt\Random;

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

        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $email = $this->faker->email;
        $phone_number = $this->faker->phoneNumber;
        $address = $this->faker->address;
        $date_start = $this->faker->dateTimeInInterval($time, '-30 minutes');
        $date_end = $this->faker->dateTimeInInterval($time, '+30 minutes');
        $qr_id = $this->faker->regexify('[A-Za-z0-9]{10}');
        $appointment_status = $this->faker->numberBetween(0,2);

        $form_answers = json_encode(array(
            "firstname"=>$first_name,
            "lastname" => $last_name,
            "email" => $email,
            "phonenumber" => $phone_number,
            "address" => $address,
            "date-start" => $date_start,
            "date-end" => $date_end
        ));

        return [
            'form_answers' => $form_answers,

            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'address' => $address,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'qr_id' => $qr_id,
            'appointment_status' => $appointment_status
        ];
    }
}
