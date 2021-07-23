@extends('master')

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
            $('#tbl_payment_methods').DataTable({
                language: {
                    emptyTable: "No payment methods available",
                    info: "Showing _START_ to _END_ of _TOTAL_ payment methods",
                    infoEmpty: "Showing 0 to 0 of 0 payment methods",
                    infoFiltered: "(filtered from _MAX_ total payment methods)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ payment methods",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search payment methods:",
                    zeroRecords: "No payment methods match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Deposit methods</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deposit Logs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_payment_methods" class="display min-w850">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Main name</th>
                                <th>Name for users</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gateway as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->main_name}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge light badge-danger">Disabled</span>
                                        @elseif($val->status==1)
                                            <span class="badge light badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-target="#{{$val->id}}edit" class="">
                                            <i class="icon-pencil7 mr-2"></i>Edit
                                        </a>
                                    </td>
                                </tr>
                                <div id="{{$val->id}}edit" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$val->main_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <form action="{{url('admin/storegateway')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Name of gateway</label>
                                                                <input value="{{$val->id}}" type="hidden" name="id">
                                                                <input type="text" value="{{$val->name}}" name="name"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="">Rate:</label>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <span
                                                                                class="input-group-text">1 USD =</span>
                                                                         </span>
                                                                        <input type="number" name="rate" maxlength="10"
                                                                               class="form-control"
                                                                               value="{{$val->rate}}">
                                                                        <span class="input-group-append">
                                                                            <span
                                                                                class="input-group-text">{{$currency->name}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Minimun Deposit</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="minamo" maxlength="10"
                                                                           class="form-control"
                                                                           value="{{$val->minamo}}">
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Maximum Deposit</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="maxamo" maxlength="10"
                                                                           class="form-control"
                                                                           value="{{$val->maxamo}}">
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Deposit fixed charge</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" name="chargefx"
                                                                           maxlength="10" class="form-control"
                                                                           value="{{$val->fixed_charge}}">
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Charge in percentage</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" name="chargepc"
                                                                           maxlength="10" class="form-control"
                                                                           value="{{$val->percent_charge}}">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">%</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($val->id==101)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>PAYPAL BUSINESS EMAIL</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==102)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Perfect Money USD account</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Alternate passphrase</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==103)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Publishable key</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==104)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Merchant email</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==107)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==108)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==501)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Api key</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Xpub code</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($val->id==505)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Private key</label>
                                                                    <input type="text" value="{{$val->val2}}"
                                                                           class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Payment Details</label>
                                                                    <input type="text" value="{{$val->val1}}"
                                                                           class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control select" name="status">
                                                            <option value="1"
                                                                    @if($val->status==1)
                                                                    selected
                                                                @endif
                                                            >Active
                                                            </option>
                                                            <option value="0"
                                                                    @if($val->status==0)
                                                                    selected
                                                                @endif
                                                            >Deactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn bg-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="create" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('admin.withdraw.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name:</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
