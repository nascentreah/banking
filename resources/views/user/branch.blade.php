@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/junction-984045_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-7">
        <h1 class="display-2 text-white">Reach us at any branch</h1>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
        <div class="row">  
        @foreach($branch as $val)   
         <div class="col-md-4">
          <div class="card bg-default">
            <!-- Card body -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                </div>
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!" class="text-white">{{$val->name}}</a>
                  </h4>
                  <p class="text-sm text-white mb-0">Country: {{$val->country}}</p>
                  <p class="text-sm text-white mb-0">State: {{$val->state}}</p>
                  <p class="text-sm text-white mb-0">Mobile: {{$val->mobile}}</p>
                  <p class="text-sm text-white mb-0">Zip code: {{$val->zip_code}}</p>
                  <p class="text-sm text-white mb-0">Postal code: {{$val->postal_code}}</p>
                  <span class="text-success">●</span>
                  <small class="text-success">{{$val->address}}</small>
                </div>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
        </div>
@stop