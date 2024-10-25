@extends('layouts.app')

@section('content')

<section class="register-area ptb-100">
    <div class="container">
    <div class="register-form">
    <h2>Register</h2>
  
    <form action="{{ route('register') }}" method="POST">
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
        <input type="hidden" name="role_as" value="user">
    <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
    <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" placeholder="Phone" name="phone">
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="Password" name="password">
    </div>
    <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
    <button type="submit">Register Now</button>
    </form>
    </div>
    </div>
    </section>
    
    
@endsection