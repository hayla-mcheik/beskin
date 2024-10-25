@php
    use App\Models\Services;
    $services = Services::all();
@endphp
<div class="preloader">
    <div class="loader">
    <div class="sbl-half-circle-spin"></div>
    </div>
    </div>
    
    <header class="header-area hospital-header">
    
        <div class="top-area hospital-top-area">
        <div class="container-fluid">
        <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
        <ul class="top-optional-wrap">
        <li>
        <a href="https://www.facebook.com/beskin.lb" target="_blank">
        <i class="bx bxl-facebook"></i>
        </a>
        </li>
        <li>
        <a href="#" onclick="sendMessage()" target="_blank">
        <i class="bx bxl-whatsapp"></i>
        </a>
        </li>
        <li>
        <a href="https://www.instagram.com/beskin.lb/" target="_blank">
        <i class="bx bxl-instagram"></i>
        </a>
        </li>
        </ul>
        </div>
        <div class="col-lg-8 col-md-12">
        <ul class="top-information-wrap">
        <li>
        <i class="bx bxs-phone"></i>
        <a href="tel:+961 76 620 245">+961 76 620 245</a>
        </li>
        <li>
        <i class="bx bx-envelope"></i>
        <a href="mailto:beskinlb.care@gmail.com"><span>beskinlb.care@gmail.com</span></a>
        </li>
        <li>
        <i class="bx bxs-map"></i>
        Beirut , Badaro
        </li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        
        
        <div class="navbar-area hospital-navbar-area">
        <div class="main-responsive-nav">
        <div class="container">
        <div class="main-responsive-menu">
        <div class="logo">
        <a href="{{ url('/') }}">
        <img src="{{ asset('assets/logo.png') }}" class="main-logo" alt="logo">
        <img src="{{ asset('assets/logo.png') }}"class="white-logo" alt="logo">
        </a>
        </div>
        </div>
        </div>
        </div>
        <div class="main-navbar">
        <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/logo.png') }}" class="white-logo" alt="logo">
        </a>
        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link active">
        Home
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link">
        Services
        <i class="bx bx-plus"></i>
    </a>
        <ul class="dropdown-menu">
            @foreach($services as $service)
            <li class="nav-item">
                <a href="{{ url('/services-details/' . $service->id) }}" class="nav-link">{{ $service->name }}</a>
                </li>
                @endforeach
        </ul>
  
        </li>
        <li class="nav-item">
        <a href="{{ url("/about") }}" class="nav-link">
        About Us
        </a>
        
        </li>
        <li class="nav-item">
        <a href="{{ url('/blogs') }}" class="nav-link">
        Blog
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
        </li>
        </ul>
        <div class="others-options d-flex align-items-center">
        <div class="option-item">
        <div class="search-btn">
        <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
        <i class="flaticon-search"></i>
        </a>
        </div>
        </div>
        <div class="option-item">
        <div class="navbar-btn">
        <a href="{{ url('/appointment') }}" class="default-btn">Book Appointment</a>
        </div>
        </div>
        </div>
        </div>
        </nav>
        </div>
        </div>
        <div class="others-option-for-responsive">
        <div class="container">
        <div class="dot-menu">
        <div class="inner">
        <div class="circle circle-one"></div>
        <div class="circle circle-two"></div>
        <div class="circle circle-three"></div>
        </div>
        </div>
        <div class="container">
        <div class="option-inner">
        <div class="others-options d-flex align-items-center">
        <div class="option-item">
        <div class="search-btn">
        <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
        <i class="flaticon-search"></i>
        </a>
        </div>
        </div>
        <div class="option-item">
        <div class="navbar-btn">
        <a href="{{ url('/appointment') }}" class="default-btn">Book Appointment</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        </header>
    
    <div class="modal fade fade-scale searchmodal covid-searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-bs-dismiss="modal">
    <i class="bx bx-x"></i>
    </button>
    </div>
    <div class="modal-body">
    <form class="modal-search-form">
    <input type="search" class="search-field" placeholder="Search...">
    <button type="submit"><i class="bx bx-search-alt"></i></button>
    </form>
    </div>
    </div>
    </div>
    </div>