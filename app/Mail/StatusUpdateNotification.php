<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdateNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $newStatus;

    /**
     * Create a new message instance.
     *
     * @param string $userName
     * @param string $newStatus
     */
    public function __construct($userName, $newStatus)
    {
        $this->userName = $userName;
        $this->newStatus = $newStatus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Update Notification')
                    ->view('emails.status_update_notification');
        // You can customize the email template and style in the "resources/views/emails/status_update_notification.blade.php" file
    }
}
