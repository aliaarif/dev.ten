<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth; 

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $vendor_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $vendor_token)
    {
        $this->data = $data;
        $this->vendor_token = $vendor_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->vendor_token);
        return $this->markdown('emails.leads.user');
    }
}
