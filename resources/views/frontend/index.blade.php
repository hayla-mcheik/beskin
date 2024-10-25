@extends('layouts.app')
@section('title','Home Page')
@section('content')
<div>
<div class="hospital-banner-area">
    <div class="container-fluid">
    <div class="row align-items-center">
    <div class="col-lg-6 col-md-12">
    <div class="hospital-banner-content">
    <h1 class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">{{ $homebanner->title }}</h1>
    <p class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">{{ $homebanner->description }}</p>
    <div class="banner-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
    <a href="{{ url('/services') }}" class="default-btn">View Our Services</a>
    </div>
    </div>
    </div>
    <div class="col-lg-6 col-md-12">
    <div class="hospital-banner-image">
    <img src="{{ asset("$homebanner->image") }}"  alt="image">
    <div class="circle"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-services-area pt-100 pb-75">
        <div class="container">
        <div class="section-title with-hospital-col+or d-flex justify-content-between align-items-center">
        <div class="div text-start">
        <span>We Offer Services</span>
        <h2>Our Special Services</h2>
        </div>
        <a href="{{ url('/services') }}" class="default-btn">View All Services</a>
        </div>
        <div class="hospital-services-slides owl-carousel owl-theme">
            @foreach($services as $key => $serviceItem)
        <div class="hospital-services-card">
        <div class="title">
        <h3>
        <a href="#">{{ $serviceItem->name }}</a>
        </h3>
        </div>
        <p>{{ $serviceItem->description }}</p>
        <a href="{{ route('services.details',['id' => $serviceItem->id ]) }}" class="services-btn">Read More</a>
        </div>
@endforeach
        </div>
        </div>
        </div>
    
    <div class="hospital-about-area ptb-100">
    <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-12">
    <div class="hospital-about-image">
    <img src="{{ asset($about->image) }}" alt="image">
    </div>
    </div>
    <div class="col-lg-6 col-md-12">
    <div class="hospital-about-content">
    <span>About Us</span>
    <h3>{{ $about->title }}</h3>
    <p>{{ $about->description }}</p>
    <h4>Special Features:</h4>
    <div class="row justify-content-center">
    <div class="col-lg-6 col-sm-6">
    <ul class="list">
    <li>{{ $about->titleone }}</li>
    <li>{{ $about->titletwo }}</li>
    </ul>
    </div>
    <div class="col-lg-6 col-sm-6">
    <ul class="list">
        <li>{{ $about->titlethree }}</li>
        <li>{{ $about->titlefour }}</li>
    </ul>
    </div>
    </div>
  
    </div>
    </div>
    </div>
    </div>
    <div class="hospital-about-shape">
    <img src="assets/images/hospital/about-shape.png" alt="image">
    </div>
    </div>
    
    
    <div class="hospital-appointment-area ptb-100">
        
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="section-title with-hospital-color">
    <span>Appointment</span>
    <h2>Request An Appointment</h2>
    </div>
    <div class="hospital-appointment-form">
        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                </div>
                <div class="col-lg-6 col-md-6">
                <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                </div>
                <div class="col-lg-6 col-md-6">
                <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <select name="doctor_id" required>
                        @foreach ($doctors as $doctor )
                        <option value={{ $doctor->id }}>{{ $doctor->name }}</option> 
                     @endforeach
                    </select>
                    </div>
                    </div>
                <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <select name="service_id" required>
            @foreach ($services as $service )
               <option value={{ $service->id }}>{{ $service->name }}</option> 
            @endforeach
                </select>
                </div>
                </div>
                
            
            
                <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <select name="slot_id" required>
                    @foreach ($slots as $slot )
                    <option value={{ $slot->id }}>{{ $slot->start_time }} - {{ $slot->end_time }}</option> 
                 @endforeach
                </select>
                </div>
                </div>
                <div class="col-lg-12 col-md-12">
                <button class="default-btn position-relative" style="z-index: 1;" type="submit" class="default-btn">Submit Now</button>
                </div>
                </div>
        </form>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-team-area pt-100 pb-75">
    <div class="container">
        <div class="section-title with-hospital-col+or d-flex justify-content-between align-items-center">
            <div class="div text-start">
            <span>Meet Our Team</span>
            <h2>Meet Our Doctors</h2>
            </div>
            <a href="{{ url('/doctors') }}" class="default-btn">View All Doctors</a>
            </div>
    <div class="hospital-team-slides owl-carousel owl-theme">
        @foreach($doctors as $doctor)
    <div class="hospital-team-card">
    <div class="team-image">
    <img src="{{ asset($doctor->image) }}" alt="image">
    <div class="share-link">
    <a href="{{ $doctor->fb }}" target="_blank"><i class="bx bxl-facebook"></i></a>
    <a href="{{ $doctor->whatsapp }}" target="_blank"><i class="bx bxl-twitter"></i></a>
    <a href="{{ $doctor->insta }}" target="_blank"><i class="bx bxl-instagram"></i></a>
    </div>
    </div>
    <div class="team-content">
    <h3>{{ $doctor->name }}</h3>
    <span>{{ $doctor->title }}</span>
    </div>
    </div>
