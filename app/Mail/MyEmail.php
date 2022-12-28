<?php

namespace App\Mail;

use Address as GlobalAddress;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    

      
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('my-email');
    }
}
