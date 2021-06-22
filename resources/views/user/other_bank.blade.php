@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/maintenance-bg.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-10 col-md-10">
        <h1 class="display-2 text-white">Other bank transfer</h1>
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
            <h3 class="mb-0">Transfer Funds</h3>
                <div class="header-elements">
                  <div class="list-icons">
                </div>
              </div>
          </div>
          <div class="card-body">
            <form action="{{route('submit.otherbank')}}" method="post" id="modal-details">
            @csrf
              <p>Transfer charges is {{$set->transfer_chargex.$currency->name}} per transaction. International transfer may take 1-2weeks depending on your bank & country.</p>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Account number</label>
                  <div class="col-lg-10">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">#</span>
                      </span>
                      <input type="number" name="acct_no" maxlength="10" class="form-control" required>
                    </div>
                  </div>
                </div>    
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Account name</label>
                  <div class="col-lg-10">
                    <input type="text" name="name" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Bank name</label>
                  <div class="col-lg-10">
                    <input type="text" name="bank" class="form-control" required>
                  </div>
                </div> 
               <div class="form-group row">
                  <label class="col-form-label col-lg-2">Bank address</label>
                  <div class="col-lg-10">
                    <input type="text" name="address" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Swift code</label>
                  <div class="col-lg-10">
                    <input type="text" name="swift" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Iban code</label>
                  <div class="col-lg-10">
                    <input type="text" name="iban" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Amount</label>
                  <div class="col-lg-10">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">{{$currency->name}}</span>
                      </span>
                      <input type="number" class="form-control" name="amount" id="amount" required>
                      <span class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </span>
                    </div>
                  </div>
                </div>                     
                <div class="text-right">
                  <a href="#" data-toggle="modal" data-target="#modal-form" class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></a>
                </div>         
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <div class="card bg-default border-0 mb-0">
                          <div class="card-header bg-transparent pb-2ß">
                            <div class="text-muted text-center mt-2 mb-3">Enter account pin to complete transfer</div>
                            <div class="text-center text-white"><i class="ni ni-key-25 icon-2x"></i></div> 
                          </div>
                          <div class="card-body px-lg-5 py-lg-5">
                            <div class="form-group">
                              <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Pin" type="password" name="pin">
                              </div>
                            </div>
                          <div class="text-right">
                            <button type="submit" class="btn btn-primary" form="modal-details">Submit</button>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
            </form>
          </div>
        </div>
        <!-- /basic layout -->
      </div>
    </div>
@stop