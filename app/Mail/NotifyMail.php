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

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pfontys@gmail.com')
            ->view('emails.demoMail')
            ->with([
                'password' => $this->password
                ]);
    }
}
