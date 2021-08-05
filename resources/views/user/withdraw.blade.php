@extends('userlayout')

<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<link href="{{ asset('vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">

@push('extra-js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/chartjs-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('js/dashboard/statistics.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tbl_deposit_logs').DataTable({
                language: {
                    emptyTable: "No deposit logs available",
                    info: "Showing _START_ to _END_ of _TOTAL_ deposit logs",
                    infoEmpty: "Showing 0 to 0 of 0 deposit logs",
                    infoFiltered: "(filtered from _MAX_ total deposit logs)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ deposit logs",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search deposit logs:",
                    zeroRecords: "No deposit logs match search criteria"
                },
            });

            $('#tbl_cashbout_history').DataTable({
                language: {
                    emptyTable: "No withdraws available",
                    info: "Showing _START_ to _END_ of _TOTAL_ withdraws",
                    infoEmpty: "Showing 0 to 0 of 0 withdraws",
                    infoFiltered: "(filtered from _MAX_ total withdraws)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ withdraws",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search withdraws:",
                    zeroRecords: "No withdraws match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Withdraws</a></li>
        </ol>
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
                            <h3 class="text-white">$ 456666</h3>
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
                            <h3 class="text-white">$ 5555</h3>
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
                            <h3 class="text-white">28 rrr</h3>
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
                            <h3 class="text-white">$</h3>
                            <small>30% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Withdraw chart</h4>
                </div>
                <div class="card-body mb-0">
                    <canvas id="lineChart_1"></canvas>
                </div>
            </div>
        </div>

        <div class="col-4">
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Withdraw History</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_cashbout_history" class="display min-w850">
                            <thead>
                            <tr>
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
                                    <td>
                                        @if($val->coin_id=='bank')
                                            bank
                                    @else
                                        {{$val->wallet->method}}
                                    @endif
                                    <td><b>{{number_format($val->amount).$currency->name}}</b></td>
                                    <td>{{$val->details}}</td>
                                    <td><b>{{ \Carbon\Carbon::parse($val->created_at)->format('jS M Y')  }}</b><br/>
                                        <small class="text-gray">{{ date("h:i:A", strtotime($val->created_at)) }}</small>
                                    </td>
                                    <td>
                                        @if($val->status==1)
                                            <span class="badge light badge-success">Approved</span>
                                        @else
                                            <span class="badge light badge-danger">Pending</span>
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
