@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/dashboard/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-6"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-10 col-md-10">
        <h1 class="display-2 text-white">Hello {{$user->name}}</h1>
        <p class="text-white mt-0 mb-5">This is your profile page.</p>
        <a href="{{url('/')}}/user/profile#edit" class="btn btn-neutral">Edit profile</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
<div class="row">
    <div class="col-md-12">
    <div class="card" id="edit">
        <div class="card-header header-elements-inline">
           <h3 class="mb-0">Update account information</h3>
        </div>
        <div class="card-body">
          <form action="{{url('user/account')}}" method="post">
          @csrf
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Username:</label>
                <div class="col-lg-10">
                  <input type="text" name="username" class="form-control" readonly value="{{$user->username}}">
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Name:</label>
                <div class="col-lg-10">
                  <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
              </div>  
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Email:</label>
                <div class="col-lg-10">
                  <input type="email" name="email" class="form-control" readonly value="{{$user->email}}">
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Mobile:</label>
                <div class="col-lg-10">
                  <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                </div>
              </div>            
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Country:</label>
                <div class="col-lg-10">
                  <input type="text" name="country" class="form-control" value="{{$user->country}}">
                </div>
              </div>             
              <div class="form-group row">
                <label class="col-form-label col-lg-2">City:</label>
                <div class="col-lg-10">
                  <input type="text" name="city" class="form-control" value="{{$user->city}}">
                </div>
              </div>              
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Zip code:</label>
                <div class="col-lg-10">
                  <input type="text" name="zip_code" class="form-control" value="{{$user->zip_code}}">
                </div>
              </div>   
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Address:</label>
                <div class="col-lg-10">
                  <input type="text" name="address" class="form-control" value="{{$user->address}}">
                </div>
              </div>   
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Pin:</label>
                <div class="col-lg-10">
                  <input type="number" name="pin" class="form-control" value="{{$user->pin}}">
                </div>
              </div>                
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Update<i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
     <div class="col-md-8">
      @if($set->kyc)
          <div class="card bg-gradient-default" id="kyc">
            <div class="card-body">
              <h3 class="card-title mb-3 text-white">Kyc verification</h3>
              <p class="card-text mb-4 text-white">Upload an identity document, for example, driver licence, voters card, international passport, national ID.</p>
              <span class="badge badge-pill badge-warning">
              @if($user->kyc_status==0)
                Unverified
              @else
                Verified
              @endif
              </span>
              <br><br> 
              @if(empty($user->kyc_link))
                  <form method="post" action="{{url('user/kyc')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileLang1" name="image" lang="en">
                          <label class="custom-file-label" for="customFileLang1">Select document</label>
                        </div>
                        <span class="form-text text-white">Accepted formats: png, jpg.</span>
                      </div>
                      <div class="col-lg-2">
                        <input type="submit" class="btn btn-neutral" value="Upload">
                      </div>
                    </div>
                  </form>
              @endif
            </div>
          </div>
      @endif

      </div>
         <div class="col-md-4">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
           <h3 class="mb-0">Change account photo</h3>
        </div>

        <div class="card-body">
          <form action="{{url('user/avatar')}}" enctype="multipart/form-data" method="post">
          @csrf
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" name="image" accept="image/*">
                  <label class="custom-file-label" for="customFileLang">Select photo</label>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
                <span class="form-text text-muted">Accepted formats:png, jpg.</span>
              </div>              
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Upload<i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>
</div> 
@stop