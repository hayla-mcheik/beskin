

@extends('layouts.app')
@section('title','Appointment Page')
@section('content')
<div class="hospital-page-banner-area bg-4">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Appointment</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/') }}">Home</a>
    </li>
    <li>Appointment</li>
    </ul>
    </div>
    </div>
    </div>

    
    <div class="hospital-appointment-area-with-color pt-100">
    <div class="container">
    <div class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-12">
    <div class="hospital-appointment-image">
    <img src="assets/images/hospital/appointment.png" alt="image">
    </div>
    </div>
    <div class="col-lg-6 col-md-12">
    <div class="hospital-appointment-form">
    <div class="content">
    <span>Appointment</span>
    <h3>Request An Appointment</h3>
    </div>
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
    <button type="submit" class="default-btn">Submit Now</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection