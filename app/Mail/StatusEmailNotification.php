<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusEmailNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $username;
    /**
     * Create a new message instance.
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    public function build()
    {
        return  $this->from(env('SHOP_MAIL_FROM'), env('APP_NAME'))->subject('Welcome to Our Application')
            ->view('emails.statusEmail')->with('username', $this->username);
    }
 
}
