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
            $('#tbl_messages').DataTable({
                language: {
                    emptyTable: "No messages available",
                    info: "Showing _START_ to _END_ of _TOTAL_ messages",
                    infoEmpty: "Showing 0 to 0 of 0 messages",
                    infoFiltered: "(filtered from _MAX_ total messages)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ messages",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search messages:",
                    zeroRecords: "No messages match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Tickets</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User accounts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{--                    <table id="tbl_cashout_history" class="display min-w850">--}}
                        {{--                        <thead>--}}
                        {{--                        <tr>--}}
                        {{--                            <th>Reference No</th>--}}
                        {{--                            <th>Date</th>--}}
                        {{--                            <th>Amount</th>--}}
                        {{--                            <th>Status</th>--}}
                        {{--                            <th>Action</th>--}}
                        {{--                        </tr>--}}
                        {{--                        </thead>--}}
                        {{--                        <tbody>--}}
                        {{--                        @foreach($alert as $hh)--}}
                        {{--                            <tr>--}}
                        {{--                                <td>{{ $hh->reference }}</td>--}}
                        {{--                                <td><b>{{ \Carbon\Carbon::parse($hh->created_at)->format('jS M Y')  }}</b><br/>--}}
                        {{--                                    <small class="text-gray">{{ date("h:i:A", strtotime($hh->created_at)) }}</small>--}}
                        {{--                                </td>--}}
                        {{--                                <td><b>${{ number_format($hh->amount) }}</b></td>--}}
                        {{--                                <td><span class="badge badge-success">Successful</span></td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}
                        {{--                        </tbody>--}}
                        {{--                    </table>--}}


                        <table id="tbl_messages" class="display min-w850">
                            <thead>
                            <tr>
                                <th>Ticket No</th>
                                <th>Subject</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Applied By</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ticket as $k=>$val)
                                <tr>
                                    <td>{{$val->ticket_id}}</td>
                                    <td>{{$val->subject}}</td>
                                    <td>{{$val->priority}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-info">Open</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-danger">Closed</span>
                                        @elseif($val->status==2)
                                            <span class="badge badge-success">Resolved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/manage-user')}}/{{$val->user->id}}">{{$val->user->name}}</a>
                                    </td>
                                    <td>
                                        <b>{{ \Carbon\Carbon::parse($val->created_at)->format('jS M Y')  }}</b><br/>
                                        <small
                                            class="text-gray">{{ date("h:i:A", strtotime($val->created_at)) }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item'
                                                       href="{{url('/')}}/admin/manage-ticket/{{$val->id}}"><i
                                                            class="icon-bubbles5 mr-2"></i>Manage ticket</a>
                                                    @if($val->status==0)
                                                        <a class='dropdown-item'
                                                           href="{{url('/')}}/admin/close-ticket/{{$val->id}}"><i
                                                                class="icon-eye-blocked2 mr-2"></i>Close ticket</a>
                                                    @endif
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
                                                <a href="{{url('/')}}/admin/ticket/delete/{{$val->id}}"
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
