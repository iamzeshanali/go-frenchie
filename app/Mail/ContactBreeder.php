<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactBreeder extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    public $subject;
    protected $data;
    protected $listing;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$data,$listing)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->data = $data;
        $this->listing = $listing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject($this->subject)->view('layouts/contact-breeder-mail-template')->with([
               'name'=>$this->name,
               'email'=> $this->email,
               'subject'=> $this->subject,
               'data'=> $this->data,
               'listing'=> $this->listing
        ]);
    }
}
