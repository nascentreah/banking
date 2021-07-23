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
            $('#tbl_transfer_logs').DataTable({
                language: {
                    emptyTable: "No transfers available",
                    info: "Showing _START_ to _END_ of _TOTAL_ transfers",
                    infoEmpty: "Showing 0 to 0 of 0 transfers",
                    infoFiltered: "(filtered from _MAX_ total transfers)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ transfers",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search transfers:",
                    zeroRecords: "No transfers match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Own bank</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transfer Logs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_transfer_logs" class="display min-w850">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Ref</th>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transfer as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->ref_id}}</td>
                                    <td>
                                        <a href="{{url('admin/manage-user')}}/{{$val->sender['id']}}">{{$val->sender['id']}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/manage-user')}}/{{$val->receiver['id']}}">{{$val->receiver['id']}}</a>
                                    </td>
                                    <td>{{number_format($val->amount).$currency->name}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">Successful</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($val->type==0)
                                            <span class="badge badge-danger">Credit</span>
                                        @elseif($val->type==1)
                                            <span class="badge badge-success">Debit</span>
                                        @endif
                                    </td>
                                    <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-toggle="modal" data-target="#{{$val->id}}delete"
                                                       class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="font-weight-semibold">Are you sure you want to delete
                                                    this?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close
                                                </button>
                                                <a href="{{url('/')}}/admin/own-bank/delete/{{$val->id}}"
                                                   class="btn bg-danger">Proceed</a>
                                            </div>
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
@stop
