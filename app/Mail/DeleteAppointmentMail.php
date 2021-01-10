<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Grosv\LaravelPasswordlessLogin\LoginUrl;
use Illuminate\Support\Facades\Password;

class DeleteAppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $appointment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointment, $employee)
    {
        $this->employee = $employee;
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pfontys@gmail.com')
            ->view('emails.deleteAppointmentMail')
            ->with([
                'employee' => $this->employee,
                'appointment' => $this->appointment,
                ]);
    }
}
