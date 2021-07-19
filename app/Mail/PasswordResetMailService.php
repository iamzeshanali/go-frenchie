<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMailService extends Mailable
{
    use Queueable, SerializesModels;

    protected $token;
    protected $username;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$username,$email)
    {
        $this->token = $token;
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject('Password Reset')->markdown('layouts/reset-password-mail')->with([
            'token'=>$this->token,
            'email'=> $this->email,
            'username'=> $this->username
        ]);
    }
}
