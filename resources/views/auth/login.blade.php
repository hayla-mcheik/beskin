@extends('layouts.app')

@section('content')


<section class="login-area ptb-100">
    <div class="container">
    <div class="login-form">
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
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
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email">
    </div>

    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="Password" name="password">
    </div>
    <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="checkme">
    <label class="form-check-label" for="checkme">Remember me</label>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password">
    <a href="#" class="lost-your-password">Forgot your password?</a>
    </div>
    </div>
    <button type="submit">Login Now</button>
    </form>
    </div>
    </div>
    </section>
    
@endsection
