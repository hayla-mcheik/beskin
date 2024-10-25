<div class="hospital-footer-area pt-100">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-3 col-sm-6">
    <div class="hospital-footer-widget">
    <h2>
    <a href="{{ url('/') }}">Beskin</a>
    </h2>
    <p>We prioritize your well-being through cutting-edge dermatology and transformative hair transplantation services. Step into a world of comprehensive healthcare and rejuvenation at BESKIN.</p>
    <ul class="share-link">
    <li>
    <a href="https://www.facebook.com/beskin.lb" target="_blank"><i class="bx bxl-facebook"></i></a>
    </li>
    <li>
    <a href="#" onclick="sendMessage()" target="_blank"><i class="bx bxl-whatsapp"></i></a>
    </li>
    
    <li>
    <a href="https://www.instagram.com/beskin.lb/" target="_blank"><i class="bx bxl-instagram"></i></a>
    </li>
    </ul>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6">
    <div class="hospital-footer-widget ps-5">
    <h3>Useful Link</h3>
    <ul class="quick-links">
    <li>
    <a href="{{ url('/about') }}">About</a>
    </li>
    <li>
    <a href="{{ url('/blogs') }}">Latest Blog</a>
    </li>
    <li>
    <a href="{{ url('/appointment') }}">Appointments</a>
    </li>
    <li>
    <a href="{{ url('/contact') }}">Contact</a>
    </li>
    <li>
    <a href="{{ url('/doctors') }}">Our Doctors</a>
    </li>
    </ul>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6">
    <div class="hospital-footer-widget ps-5">
    <h3>Our Services</h3>
    <ul class="quick-links">
        @foreach ($services as $service)
        <li><a href="{{ route('services.details',['id' => $service->id]) }}">{{ $service->name }}</a></li>
    @endforeach
    </ul>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6">
    <div class="hospital-footer-widget ps-5">
    <h3>Working Days</h3>
    <ul class="hours-list">
    <li class="d-flex justify-content-between align-items-center">
    <span>Mon - Tue</span>
    <span>08:00 AM - 05:00PM</span>
    </li>
    <li class="d-flex justify-content-between align-items-center">
    <span>Wed - Thu</span>
    <span>09:00 AM - 06:00PM</span>
    </li>
    <li class="d-flex justify-content-between align-items-center">
    <span>Fri - Sat</span>
    <span>10:00 AM - 05:00PM</span>
    </li>
    <li class="d-flex justify-content-between align-items-center">
    <span>Sunday</span>
    <span>Emergency Only</span>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="hospital-copyright-area">
    <div class="container">
    <div class="copyright-area-content">
    <p>
    © Beskin is proudly created by
    <a href="https://hayla.site/" target="_blank">
    __Hayla
    </a>
    </p>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="go-top">
    <i class="bx bx-up-arrow-alt"></i>
    </div>
    