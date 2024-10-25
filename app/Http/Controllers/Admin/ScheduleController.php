<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorsSchedule;
use App\Rules\AfterOrEqualToday;
use App\Models\Doctors;
use DateTime;

class ScheduleController extends Controller
{
    public function index()
    {
        $doctorschedules = DoctorsSchedule::with('doctors')->get();
        $doctors = Doctors::all();
        return view('admin.schedule.index',compact('doctorschedules'));
    }

    public function create()
    {
        $doctors = Doctors::all();
        return view('admin.schedule.create',compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'day' => ['required', 'date_format:m/d/Y', new AfterOrEqualToday],
        ]);
    
        $existingSlot = DoctorsSchedule::where('doctor_id', $request->doctor_id)
        ->where('start_time',$request->start_time)
        ->where('end_time',$request->end_time)
        ->exists();

        if($existingSlot)
        {
            return redirect()->back()->withErrors(['Slot with the same start time, end time, and doctor already exists.']);
        }

        $doctorschedule = new DoctorsSchedule();
        $doctorschedule->doctor_id = $request->doctor_id;
        $doctorschedule->start_time = $request->start_time;
        $doctorschedule->end_time = $request->end_time;

        $parsedDate = DateTime::createFromFormat('m/d/Y', $request->day);
        $formattedDate = $parsedDate->format('Y-m-d');
        $doctorschedule->day = $formattedDate;
    
        $doctorschedule->status = $request->has('status') ? 'reserved' : 'available';
        $doctorschedule->save();
    
        return redirect()->route('admin.schedule')->with('success', 'Doctor Schedule created successfully.');
    }

    public function edit($id)
    {
        $doctorschedule = DoctorsSchedule::find($id);
        $doctors = Doctors::all();
        return view('admin.schedule.edit',compact('doctorschedule','doctors'));
    }

    public function update(Request $request , $id)
    {
        $doctorschedule = DoctorsSchedule::find($id); 
        $doctorschedule->update($request->only(['doctor_id','start_time','end_time','day']));
        $doctorschedule->status = $request->has('status') ? 'reserved' : 'available';
        $doctorschedule->update();
        return redirect()->route('admin.schedule')->with('success', 'Doctor Schedule updated successfully.');

    }

    public function delete($id)
    {
        $doctorschedule = DoctorsSchedule::find($id); 
        $doctorschedule->delete();
        return redirect()->route('admin.schedule')->with('success', 'Doctor Schedule deleted successfully.'); 
    }
}
