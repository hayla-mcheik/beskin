<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\HeroBanner;
use App\Models\Services;
use App\Models\Testimonials;
use App\Models\Blogs;
use App\Models\About;
use App\Models\Appointment;
use App\Models\Doctors;
use App\Models\DoctorsSchedule;
use App\Models\Portfolio;
use App\Mail\AppointmentCreated;
use App\Models\Product;

class FrontendController extends Controller
{  
    public function index()
    {
        $homebanner = HeroBanner::first();
        $services = Services::all();
        $testimonials = Testimonials::all();
        $blogs = Blogs::all();
        $about = About::first();
        $doctors = Doctors::all();
        $portfolios = Portfolio::all();
        $services = Services::all();
        $doctors = Doctors::all();
        $slots = DoctorsSchedule::all();
        return view('frontend.index',compact('homebanner','services','testimonials','blogs','about','doctors','portfolios','services', 'doctors', 'slots'));
    }

public function serviceslist()
{
    $services = Services::all();
    return view('frontend.services.serviceslist',compact('services'));
}
public function servicesdetails($id)
{
    $services = Services::all();
    $service = Services::findOrFail($id);
    $portfolio = $service->portfolio()->with('portfolioImages')->paginate(6);
    return view('frontend.services.servicesdetails',compact('services','service','portfolio'));
}

public function getPortfoliosByService($serviceId)
{
    $portfolios = Portfolio::with('portfolioImages')->where('service_id', $serviceId)->get();
    return response()->json($portfolios);
}

public function portfolioslist()
{
    $services = Services::all();
    return view('frontend.portfolios.portfoliolist', compact('services'));
}

public function doctorslist()
{
    $doctors = Doctors::all();
    return view('frontend.doctors.doctorlist',compact('doctors'));
}


public function doctorsdetails($id)
{
    $doctors = Doctors::all();
    $doctor = Doctors::findOrFail($id);
    return view('frontend.doctors.doctordetails',compact('doctor'));
}


public function appointment()
{
    $services = Services::all();
    $doctors = Doctors::all();
    $slots = DoctorsSchedule::all();
    return view('frontend.appointment',compact('services', 'doctors', 'slots'));
}

public function about()
{
    $services = Services::all();
    $about = About::first();
    $doctors = Doctors::all();
    return view('frontend.about',compact('services','about','doctors'));
}

public function contact()
{
    return view('frontend.contact');
}
public function blogslist()
{
    $blogs = Blogs::all();
    return view('frontend.blogs.bloglist',compact('blogs'));
}

public function blogdetails($id)
{
$blog = Blogs::findOrFail($id);
return view('frontend.blogs.blogdetails', compact('blog'));
}

public function storeappointment(Request $request)
{
$request->validate([
'name' => 'required|string|max:255|alpha',
'email' => 'nullable|email|max:255',
'phone' => 'required|numeric|digits_between:8,15',
'service_id' => 'required|exists:services,id',
'doctor_id' => 'required|exists:doctors,id',
'slot_id' => 'required|exists:doctors_schedules,id'
]);

$appointment = Appointment::create($request->all());
Mail::to('mcheikhayla26@gmail.com')->send(new AppointmentCreated($appointment));
return redirect()->back()->with('success','Appointment requested successfully');
} 

//     public function contactsubmit(Request $request)
//     {
//         dd('lala');
// $request->validate([
//     'name' => 'required|string|255',
//     'email' => 'nullable|email',
//     'phone' => 'required|string',
//     'subject' => 'required|string|max:255',
//     'message' => 'required|string',
// ]);
// if($request->fails()){
// return back()->withErrors($request->errors())->withInput();
// }
// else
// {
//     $message = "A new user has reached out to Beskin:\n\n";
//     $message .= "Name: " . $request->name . "\n";
//     $message .= "Email: " . ($request->email ? $request->email : 'Not provided') . "\n";
//     $message .= "Phone: " . $request->phone . "\n";
//     $message .= "Subject: " . $request->subject . "\n\n";
//     $message .= "Message: \n" . $request->message;
//     Mail::to('mcheikhayla26@gmail.com')->send(new ContactFormMail($request->all()));
//     return back()->withSuccess('Your message has been submited successfully');
//  }
//     }


public function quickView($id)
{
    $product = Product::with('productImages')->find($id);
    return response()->json($product);
}
    public function contactSubmit(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'required|string|max:15',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|1000',
    ]);

    // Prepare the email data
    $emailData = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
    ];

    // Send the email
    Mail::to('mcheikhayla26@gmail.com')->send(new ContactFormMail($emailData));

    return back()->with('success', 'Your message has been submitted successfully.');
}
    
}
