<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index',compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'titleone' => 'required|string',
            'descone' => 'required|string',
            'titletwo' => 'required|string',
            'desctwo' => 'required|string',
            'titlethree' => 'required|string',
            'descthree' => 'required|string',
            'titlefour' => 'required|string',
            'descfour' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as per your requirement
        ]);
        $service = new Services();
        $service->name = $request->input('name');
        $service->title = $request->input('title');
        $service->description = strip_tags($request->input('description'));
        $service->titleone = $request->input('titleone');
        $service->descone = strip_tags($request->input('descone'));
        $service->titletwo = $request->input('titletwo');
        $service->desctwo = strip_tags($request->input('desctwo'));
        $service->titlethree = $request->input('titlethree');
        $service->descthree = strip_tags($request->input('descthree'));
        $service->titlefour = $request->input('titlefour');
        $service->descfour = strip_tags($request->input('descfour'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/services', $fileName);        
            $imagePath = 'upload/services/' . $fileName;      
            $service->image = $imagePath;
        }
        $service->save();
        return redirect()->route('admin.services')->with('success','services created successfully');
    }

    public function edit($id)
    {
        $service = Services::find($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'titleone' => 'required|string',
            'descone' => 'required|string',
            'titletwo' => 'required|string',
            'desctwo' => 'required|string',
            'titlethree' => 'required|string',
            'descthree' => 'required|string',
            'titlefour' => 'required|string',
            'descfour' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as per your requirement
        ]);
        $service = Services::find($id);
        $service->name = $request->input('name');
        $service->title = $request->input('title');
        $service->description = strip_tags($request->input('description'));
        $service->titleone = $request->input('titleone');
        $service->descone = strip_tags($request->input('descone'));
        $service->titletwo = $request->input('titletwo');
        $service->desctwo = strip_tags($request->input('desctwo'));
        $service->titlethree = $request->input('titlethree');
        $service->descthree = strip_tags($request->input('descthree'));
        $service->titlefour = $request->input('titlefour');
        $service->descfour = strip_tags($request->input('descfour'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/services', $fileName);        
            $imagePath = 'upload/services/' . $fileName;      
            $service->image = $imagePath;
        }
        $service->save();
        return redirect()->route('admin.services')->with('success','Services updated successfully');
    }
    
    public function delete($id)
    {
        $service = Services::find($id);
        if ($service)
        {
            $service->delete();
            return redirect()->route('admin.services')->with('success','Service deleted successfully');
        }
        return redirect()->route('admin.services')->with('error','Service not found');
    }
    
}
