@extends('layouts.auth')

@section('content')
 <div class="auth-form">
    <div class="text-center mb-3">
        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
    </div>
    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
    <form method="POST" action="{{ route('login') }}">
           @csrf
        <div class="form-group">
            <label for="email" class="mb-1 text-white"><strong>Email</strong></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="mb-1 text-white"><strong>Password</strong></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-row d-flex justify-content-between mt-4 mb-2">
            <div class="form-group">
               <div class="custom-control custom-checkbox ml-1 text-white">
                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                </div>
            </div>
            <div class="form-group">
                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p class="text-white">Don't have an account? <a class="text-white" href="{{ route('register') }}">Sign up</a></p>
    </div>
</div>
@endsection
