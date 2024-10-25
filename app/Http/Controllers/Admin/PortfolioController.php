<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\PortfolioImages;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolios'));
    }
    public function create()
    {
        $services = Services::all();
        return view('admin.portfolio.create',compact('services'));
    }

    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->service_id = $request->input('service_id');
        $portfolio->description = strip_tags($request->input('description'));
        $portfolio->save();
        return redirect()->route('admin.portfolio')->with('success','Portfolio created successfully');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        $services = Services::all();
        return view('admin.portfolio.edit', compact('portfolio','services'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->service_id = $request->input('service_id');
        $portfolio->description = strip_tags($request->input('description'));

        $portfolio->save();
    
        return redirect()->route('admin.portfolio')->with('success', 'portfolio updated successfully');
    }
    
    
    public function delete($id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio)
        {
            $portfolio->delete();
            return redirect()->route('admin.portfolio')->with('success','portfolio deleted successfully');
        }
        return redirect()->route('admin.portfolio')->with('error','portfolio not found');
    }

    public function viewimages($id)
    {
        $portfolio = Portfolio::with('portfolioImages')->find($id);
        $portfolioimages = $portfolio->portfolioImages;
        return view('admin.portfolio.viewimages', compact('portfolio', 'portfolioimages'));
    }
    
    
    
public function createimages($id)
{
    $portfolio = Portfolio::with('portfolioImages')->find($id);
    return view('admin.portfolio.createimages',compact('portfolio'));  
}

public function storeimages(Request $request , $id )
{
    $portfolio = Portfolio::find($id);
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    $portfolioimage =  new PortfolioImages();
    $portfolioimage->portfolio_id = $id;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time() . rand(1000, 50000) . '.' . $image->getClientOriginalExtension();
        $image->move('upload/portfolio', $fileName);        
        $imagePath = 'upload/portfolio/' . $fileName;      
        $portfolioimage->image = $imagePath;
    }
    $portfolioimage->save();
    return redirect()->route('admin.portfolio.images', ['id' => $portfolio->id])->with('message', 'Portfolio Image created successfully');

}
public function deleteimages($id, $imageid)
{
    $portfolioImage = PortfolioImages::find($imageid);
    if($portfolioImage->image != null) unlink($portfolioImage->image);
    $portfolioImage->delete();
    return back()->withSuccess('Portfolio image has been deleted.');
}


}
