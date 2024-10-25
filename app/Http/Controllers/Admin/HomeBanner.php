<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroBanner;
class HomeBanner extends Controller
{
    public function index()
    {

        $herobanner = HeroBanner::first();
        return view('admin.herobanner.index',compact('herobanner'));
    }

    public function updateherohome(Request $request)
    {
        try {

        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Retrieve the first record from the HeroBanner table
        $herohome = HeroBanner::first();
            // Update the properties with validated data
            $herohome->title = $request->input('title');
            $herohome->description =  strip_tags($request->input('description'));
            
            // Check if a new image file has been uploaded
            if ($request->hasFile('image')) {
                // Delete the old image file if it exists
                if ($herohome->image && file_exists(public_path($herohome->image))) {
                    unlink(public_path($herohome->image));
                }
                
                // Upload and store the new image file
                $image = $request->file('image');
                $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
                $image->move('upload/home/', $fileName);
                $uploadFile = 'upload/home/' . $fileName;
                $herohome->image = $uploadFile;
            }
            
            // Save the updated HeroBanner record
            $herohome->update();
            
            // Redirect back with success message
            return back()->withSuccess('Hero background has been updated');

    }
    catch(\Exception $e)
    {
        return back()->withError('Error updationg HeroBanner');
    }
    }
    
}
