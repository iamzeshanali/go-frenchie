<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$data)
    {
        $this->name = $name;
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd('Contact by '.$this->name.' - GoFrenchie');
        return $this->from($this->email)->subject($this->subject)->view('layouts/mail')->with([
            'name'=>$this->name,
            'email'=> $this->email,
            'subject'=> 'Contact by '.$this->name.' - GoFrenchie',
            'data'=> $this->data,
        ]);
    }
}
