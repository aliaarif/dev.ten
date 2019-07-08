<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $user_token)
    {
        $this->data = $data;
        $this->user_token = $user_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.leads.vendor');
    }
}
