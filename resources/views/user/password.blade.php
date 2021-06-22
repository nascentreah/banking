@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/key-3348307_1920.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-7">
        <h1 class="display-2 text-white">Change password</h1>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h3 class="mb-0">Change account password</h3>
        </div>

        <div class="card-body">
          <form action="{{route('change.password')}}" method="post">
          @csrf
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Old password:</label>
                <div class="col-lg-10">
                  <input type="password" name="current_password" class="form-control" required>
                  @if ($errors->has('current_password'))
                      <span class="error form-error-msg ">
                          {{ $errors->first('current_password') }}
                      </span>
                  @endif
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">New password:</label>
                <div class="col-lg-10">
                  <input type="password" name="password" class="form-control" required>
                  @if ($errors->has('password'))
                      <span class="error form-error-msg ">
                        {{ $errors->first('password') }}
                      </span>
                  @endif
                </div>
              </div>  
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Confirm password:</label>
                <div class="col-lg-10">
                  <input type="password" name="password_confirmation" class="form-control" required>
                  @if ($errors->has('password_confirmation'))
                      <span class="error form-error-msg ">
                          {{ $errors->first('password_confirmation') }}
                      </span>
                  @endif
                </div>
              </div>                
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /basic layout -->
      </div>
    </div>
  </div>
@stop
