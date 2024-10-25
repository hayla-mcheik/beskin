<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctors;
class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctors::all();
        return view('admin.doctors.index',compact('doctors'));
    }


    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $doctor = new Doctors();
        $doctor->name = $request->input('name');
        $doctor->title = $request->input('title');
        $doctor->desc = strip_tags($request->input('desc'));
        $doctor->fb = $request->input('fb');
        $doctor->insta = $request->input('insta');
        $doctor->whatsapp = $request->input('whatsapp');
        $doctor->skills = $request->input('skills');
        $doctor->education = $request->input('education');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/doctors', $fileName);        
            $imagePath = 'upload/doctors/' . $fileName;      
            $doctor->image = $imagePath;
        }
        if ($request->hasFile('imgone')) {
            $imgone = $request->file('imgone');
            $fileName = time() . rand(1000, 50000) . '.' . $imgone->getClientOriginalExtension();
            $imgone->move('upload/doctors', $fileName);        
            $imagePath = 'upload/doctors/' . $fileName;      
            $doctor->imgone = $imagePath;
        }
        if ($request->hasFile('imgtwo')) {
            $imgtwo = $request->file('imgtwo');
            $fileName = time() . rand(1000, 50000) . '.' . $imgtwo->getClientOriginalExtension();
            $imgtwo->move('upload/doctors', $fileName);        
            $imagePath = 'upload/doctors/' . $fileName;      
            $doctor->imgtwo = $imagePath;
        }
        $doctor->save();
        return redirect()->route('admin.doctors')->with('success','doctors created successfully');
    }

    public function edit($id)
    {
        $doctor = Doctors::find($id);
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctors::find($id);
        $doctor->name = $request->input('name');
        $doctor->title = $request->input('title');
        $doctor->desc = strip_tags($request->input('desc'));
        $doctor->fb = $request->input('fb');
        $doctor->insta = $request->input('insta');
        $doctor->whatsapp = $request->input('whatsapp');
        $doctor->skills = $request->input('skills');
        $doctor->education = $request->input('education');
    
        if ($request->hasFile('image')) {
            $oldImage = $doctor->image;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
    
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/doctors', $fileName);
            $imagePath = 'upload/doctors/' . $fileName;
            $doctor->image = $imagePath;
        }
    
        if ($request->hasFile('imgone')) {
            $oldImage = $doctor->imgone;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
    
            $imgone = $request->file('imgone');
            $fileName = time() . rand(1000, 50000) . '.' . $imgone->getClientOriginalExtension();
            $imgone->move('upload/doctors', $fileName);
            $imagePath = 'upload/doctors/' . $fileName;
            $doctor->imgone = $imagePath;
        }
    
        if ($request->hasFile('imgtwo')) {
            $oldImage = $doctor->imgtwo;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
    
            $imgtwo = $request->file('imgtwo');
            $fileName = time() . rand(1000, 50000) . '.' . $imgtwo->getClientOriginalExtension();
            $imgtwo->move('upload/doctors', $fileName);
            $imagePath = 'upload/doctors/' . $fileName;
            $doctor->imgtwo = $imagePath;
        }
    
        $doctor->save();
    
        return redirect()->route('admin.doctors')->with('success', 'Doctors updated successfully');
    }
    
    
    public function delete($id)
    {
        $doctor = Doctors::find($id);
        if ($doctor)
        {
            $doctor->delete();
            return redirect()->route('admin.doctors')->with('success','Doctors deleted successfully');
        }
        return redirect()->route('admin.doctors')->with('error','Doctors not found');
    }
    
}
