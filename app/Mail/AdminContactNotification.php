<?php

namespace App\Mail;

use App\Models\Contactus;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AdminContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contactus;

    /**
     * Create a new message instance.
     */
    public function __construct(Contactus $contactus)
    {
        $this->contactus = $contactus;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->subject('New Contact Us Message Received')
                      ->view('emails.admincontactnotification')
                      ->with(['contactus' => $this->contactus]);

        // Attach the uploaded file if it exists
        if ($this->contactus->attachment) {
            $email->attach(
                Storage::disk('public')->path($this->contactus->attachment)
            );
        }

        return $email;
    }
}
