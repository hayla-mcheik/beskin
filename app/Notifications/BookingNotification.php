<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    public $bookingId;

    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    public function via($notifiable)
    {
        return ['database']; // Define the database channel
    }

    public function toDatabase($notifiable)
    {
        // Return data to store in the database
        return [
            'booking_id' => $this->bookingId,
            'message' => 'A new booking request has been submitted.'
            // You can add more data if needed
        ];
    }
}
