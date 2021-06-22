
@extends('loginlayout')

@section('content')
<div class="main-content" style="background-image: url('https://www.binancemerchantpay.com/homebags.jpg');">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
         
        </div>
      </div>
    </div>
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0 bg-transparent text-dark">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Recover your account</small></div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="{{ route('user.password.email') }}" method="post">
              @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email">
                  </div>
                </div>
                <br>
                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Proceed</button>
                </div>
                <br>
                <br>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{route('login')}}" class="text-dark"><small>Sign in</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{route('register')}}" class="text-dark"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@stop