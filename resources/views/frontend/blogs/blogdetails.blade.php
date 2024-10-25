@extends('layouts.app')
@section('title','Blog Details Page')
@section('content')
<div class="hospital-page-banner-area">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Blog Details</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/') }}">Home</a>
    </li>
    <li>{{ $blog->title }}</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-blog-details-area pt-100 pb-100">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-12 col-md-12">
    <div class="hospital-blog-details-desc">
    <div class="article-content">
    <ul class="meta">
    <li><i class="bx bx-user"></i> By <a href>{{ $blog->by }}</a></li>
    <li><i class="bx bx-message-rounded-dots"></i> No Comment</li>
    </ul>
    <h3>{{ $blog->title }}</h3>
    </div>
    <div class="article-image">
    <a href="#"><img src="{{ asset($blog->image) }}" alt="image"></a>
    <div class="date">{{ $blog->date }}</div>
    </div>
    <div class="article-quote">
    <p>{{ $blog->description }}</p>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection