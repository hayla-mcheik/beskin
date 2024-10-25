<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    
    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $blog = new Blogs();
        $blog->title = $request->input('title');
        $blog->by = $request->input('by');
        $blog->date = $request->input('date');
        $description = trim(strip_tags($request->input('description')));
        $description = str_replace('&nbsp;', ' ', $description);
        $blog->description = $description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blogs', $fileName);        
            $imagePath = 'upload/blogs/' . $fileName;      
            $blog->image = $imagePath;
        }

        $blog->save();
        return redirect()->route('admin.blogs')->with('success','blogs created successfully');
    }

    public function edit($id)
    {
        $blog = Blogs::find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blogs::find($id);
        $blog->title = $request->input('title');
        $blog->by = $request->input('by');
        $blog->date = $request->input('date');
        $description = trim(strip_tags($request->input('description')));
        $description = str_replace('&nbsp;', ' ', $description);
        $blog->description = $description;
        if ($request->hasFile('image')) {
            $oldImage = $blog->image;
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
    
            $image = $request->file('image');
            $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blogs', $fileName);
            $imagePath = 'upload/blogs/' . $fileName;
            $blog->image = $imagePath;
        }

        $blog->save();
    
        return redirect()->route('admin.blogs')->with('success', 'blogs updated successfully');
    }
    
    
    public function delete($id)
    {
        $blog = Blogs::find($id);
        if ($blog)
        {
            $blog->delete();
            return redirect()->route('admin.blogs')->with('success','blogs deleted successfully');
        }
        return redirect()->route('admin.blogs')->with('error','blogs not found');
    }
}
