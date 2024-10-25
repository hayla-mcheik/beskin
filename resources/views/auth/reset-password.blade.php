@extends('layouts.app')

@section('content')


<div class="main-wrapper authendication-pages">

    <div class="content blur-ellipses login-password">
    <div class="container">
    <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-7 mx-auto vph-100 d-flex align-items-center">
    <div class="change-password w-100">
    <header class="text-center">
    <a href="index.html">
        <img src="{{ asset('assets/img/logo-black.svg') }}" class="img-fluid" alt="Logo">
    </a>
    </header>
    <div class="shadow-card">
    <h2>Change Password</h2>
    <p>Your New Password must be different from<br>
    Previous used Password</p>
    
    <form action="{{ route('reset.password.post') }}" method="POST">
        @csrf
        @if(session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
    
        <div class="form-group">
            <div class="pass-group group-img">
                <i class="toggle-password feather-eye"></i>
                <input type="password" class="form-control pass-input" placeholder="New Password" name="password">
            </div>
        </div>
    
        <div class="form-group">
            <div class="pass-group group-img">
                <i class="toggle-password feather-eye"></i>
                <input type="password" class="form-control pass-input" placeholder="Confirm Password" name="password_confirmation">
            </div>
        </div>
    
        <button class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block" type="submit">Change Password<i class="feather-arrow-right-circle ms-2"></i></button>
    </form>
    
    </div>
    <div class="bottom-text text-center">
    <p>Have an account? <a href="{{ url('login') }}">Sign In!</a></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
@endsection