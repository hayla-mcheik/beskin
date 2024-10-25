<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index',compact('about'));
    }

    public function updateabout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'titleone' => 'required|string|max:100',
            'titletwo' => 'required|string|max:100',
            'titlethree' => 'required|string|max:100',
            'titlefour' => 'required|string|max:100',
        ]);


        $about = About::first();
$about->title = $request->input('title');
$about->description =  strip_tags($request->input('description'));
$about->titleone = $request->input('titleone');
$about->titletwo = $request->input('titletwo');
$about->titlethree = $request->input('titlethree');
$about->titlefour = $request->input('titlefour');
            // Check if a new image file has been uploaded
            if ($request->hasFile('image')) {
                // Delete the old image file if it exists
                if ($about->image && file_exists(public_path($about->image))) {
                    unlink(public_path($about->image));
                }
                
                // Upload and store the new image file
                $image = $request->file('image');
                $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
                $image->move('upload/about/', $fileName);
                $uploadFile = 'upload/about/' . $fileName;
                $about->image = $uploadFile;
            }
            
$about->save();
return back()->withSuccess('About section updated successfully');
    }
}
