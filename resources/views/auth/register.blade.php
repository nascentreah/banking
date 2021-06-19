@extends('layouts.auth')

@section('content')
 <div class="auth-form">
    <div class="text-center mb-3">
        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
    </div>
    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="mb-1 text-white"><strong>Name</strong></label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="mb-1 text-white"><strong>Email</strong></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="mb-1 text-white"><strong>Password</strong></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm" class="mb-1 text-white"><strong>Confirm Password</strong></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p class="text-white">Already have an account? <a class="text-white" href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
