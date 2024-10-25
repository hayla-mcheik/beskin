@extends('layouts.app')
@section('title','Doctors Details Page')
@section('content')
<div class="hospital-page-banner-area bg-2">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Doctor Details</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/') }}">Home</a>
    </li>
    <li>Doctor Details</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <section class="dentist-details-area ptb-100">
        <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-5 col-md-6">
        <div class="dentist-details-image">
        <img src="{{ asset($doctor->image) }}" alt="image">
        </div>
        </div>
        <div class="col-lg-7 col-md-6">
        <div class="dentist-details-content">
        <h3>
        {{ $doctor->name }}
        </h3>
        <span>{{ $doctor->title }}</span>
        <div class="share-link">
            <a href="{{ $doctor->fb }}" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="{{ $doctor->whatsapp }}" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="{{ $doctor->insta }}" target="_blank"><i class="bx bxl-instagram"></i></a>
        </div>
        <div class="content-overview">

        <p><span>Professional Skills:</span>{{ $doctor->skills }}</p>
        <p><span>Education:</span> {{ $doctor->education }}</p>
        <p><span>Book Appoinment on whatsapp: <br/><a href="https://wa.me/961 76 620 245" class="default-btn">+961 76 620 245</a> </p>
        </div>
        </div>
        </div>
        </div>
        <div class="dentist-details-overview-content">
        <p>{{ $doctor->description }}</p>
        <div class="row">
        <div class="col-lg-6">
        <div class="details-overview-image">
        <img src="{{ asset($doctor->imgone) }}" alt="image">
        </div>
        </div>
        <div class="col-lg-6">
        <div class="details-overview-image">
        <img src="{{ asset($doctor->imgtwo) }}" alt="image">
        </div>
        </div>
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
        </section>
@endsection