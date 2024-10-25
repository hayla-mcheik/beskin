<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewBookingNotification implements ShouldBroadcast
{
    use SerializesModels;

    public $bookingId;

    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    public function broadcastOn()
    {
        return ['booking-channel'];
    }
}
