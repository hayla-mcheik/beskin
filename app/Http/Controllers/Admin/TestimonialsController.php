<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::all();
        return view('admin.testimonials.index',compact('testimonials'));
    }
   
    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $testimonial = new Testimonials();
        $testimonial->name = $request->input('name');
        $testimonial->title = $request->input('title');
        $description = trim(strip_tags($request->input('description')));
        $description = str_replace('&nbsp;', ' ', $description);
        $testimonial->description = $description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/testimonials', $fileName);        
            $imagePath = 'upload/testimonials/' . $fileName;      
            $testimonial->image = $imagePath;
        }

        $testimonial->save();
        return redirect()->route('admin.testimonials')->with('success','testimonials created successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonials::find($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonials::find($id);
        $testimonial->name = $request->input('name');
        $testimonial->title = $request->input('title');
        $description = trim(strip_tags($request->input('description')));
        $description = str_replace('&nbsp;', ' ', $description);
        $testimonial->description = $description;
        if ($request->hasFile('image')) {
            $oldImage = $testimonial->image;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
    
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/testimonials', $fileName);
            $imagePath = 'upload/testimonials/' . $fileName;
            $testimonial->image = $imagePath;
        }

        $testimonial->save();
    
        return redirect()->route('admin.testimonials')->with('success', 'testimonials updated successfully');
    }
    
    
    public function delete($id)
    {
        $testimonial = Testimonials::find($id);
        if ($testimonial)
        {
            $testimonial->delete();
            return redirect()->route('admin.testimonials')->with('success','testimonials deleted successfully');
        }
        return redirect()->route('admin.testimonials')->with('error','testimonials not found');
    }
}
