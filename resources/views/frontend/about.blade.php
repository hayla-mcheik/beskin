
@extends('layouts.app')
@section('title','Home Page')
@section('content')
<div class="hospital-page-banner-area">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>About</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/home') }}">Home</a>
    </li>
    <li>About Us</li>
    </ul>
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
        <div class="about-btn">
        <a href="#" class="default-btn">Learn More</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="hospital-about-shape">
        <img src="assets/images/hospital/about-shape.png" alt="image">
        </div>
        </div>
        
    
    
    <div class="hospital-services-area pt-100 pb-75">
        <div class="container">
        <div class="section-title with-hospital-col+or d-flex justify-content-between align-items-center">
        <div class="div text-start">
        <span>We Offer Services</span>
        <h2>Our Special Services</h2>
        </div>
        <a href="#" class="default-btn">View All Services</a>
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
        <a href="{{ url('/services') }}" class="services-btn">Read More</a>
        </div>
@endforeach
        </div>
        </div>
        </div>
    
    
    
        <div class="hospital-team-area pt-100 pb-75">
            <div class="container">
                <div class="section-title with-hospital-col+or d-flex justify-content-between align-items-center">
                    <div class="div text-start">
                    <span>Meet Our Team</span>
                    <h2>Meet Our Experience Doctors</h2>
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
            
    @endsection