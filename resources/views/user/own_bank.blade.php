@extends('userlayout')

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Save for future</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card text-white bg-primary">
                <div class="card-body mb-0">
                    <small class="text-white">My Balance</small>
                    <small class="text-white">&nbsp;</small>
                    <small class="text-white">&nbsp;</small>
                    <p class="text-white pull-right">{{ $set->site_name }}</p>
                    <h5 class="card-title text-white">
                        ${{number_format($user->balance, 2,".",",")}}
                    </h5>
                    <p class="card-text text-white pull-right">
                    <div class="card-number pull-right">
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 0, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 4, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 8, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 12, 4) }}
                    </div>
                    </p>
                    <span class="badge badge-pill badge-warning">Debit</span>
                </div>
                <div class="card-footer bg-transparent border-0 text-white">
                    <small class="text-white">Card Holder</small><br/>
                    <b>{{ $user->name }}</b>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 text-black">Profile Strength</h4>

                    <div class="dropdown custom-dropdown mb-0">
                        <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                 height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                </g>
                            </svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                            <a class="dropdown-item text-danger"
                               href="javascript:void(0);">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="stackedChart"></div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#2BC155"></rect>
                            </svg>
                            <span class="fs-14">Aplication Sent</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">30%</span>
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#FF9B52"></rect>
                            </svg>
                            <span class="fs-14">Appllication Answered</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">46%</span>
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#3F9AE0"></rect>
                            </svg>
                            <span class="fs-14">Hired</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">14%</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#C4C4C4"></rect>
                            </svg>
                            <span class="fs-14">Pending</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">10%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 text-black">Profile Strength</h4>
                    <div class="dropdown float-right custom-dropdown mb-0">
                        <div class="" data-toggle="dropdown" role="button" aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                    stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                    stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                    stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="stackedChart"></div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#2BC155"></rect>
                            </svg>
                            <span class="fs-14">Aplication Sent</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">30%</span>
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#FF9B52"></rect>
                            </svg>
                            <span class="fs-14">Appllication Answered</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">46%</span>
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#3F9AE0"></rect>
                            </svg>
                            <span class="fs-14">Hired</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">14%</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div>
                            <svg class="mr-3 min-w32" width="32" height="23" viewBox="0 0 32 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="23" rx="11.5" fill="#C4C4C4"></rect>
                            </svg>
                            <span class="fs-14">Pending</span>
                        </div>
                        <span class="fs-18 text-black ml-auto font-w600">10%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-wallet"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Deposits</p>
                            <h3 class="text-white">$deddd3</h3>
                            <small>80% Increase in 20 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-shopping-bag"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Savings</p>
                            <h3 class="text-white">$ dddd</h3>
                            <small>50% Increase in 25 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-arrow-circle-right"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Transfers</p>
                            <h3 class="text-white">28</h3>
                            <small>76% Increase in 20 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger ">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-dollar"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Withdraws</p>
                            <h3 class="text-white">$ ddd</h3>
                            <small>30% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-8 col-xxl-8 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Transaction</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_cashout_history" class="display min-w850">
                            <thead>
                            <tr>
                                <th>Reference No</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                {{--                                <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alert as $hh)
                                <tr>
                                    <td>{{ $hh->reference }}</td>
                                    <td><b>{{ \Carbon\Carbon::parse($hh->created_at)->format('jS M Y')  }}</b><br/>
                                        <small class="text-gray">{{ date("h:i:A", strtotime($hh->created_at)) }}</small>
                                    </td>
                                    <td><b>${{ number_format($hh->amount) }}</b></td>
                                    <td><span class="badge badge-success">Successful</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Make Withdraws</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('withdraw.submit')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Amount</label>
                            <div class="col-lg-12">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $currency->name }}</span>
                                    </div>
                                    <input type="number" step="any" name="amount" maxlength="10" class="form-control"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Payout method</label>
                            <div class="col-lg-12">
                                <select class="form-control select" name="coin" data-dropdown-css-class="bg-primary"
                                        data-fouc required>
{{--                                    @foreach($methods as $method)--}}
{{--                                        <option value='{{$method->id}}'>{{$method->method}}</option>--}}
{{--                                        @if($set->bank_withdraw==1)--}}
{{--                                            <option value="bank">Bank</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Details</label>
                            <div class="col-lg-12">
                                <textarea name="details" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn rounded mb-2 btn-primary">Withdraw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/maintenance-bg.jpg); background-size: cover; background-position: center top;">--}}
{{--  <!-- Mask -->--}}
{{--  <span class="mask bg-gradient-default opacity-1"></span>--}}
{{--  <!-- Header container -->--}}
{{--  <div class="container-fluid d-flex align-items-center">--}}
{{--    <div class="row">--}}
{{--      <div class="col-lg-10 col-md-10">--}}
{{--        <h1 class="display-2 text-white">Local bank transfer</h1>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}
{{--<div class="container-fluid mt--6">--}}
{{--  <div class="content-wrapper">--}}
{{--    <div class="row">--}}
{{--      <div class="col-md-12">--}}
{{--        <!-- Basic layout-->--}}
{{--        <div class="card">--}}
{{--          <div class="card-header header-elements-inline">--}}
{{--            <h3 class="mb-0">Transfer Funds</h3>--}}
{{--                <div class="header-elements">--}}
{{--                  <div class="list-icons">--}}
{{--                </div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--          <div class="card-body">--}}
{{--            <form action="{{route('submit.ownbank')}}" method="post" id="modal-details">--}}
{{--            @csrf--}}
{{--              <p>Transfer charge is {{$set->transfer_charge.$currency->name}} per transaction.</p>--}}
{{--              <div class="form-group row">--}}
{{--                  <label class="col-form-label col-lg-2">Routine number</label>--}}
{{--                    <div class="col-lg-10">--}}
{{--                   <div class="input-group">--}}
{{--                      <span class="input-group-prepend">--}}
{{--                        <span class="input-group-text" style="color:black;">R/N</span>--}}
{{--                      </span>--}}
{{--                      <input type="number" style="color:black;font-weight:bold;" maxlength="12" value="061000104" class="form-control" disabled>--}}
{{--                    </div>--}}
{{--                       </div>--}}
{{--              </div>--}}
{{--                <div class="form-group row">--}}
{{--                  <label class="col-form-label col-lg-2">Account number</label>--}}
{{--                  <div class="col-lg-10">--}}
{{--                    <div class="input-group">--}}
{{--                      <span class="input-group-prepend">--}}
{{--                        <span class="input-group-text">#</span>--}}
{{--                      </span>--}}
{{--                      <input type="number" name="acct_no" maxlength="12" class="form-control" required>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                  <label class="col-form-label col-lg-2">Amount</label>--}}
{{--                  <div class="col-lg-10">--}}
{{--                    <div class="input-group">--}}
{{--                      <span class="input-group-prepend">--}}
{{--                        <span class="input-group-text">{{$currency->name}}</span>--}}
{{--                      </span>--}}
{{--                      <input type="number" class="form-control" name="amount" id="amount" required>--}}
{{--                      <span class="input-group-append">--}}
{{--                        <span class="input-group-text">.00</span>--}}
{{--                      </span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>                   --}}
{{--                <div class="text-right">--}}
{{--                  <a href="#" data-toggle="modal" data-target="#modal-form" class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></a>--}}
{{--                </div>         --}}
{{--                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">--}}
{{--                  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                      <div class="modal-body p-0">--}}
{{--                        <div class="card bg-default border-0 mb-0">--}}
{{--                          <div class="card-header bg-transparent pb-2ß">--}}
{{--                            <div class="text-muted text-center mt-2 mb-3">Enter account pin to complete transfer</div>--}}
{{--                            <div class="text-center text-white"><i class="ni ni-key-25 icon-2x"></i></div> --}}
{{--                          </div>--}}
{{--                          <div class="card-body px-lg-5 py-lg-5">--}}
{{--                            <div class="form-group">--}}
{{--                              <div class="input-group input-group-merge input-group-alternative">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>--}}
{{--                                </div>--}}
{{--                                <input class="form-control" placeholder="Pin" type="pin" name="pin">--}}
{{--                              </div>--}}
{{--                            </div>--}}
{{--                          <div class="text-right">--}}
{{--                            <button type="submit" class="btn btn-primary" form="modal-details">Submit</button>--}}
{{--                          </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div> --}}
{{--            </form>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <!-- /basic layout -->--}}
{{--      </div>--}}
{{--    </div>--}}
@stop
