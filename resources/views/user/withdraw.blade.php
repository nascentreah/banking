@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/dashboard/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-6"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <h1 class="display-2 text-white">Hello {{$user->name}}</h1>
        <p class="text-white mt-0 mb-5">This is your withdraw page. You can send cash out request for balance.</p>
        <p class="text-white mt-0 mb-5">Withdrawal charge is {{$set->withdraw_charge.$currency->name}}.</p>
        <a href="{{url('/')}}/user/withdraw#logs" class="btn btn-neutral">Withdraw logs</a>
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
            <h3 class="mb-0">Start request</h3>
          </div>

          <div class="card-body">
            <form action="{{route('withdraw.submit')}}" method="post">
              @csrf
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Amount</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text">{{$currency->name}}</span>
                    </div>
                    <input type="number" step="any" name="amount" maxlength="10" class="form-control" required="">
                  </div>
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Payout method</label>
                <div class="col-lg-10">
                <select class="form-control select" name="coin" data-dropdown-css-class="bg-primary" data-fouc required>
                @foreach($method as $val)
                  <option value='{{$val->id}}'>{{$val->method}}</option>
                  @if($set->bank_withdraw==1) 
                    <option value="bank">Bank</option>
                  @endif
                @endforeach
                </select>
              </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Details</label>
                <div class="col-lg-10">
                  <textarea name="details" class="form-control" rows="4" required></textarea>
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
    <div class="row">
      <div class="col-md-12">
        <div class="card" id="logs">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Cashout History</h3>
          </div>
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                <th>S/n</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Details</th>
                <th>Date</th>                                                                         
                <th>Status</th>   
                </tr>
              </thead>
              <tbody> 
              @foreach($withdraw as $k=>$val) 
              <tr>
                <td>{{++$k}}.</td>
                <td>
                  @if($val->coin_id=='bank')
                    bank
                  @else
                  {{$val->wallet->method}}
                  @endif
                <td>{{number_format($val->amount).$currency->name}}</td>
                <td>{{$val->details}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                <td>          
                  @if($val->status==1)
                    <span class="badge badge-success">Approved</span>
                  @else
                    <span class="badge badge-danger">Pending</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop