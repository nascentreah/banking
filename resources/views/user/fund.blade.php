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

            $('#tbl_bank_logs').DataTable({
                language: {
                    emptyTable: "No bank logs available",
                    info: "Showing _START_ to _END_ of _TOTAL_ bank logs",
                    infoEmpty: "Showing 0 to 0 of 0 bank logs",
                    infoFiltered: "(filtered from _MAX_ total bank logs)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ bank logs",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search bank logs:",
                    zeroRecords: "No bank logs match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Deposits</a></li>
        </ol>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-details">
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">Make a deposit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="container-fluid mt--6">--}}
{{--        <div class="content-wrapper">--}}
{{--            <div class="row">--}}
{{--                @if($adminbank->status==1)--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <a href="{{route('user.bank_transfer')}}" class="avatar avatar-xl">--}}
{{--                                            <img alt="Image placeholder"--}}
{{--                                                 src="{{url('/')}}/asset/payment_gateways/webmoney.png">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="{{route('user.bank_transfer')}}">Bank transfer</a>--}}
{{--                                        </h4>--}}
{{--                                        <p class="text-sm text-muted mb-0">Swift code: {{$adminbank->swift}}</p>--}}
{{--                                        <p class="text-sm text-muted mb-0">Account number: {{$adminbank->acct_no}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @foreach($gateways as $val)--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="card">--}}
{{--                            <!-- Card body -->--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" data-toggle="modal" data-target="#modal-form{{$val->id}}"--}}
{{--                                           class="avatar avatar-xl">--}}
{{--                                            <img alt="Image placeholder"--}}
{{--                                                 src="{{url('/')}}/asset/payment_gateways/{{$val->gateimg}}">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="#" data-toggle="modal"--}}
{{--                                               data-target="#modal-form{{$val->id}}">{{$val->name}}</a>--}}
{{--                                        </h4>--}}
{{--                                        <p class="text-sm text-muted mb-0">--}}
{{--                                            Limit: {{$val->minamo.' - '.$val->maxamo.$currency->name}}</p>--}}
{{--                                        <p class="text-sm text-muted mb-0">--}}
{{--                                            Charge: {{$val->fixed_charge.$currency->name}} + {{$val->percent_charge}}--}}
{{--                                            %</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal fade" id="modal-form{{$val->id}}" tabindex="-1" role="dialog"--}}
{{--                         aria-labelledby="modal-form" aria-hidden="true">--}}
{{--                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-body p-0">--}}
{{--                                    <div class="card bg-secondary border-0 mb-0">--}}
{{--                                        <div class="card-header bg-transparent pb-5">--}}
{{--                                            <div class="text-muted text-center mt-2 mb-3"><small>Deposit via</small>--}}
{{--                                            </div>--}}
{{--                                            <div class="btn-wrapper text-center">--}}
{{--                                                <a href="javascript:void;" class="btn btn-neutral btn-icon">--}}
{{--                                                    <span class="btn-inner--icon"><img--}}
{{--                                                            src="{{url('/')}}/asset/payment_gateways/{{$val->gateimg}}"></span>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body px-lg-5 py-lg-5">--}}
{{--                                            <form role="form" action="{{route('fund.submit')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <div class="input-group input-group-merge input-group-alternative">--}}
{{--                                                        <div class="input-group-prepend">--}}
{{--                                                            <span class="input-group-text">{{$currency->name}}</span>--}}
{{--                                                        </div>--}}
{{--                                                        <input type="number" step="any" class="form-control"--}}
{{--                                                               placeholder="" name="amount" required>--}}
{{--                                                        <input type="hidden" name="gateway" value="{{$val->id}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="text-center">--}}
{{--                                                    <button type="submit" class="btn btn-primary my-4">Preview</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Other deposit logs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tbl_deposit_logs" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Reference ID</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Charge</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deposits as $k=>$val)
                                        <tr>
                                            <td>{{++$k}}.</td>
                                            <td>#{{$val->trx}}</td>
                                            <td>{{number_format($val->amount).$currency->name}}</td>
                                            <td>{!!$val->gateway['name']!!}</td>
                                            <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                            <td>
                                                @if($val->status==1)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($val->status==0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @elseif($val->status==2)
                                                    <span class="badge badge-info">Declined</span>
                                                @endif
                                            </td>
                                            <td>{{number_format($val->charge).$currency->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bank transfer logs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tbl_bank_logs" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bank_transfer as $k=>$val)
                                        <tr>
                                            <td>{{++$k}}.</td>
                                            <td>{{number_format($val->amount).$currency->name}}</td>
                                            <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                            <td>
                                                @if($val->status==1)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($val->status==0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @elseif($val->status==2)
                                                    <span class="badge badge-info">Declined</span>
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
