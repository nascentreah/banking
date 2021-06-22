@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/ecommerce-2607114_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-12">
        <h1 class="display-2 text-white">Start receiving payment from any website</h1>
      </div>
      <div class="col-lg-12 col-12 text-right">
          <a href="{{route('user.add-merchant')}}" class="btn btn-sm btn-neutral">Create merchant</a>
          <a href="{{url('/')}}/user/merchant-documentation" class="btn btn-sm btn-neutral">Documentation</a>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Create merchant</h3>
                <div class="header-elements">
                  <div class="list-icons">
                </div>
              </div>
          </div>
          <div class="card-body">
            <form action="{{route('submit.merchant')}}" enctype="multipart/form-data" method="post">
            @csrf
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Business logo</label>
                    <div class="col-lg-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept="image/*">
                            <label class="custom-file-label" for="customFileLang">Select photo</label>
                        </div>
                    </div>
              </div> 
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant name</label>
                  <div class="col-lg-10">
                    <input type="text" name="merchant_name" class="form-control" required>
                  </div>
                </div> 
               <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant site url</label>
                  <div class="col-lg-10">
                    <input type="url" name="merchant_site_link" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Success url</label>
                  <div class="col-lg-10">
                    <input type="url" name="merchant_success_link" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Fail url</label>
                  <div class="col-lg-10">
                    <input type="url" name="merchant_fail_link" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant Description</label>
                  <div class="col-lg-10">
                    <div class="input-group">
                      <textarea type="text" class="form-control" rows="4" name="merchant_description" required></textarea>
                    </div>
                  </div>
                </div>                     
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></a>
                </div>         
            </form>
          </div>
        </div>
        <!-- /basic layout -->
      </div>
    </div>
@stop