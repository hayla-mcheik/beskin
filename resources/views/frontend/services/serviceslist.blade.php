@extends('layouts.app')
@section('title','Services Page')
@section('content')
<div class="hospital-page-banner-area bg-2">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Services</h3>
    <ul class="list">
    <li>
    <a href="index.html">Home</a>
    </li>
    <li>Services</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-services-area pt-100 pb-100">
    <div class="container">
    <div class="section-title with-hospital-color">
    <span>We Offer Services</span>
    <h2>Our Special Services</h2>
    </div>
    <div class="row justify-content-center">

        @foreach($services as $service)
    <div class="col-xl-4 col-sm-6">
        <div class="hospital-services-card">
            <div class="title">
            <h3>
            <a href="{{ route('services.details' , ['id' => $service->id]) }}">{{ $service->name }}</a>
            </h3>
            </div>
            <p>{{ $service->description }}</p>
            <a  href="{{ route('services.details' , ['id' => $service->id]) }}" class="services-btn">Read More</a>
            </div>
    </div>
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
@endsection