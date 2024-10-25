@extends('layouts.app')
@section('title','Doctor List Page')
@section('content')
<div class="hospital-page-banner-area bg-2">
<div class="container">
<div class="hospital-page-banner-content">
<h3>Doctors</h3>
<ul class="list">
<li>
<a href="{{ url('/') }}">Home</a>
</li>
<li>All Doctors</li>
</ul>
</div>
</div>
</div>


<div class="list-doctors mt-5">
    
<div class="container">
    <div class="section-title with-hospital-col+or d-flex justify-content-between align-items-center">
        <div class="div text-start">
        <span>Meet Our Team</span>
        <h2>Meet Our Experience Doctors</h2>
        </div>
        </div>
    <div class="row">
        @foreach($doctors as $doctor)
        <div class="col-md-4">
            <div class="hospital-team-card">
                <div class="team-image">
                <img href="{{ url('/doctors-details/' . $doctor->id) }}" src="{{ asset($doctor->image) }}" alt="image">
                <div class="share-link">
                    <a href="{{ $doctor->fb }}" target="_blank"><i class="bx bxl-facebook"></i></a>
                    <a href="{{ $doctor->whatsapp }}" target="_blank"><i class="bx bxl-twitter"></i></a>
                    <a href="{{ $doctor->insta }}" target="_blank"><i class="bx bxl-instagram"></i></a>
                </div>
                </div>
                <div class="team-content">
                <h3>
                    <h3>
                        <a href="{{ url('/doctors-details/' . $doctor->id) }}" >
                        {{ $doctor->name }}
                        </a></h3>
                    <span>{{ $doctor->title }}</span>
                </div>
                </div>
        </div>
@endforeach
    </div>
</div>
</div>

@endsection