@extends('layouts.app')

@section('content')

<div class="main-wrapper authendication-pages">

    <div class="content blur-ellipses">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-6 mx-auto vph-100 d-flex align-items-center">
    <div class="forgot-password w-100">
    <header class="text-center forgot-head-title">
    <a href="index.html">
    <img src="{{ asset('assets/img/logo-black.svg') }}" class="img-fluid" alt="Logo">
    </a>
    </header>
    <div class="shadow-card">
    <h2>Forgot Password</h2>
    <p>Enter Registered Email</p>
    
    <form action="{{ route('forgot.password.post') }}" method="POST">
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
    
        <div class="form-group">
            <div class="group-img">
                <i class="feather-mail"></i>
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
        </div>
        <button class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block" type="submit">Forget Password<i class="feather-arrow-right-circle ms-2"></i></button>
    </form>
    
    </div>
    <div class="bottom-text text-center">
    <p>Remember Password? <a href="{{ url('login') }}">Sign In!</a></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
@endsection