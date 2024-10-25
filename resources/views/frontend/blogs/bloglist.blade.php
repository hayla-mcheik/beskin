@extends('layouts.app')
@section('title','Blog Page')
@section('content')

<div class="hospital-page-banner-area">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Blog</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/') }}">Home</a>
    </li>
    <li>Blog</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-blog-area-without-color pt-100 pb-100">
    <div class="container">
    <div class="row justify-content-center">

    <div class="col-lg-12 col-md-12">
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
    </div>
    </div>
    
@endsection