@extends('layouts.app')
@section('title','Services Page')
@section('content')


<div class="hospital-page-banner-area bg-2">
    <div class="container">
    <div class="hospital-page-banner-content">
    <h3>Services Details</h3>
    <ul class="list">
    <li>
    <a href="{{ url('/') }}">Home</a>
    </li>
    <li>
        <a href="{{ url('/services') }}">Services</a>
        </li>
    <li class="text-capitalize">{{ $service->name }}</li>
    </ul>
    </div>
    </div>
    </div>
    
    
    <div class="hospital-services-details-area pt-100 pb-100">
    <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-12">
    <aside class="widget-area hospital-widget-area">

    <div class="widget widget_categories">
    <h3 class="widget-title">All Services</h3>
    <ul>
        @foreach ($services as $service)
    <li class="text-capitalize"><a href="{{ route('services.details', ['id' => $service->id]) }}">{{ $service->name }}</a></li>
    @endforeach
    </ul>
    </div>

    <div class="widget widget_services_info">
    <div class="info">
    <i class="bx bx-phone-call"></i>
    <h4>Contact Us Free</h4>
    <a href="tel:+961 76 620 245">+961 76 620 245</a>
    </div>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using.</p>
    <a href="{{ url('/contact') }}" class="default-btn">Contact Us</a>
    </div>
    </aside>
    </div>
    <div class="col-lg-8 col-md-12">
    <div class="hospital-services-details-desc">
    <img src="{{ asset($service->image) }}" alt="image">
    <div class="content">
    <h3>{{ $service->title}}</h3>
    <p>{{  $service->description }}</p>
    </div>
    <div class="row justify-content-center">
    <div class="col-lg-6 col-md-6">
    <div class="services-details-card">
    <div class="number">01</div>
    <h4>{{ $service->titleone }}</h4>
    <p>{{ $service->descone }}</p>
    </div>
    </div>
    <div class="col-lg-6 col-md-6">
    <div class="services-details-card">
    <div class="number">02</div>
    <h4>{{ $service->titletwo }}</h4>
    <p>{{ $service->desctwo }}</p>
    </div>
    </div>
    <div class="col-lg-6 col-md-6">
    <div class="services-details-card">
    <div class="number">03</div>
    <h4>{{ $service->titlethree }}</h4>
    <p>{{ $service->descthree }}</p>
    </div>
    </div>
    <div class="col-lg-6 col-md-6">
    <div class="services-details-card">
    <div class="number">04</div>
    <h4>{{ $service->titlefour }}</h4>
    <p>{{ $service->descfour }}</p>
    </div>
    </div>
    </div>


    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="hospital-portfolio-area ptb-100">
        <div class="container">
        <div class="section-title with-hospital-color">
        <span>Our Portfolio</span>
        <h2>All The Great Works That We Done</h2>
        </div>
        <div class="row justify-content-center">
            @if($portfolio->isEmpty())
            <div class="section-title with-hospital-color">
                <p>No portfolio available for this service.</p>
            </div>
            @endif
            @foreach($portfolio as $item)
            <div class="section-title with-hospital-color">
            <p>{{ $item->description }}</p>
            </div>
            @foreach($item->portfolioImages as $image)
            <div class="col-lg-6 col-md-6">
            <div class="hospital-portfolio-card">
            <img src="{{ asset($image->image) }}" alt="Portfolio Image">
            </div>
            </div>
        @endforeach
        @endforeach

        <div class="col-lg-12 col-md-12">
            <div class="pagination-area hospital-pagination">
    {{ $portfolio->links() }}
            </div>
            </div>
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
@endsection