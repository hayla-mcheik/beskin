<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function bookingshow()
    {
        return view('instructor.notifications.index');
    }
}
