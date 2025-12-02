<?php

namespace App\Mail;

use App\Models\Contactus;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     */

    public $contactus;

    public function __construct(Contactus $contactus)
    {
       $this->contactus = $contactus;
    }

    public function build()
    {
              
        return $this->subject('New Contact Us Message Received')
        ->view('emails.admincontactnotification');
   }

}