@endforeach

    </div>
    </div>
    </div>
    
    <div class="skin-care-before-after-area ptb-100">
        <div class="container-fluid">
        <div class="section-title">
        <span>Before and After</span>
        <h2>Before & After Skin Treatment</h2>
        </div>
        <div class="skin-care-before-after-slides owl-carousel owl-theme">
            @foreach($portfolios as $portfolio)
            @foreach($portfolio->portfolioImages as $image)
        <div class="skin-care-before-after-card">
        <img src="{{ asset($image->image) }}" alt="image">
        </div>
        @endforeach
@endforeach
        </div>
        </div>
        </div>
    
        <div class="hospital-call-to-action-area ptb-100">
            <div class="container">
            <div class="hospital-call-to-action-content">
            <span>Time Can't be Resisted, But Aging Can</span>
            <h3>Commited To Trusted Beskin</h3>
            <p>Get Your Quote Or Call: <a href="tel:+961 76 620 245)">+961 76 620 245</a></p>
            
            </div>
            </div>
            </div>
    
    
    <div class="hospital-testimonials-area ptb-100">
    <div class="container">
    <div class="section-title with-hospital-color text-start">
    <span>Testimonials</span>
    <h2>Our Clients Feedback</h2>
    </div>
    <div class="hospital-testimonials-slides owl-carousel owl-theme">
        @foreach($testimonials as $testimonial)
    <div class="hospital-testimonials-card">
    <p>“{{ $testimonial->description }}”</p>
    <div class="info-content d-flex justify-content-between align-items-center">
    <div class="info d-flex align-items-center">
    <img src="{{ asset($testimonial->image) }}" class="rounded-circle" alt="image">
    <div class="title">
    <h3>{{ $testimonial->name }}</h3>
    <span>{{ $testimonial->title }}</span>
    </div>
    </div>
    <ul class="rating">
    <li>
    <i class="bx bxs-star"></i>
    </li>
    <li>
    <i class="bx bxs-star"></i>
    </li>
    <li>
    <i class="bx bxs-star"></i>
    </li>
    <li>
    <i class="bx bxs-star"></i>
    </li>
    <li>
    <i class="bx bxs-star"></i>
    </li>
    </ul>
    </div>
    </div>
@endforeach
    </div>
    </div>
    </div>
    
    
    <div class="hospital-blog-area pt-100 pb-75">
    <div class="container">
    <div class="section-title with-hospital-color">
    <span>Our Blog</span>
    <h2>Recent Articles And News</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($blogs as $blog)
    <div class="col-lg-4 col-md-6">
    <div class="hospital-blog-card">
    <div class="blog-image">
    <a href="#"><img src="{{ asset($blog->image) }}" alt="image"></a>
    <div class="date">{{ $blog->date }}</div>
    </div>
    <div class="blog-content">
    <ul class="meta">
    <li><i class="bx bx-user"></i> By <a href>{{ $blog->by }}</a></li>
    <li><i class="bx bx-message-rounded-dots"></i> No Comment</li>
    </ul>
    <h3>
    <a href="#">{{ $blog->description }}</a>
    </h3>
    <a href="{{ route('blogs.details',['id' => $blog->id]) }}" class="blog-btn">Read More</a>
    </div>
    </div>
    </div>
@endforeach
    </div>
    </div>
    </div>
    
    
    <div class="hospital-information-area pt-100 pb-75">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6">
    <div class="hospital-information-card">
    <div class="content">
    <div class="icon">
    <i class="bx bx-map"></i>
    </div>
    <h3>Office Address</h3>
    <p>Badaro, beirut</p>
    </div>
    <div class="shape">
    <img src="{{ asset('assets/images/hospital/info-shape.png')}}" alt="image">
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6">
    <div class="hospital-information-card">
    <div class="content">
    <div class="icon">
    <i class="bx bx-envelope"></i>
    </div>
    <h3>Email Us</h3>
    <p>
        <a href="mailto:beskinlb.care@gmail.com"><span class="__cf_email__">beskinlb.care@gmail.com</span></a>
    </p>
    </div>
    <div class="shape">
        <img src="{{ asset('assets/images/hospital/info-shape.png')}}" alt="image">
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6">
    <div class="hospital-information-card">
    <div class="content">
    <div class="icon">
    <i class="bx bx-phone-call"></i>
    </div>
    <h3>Contact Us Free</h3>
    <p>
    <a href="tel:+961 76 620 245">+961 76 620 245</a>
    </p>
    </div>
    <div class="shape">
    <img src="{{ asset('assets/images/hospital/info-shape.png')}}" alt="image">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</div>

@endsection

