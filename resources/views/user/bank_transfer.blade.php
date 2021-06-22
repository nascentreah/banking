
@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/ecommerce-2607114_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-7">
        <h1 class="display-2 text-white">Make a deposit</h1>
      </div>
      <div class="col-lg-6 col-12 text-right">
          <a href="{{url('/')}}/user/fund#bank" class="btn btn-sm btn-neutral">Bank transfer logs</a>
          <a href="{{url('/')}}/user/fund#other" class="btn btn-sm btn-neutral">Other deposit logs</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-gradient-default">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title mb-3 text-white">Bank Details</h3>
                <ul class="list list-unstyled mb-0 text-white">
                  <li>Name: {{$bank->name}}</li>
                  <li>Bank: {{$bank->bank_name}}</li>
                  <li>Address: {{$bank->address}}</li>
                  <li>Swift code: {{$bank->swift}}</li>
                  <li>Iban code: {{$bank->iban}}</li>
                  <li>Account number: {{$bank->acct_no}}</li>
                </ul>
              </div>

              <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                <ul class="list list-unstyled mb-0 text-white">
                  <li>Status: <span class="badge bg-danger">UNPAID</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Upload proof</h3>
                <div class="header-elements">
              </div>
          </div>
          <div class="card-body">
          <form method="post" action="{{route('bank_transfersubmit')}}" enctype="multipart/form-data">
          @csrf
           <div class="form-group row">
              <label class="col-form-label col-lg-2">Amount:</label>
              <div class="col-lg-10">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text">{{$currency->name}}</span>
                  </span>
                <input type="number" step="any" name="amount" max-length="10" class="form-control">
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-lg-2">More details</label>
              <div class="col-lg-10">
                  <textarea type="text" class="form-control" rows="3" placeholder="" name="details" required></textarea>
              </div>
            </div> 
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang1" name="image" lang="en">
                <label class="custom-file-label" for="customFileLang1">Select screenshot</label>
              </div>
            </div> 
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
@stop