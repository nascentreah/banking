@extends('userlayout')

<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">

@push('extra-js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tbl_cashout_history').DataTable({
                language: {
                    emptyTable: "No transactions available",
                    info: "Showing _START_ to _END_ of _TOTAL_ transactions",
                    infoEmpty: "Showing 0 to 0 of 0 plans",
                    infoFiltered: "(filtered from _MAX_ total transactions)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ transactions",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search transactions:",
                    zeroRecords: "No transactions match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card text-white bg-primary">
                <div class="card-body mb-0">
                    <small class="text-white">My Balance</small>
                    <small class="text-white">&nbsp;</small>
                    <small class="text-white">&nbsp;</small>
                    <p class="text-white pull-right">BINANCEMERCHANT PAY</p>
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

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="mr-3 bgl-primary text-primary">
										<!-- <i class="ti-user"></i> -->
										<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30"
                                             height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-user">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
									</span>
                        <div class="media-body">
                            <p class="mb-1">Credit</p>
                            <h4 class="mb-0">{{ $alert->count() }}</h4>
                            {{--                            <span class="badge badge-primary">+3.5%</span>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-primary text-primary">
                            <i class="ti-user"></i>
                            <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30"
                                 height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Patient</p>
                            <h4 class="mb-0">3280</h4>
                            <span class="badge badge-primary">+3.5%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-users"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Students</p>
                            <h3 class="text-white">3280</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
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
										<i class="la la-user"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Loans</p>
                            <h3 class="text-white">5654333</h3>
                            <div class="progress mb-2 bg-primary">
                                <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                            </div>
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
										<i class="la la-graduation-cap"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Course</p>
                            <h3 class="text-white">28</h3>
                            <div class="progress mb-2 bg-primary">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
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
                            <p class="mb-1">Fees Collect</p>
                            <h3 class="text-white">250$</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                            </div>
                            <small>30% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Transaction</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        jhbjbbuyuuyg
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Transaction</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        .mlkmlklmlml
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
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
                                <th>Action</th>
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
                                    <td><span class="badge light badge-success">Successful</span></td>
                                    <td>
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
                                    </td>
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
                <div class="card-header flex-wrap pb-0">
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
                                        <span class="input-group-text">{{$currency->name}}</span>
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
{{--                                    @foreach($method as $val)--}}
{{--                                        <option value='{{$val->id}}'>{{$val->method}}</option>--}}
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
                            <button type="submit" class="btn rounded mb-2 btn-success">Withdraw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
