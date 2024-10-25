<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctors;
use App\Models\DoctorsSchedule;
use App\Models\Services;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
$appointments = Appointment::all();
        return view('admin.appointment.index', compact('appointments'));
    }
}
