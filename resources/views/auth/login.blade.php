@extends('loginlayout')

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
{{--<div class="main-content" style="background-image: url('https://www.binancemerchantpay.com/homebags.jpg');">--}}
{{--    <!-- Header -->--}}
{{--    <div class="header py-7 py-lg-8 pt-lg-9">--}}
{{--      <div class="container">--}}
{{--        <div class="header-body text-center mb-7">--}}
{{--          <div class="row justify-content-center">--}}
{{--            <div class="col-xl-5 col-lg-6 col-md-8 px-5">--}}
{{--              <h1 class="text-dark">{{ __('Login') }}</h1>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <!-- Page content -->--}}
{{--    <div class="container mt--8 pb-5">--}}
{{--      <div class="row justify-content-center">--}}
{{--        <div class="col-lg-5 col-md-7">--}}
{{--          <div class="card bg-secondary border-0 mb-0 bg-transparent text-dark">--}}
{{--            <div class="card-header bg-transparent pb-5">--}}
{{--              <div class="text-dark text-center mt-2 mb-3">Sign in with credentials</div>--}}
{{--            </div>--}}
{{--            <div class="card-body px-lg-5 py-lg-5">--}}
{{--              <form role="form" action="{{route('submitlogin')}}" method="post">--}}
{{--                @csrf--}}
{{--                <div class="form-group mb-3">--}}
{{--                  <div class="input-group input-group-merge input-group-alternative">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                      <span class="input-group-text text-dark"><i class="ni ni-email-83"></i></span>--}}
{{--                    </div>--}}
{{--                    <input class="form-control" placeholder="Email" type="email" name="email">--}}
{{--                    @if ($errors->has('username'))--}}
{{--                        <span class="error form-error-msg ">--}}
{{--                                <strong>{{ $errors->first('username') }}</strong>--}}
{{--                            </span>--}}
{{--                    @endif--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                  <div class="input-group input-group-merge input-group-alternative">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                      <span class="input-group-text text-dark"><i class="ni ni-lock-circle-open"></i></span>--}}
{{--                    </div>--}}
{{--                    <input class="form-control" placeholder="Password" type="password" name="password">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="text-center">--}}
{{--                  <button type="submit" class="btn btn-default my-4">LOGIN</button>--}}
{{--                </div>--}}
{{--              </form>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="row mt-3">--}}
{{--            <div class="col-6">--}}
{{--              <a href="{{route('user.password.request')}}" class="text-dark"><small>Forgot password?</small></a>--}}
{{--            </div>--}}
{{--            <div class="col-6 text-right">--}}
{{--              <a href="{{route('register')}}" class="text-dark"><small>Create new account</small></a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--</div>--}}
@stop
