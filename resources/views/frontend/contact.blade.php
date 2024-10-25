@extends('layouts.app')
@section('title','Contact Page')
@section('content')

<div class="hospital-page-banner-area bg-4">
    <div class="container">
        <div class="hospital-page-banner-content">
            <h3>Contact</h3>
            <ul class="list">
                <li>
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</div>

<div class="hospital-contact-area pb-100 mt-5">
    <div class="container">
        <div class="hospital-contact-form">
            <div class="section-title with-hospital-color">
                <span>Let Us Help You</span>
                <h2>Have Queries Before The Appointment</h2>
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
            <form action="{{ url('contact/submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="Your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="hospital-contact-information-area pt-100">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="hospital-contact-information-content">
                    <div class="info">
                        <div class="icon">
                            <i class="bx bx-phone-call"></i>
                        </div>
                        <span>Need An Emergency Help</span>
                        <h3>Call: <a href="tel:+961 76 620 245">+961 76 620 245</a></h3>
                    </div>
                    <p>Other hand, we denounce with righteous indignation and are so beguiled and demoralized by the charms of pleasure of the moment blinded desire that they cannot foresee the pain and trouble.</p>
                    <p>Equal blame belongs to those who fail in their duty through weakness of will which is the same as saying through.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="hospital-contact-information-image">
                    <img src="{{ asset('assets/images/hospital/information/info.png')}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                // Prevent default submission and handle via AJAX if necessary
                // e.preventDefault();

                // Validate form fields (optional)
                // Perform your validation here if not using Laravel validation
                
                // Submit the form via AJAX (if needed)
                /*
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success response
                    },
                    error: function(response) {
                        // Handle error response
                    }
                });
                */
            });
        });
    </script>
@endpush
