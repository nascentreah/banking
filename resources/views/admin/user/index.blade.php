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
            $('#tbl_user_accounts').DataTable({
                language: {
                    emptyTable: "No user accounts available",
                    info: "Showing _START_ to _END_ of _TOTAL_ user accounts",
                    infoEmpty: "Showing 0 to 0 of 0 user accounts",
                    infoFiltered: "(filtered from _MAX_ total user accounts)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ user accounts",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search user accounts:",
                    zeroRecords: "No user accounts match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">User accounts</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-user"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Users</p>
                            <h3 class="text-white">{{ count($users) }}</h3>
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
										<i class="la la-user-check"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Active Users</p>
                            <h3 class="text-white"> {{ count($users) }}</h3>
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
										<i class="la la-user-edit"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Suspended Users</p>
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
										<i class="la la-user-lock"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Inactive Users</p>
                            <h3 class="text-white">$ {{ count($users) }}</h3>
                            <small>30% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User accounts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_user_accounts" class="display min-w850">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Acct no</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Account Suspension</th>
                                <th>Balance</th>
                                <th>Created</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $k=>$val)
                                <tr>
                                    <td>{{$val->username}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->acct_no}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge light badge-success">Active</span>
                                        @elseif($val->status==1)
                                            <span class="badge light badge-danger">Blocked</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($val->suspend==0)
                                            <span class="badge light badge-warning">Not Suspended</span>
                                        @elseif($val->suspend==1)
                                            <span class="badge light badge-danger">Suspended</span>
                                        @endif
                                    </td>
                                    <td> <b>{{ number_format($val->balance) }}</b> <br/> <small>{{ $currency->name }}</small></td>
                                    <td>

                                        <b>{{ \Carbon\Carbon::parse($val->created_at)->format('jS M Y')  }}</b><br/>
                                        <small class="text-gray">{{ date("h:i:A", strtotime($val->created_at)) }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item'
                                                       href="{{url('/')}}/admin/manage-user/{{$val->id}}"><i
                                                            class="icon-cogs spinner mr-2"></i>Manage account</a>
                                                    @if($val->status==0)
                                                        <a class='dropdown-item'
                                                           href="{{url('/')}}/admin/block-user/{{$val->id}}"><i
                                                                class="icon-eye-blocked2 mr-2"></i>Block</a>
                                                    @else
                                                        <a class='dropdown-item'
                                                           href="{{url('/')}}/admin/unblock-user/{{$val->id}}"><i
                                                                class="icon-eye mr-2"></i>Unblock</a>
                                                    @endif
                                                    @if($val->suspend==0)
                                                        <a class='dropdown-item' data-toggle="modal"
                                                           data-target="#{{$val->id}}block" href="javascript:;"><i
                                                                class="icon-blocked mr-2"></i>Suspend Account</a>
                                                    @else
                                                        <a class='dropdown-item'
                                                           href="{{url('/')}}/admin/unsuspend-user/{{$val->id}}"><i
                                                                class="icon-user mr-2"></i>Unsuspend Account</a>
                                                    @endif
                                                    <a class='dropdown-item'
                                                       href="{{url('/')}}/admin/email/{{$val->email}}/{{$val->name}}"><i
                                                            class="icon-envelope mr-2"></i>Send email</a>
                                                    <a data-toggle="modal" data-target="#{{$val->id}}delete"
                                                       class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete
                                                        account</a>
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
                                                <a href="{{url('/')}}/admin/user/delete/{{$val->id}}"
                                                   class="btn bg-danger">Proceed</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="{{$val->id}}block" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{url('/')}}/admin/suspend-user/{{$val->id}}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-semibold">Suspension Reason (Message)</h6>
                                                    <textarea name="suspend_msg" class="form-control"
                                                              placeholder="Type Message Here"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button class="btn btn-primary">Suspend Account</button>
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
@stop
