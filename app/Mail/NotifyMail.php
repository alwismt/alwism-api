<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
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

    /**v
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.contactMe');
        return $this->subject("I've successfully received your contact request")
        ->view('emails.contactMe');
    }
}
