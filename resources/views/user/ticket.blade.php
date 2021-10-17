@extends('userlayout')

<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">

@push('extra-js')
    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tbl_tickets').DataTable({
                language: {
                    emptyTable: "No tickets available",
                    info: "Showing _START_ to _END_ of _TOTAL_ tickets",
                    infoEmpty: "Showing 0 to 0 of 0 tickets",
                    infoFiltered: "(filtered from _MAX_ total tickets)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ tickets",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search tickets:",
                    zeroRecords: "No tickets match search criteria"
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
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-wallet"></i>
									</span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Deposits</p>
                            <h3 class="text-white">$ {{ count($ticket) }}</h3>
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
                            <h3 class="text-white">$ {{ count($ticket) }}</h3>
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
                            <h3 class="text-white">$ {{ count($ticket) }}</h3>
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
                        <table class="display min-w850" id="tbl_tickets">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Subject</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ticket as $k=>$val)
                                <tr>
                                    <td><b>#{{$val->ticket_id}}</b></td>
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
                                        <b>{{ \Carbon\Carbon::parse($val->created_at)->format('jS M Y')  }}</b><br/>
                                        <small class="text-gray">{{ date("h:i:A", strtotime($val->created_at)) }}</small>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                   href="{{url('/')}}/user/reply-ticket/{{$val->id}}">Reply</a>
                                                <a class="dropdown-item"
                                                   href="{{url('/')}}/user/ticket/delete/{{$val->id}}">Delete</a>
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

        <div class="col-md-4 col-4">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h3 class="mb-0">Create Ticket</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('submit-ticket')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Subject</label>
                            <div class="col-lg-12">
                                <div class="input-group input-group-merge">
                                    <input type="text" name="subject" value="{{ old('subject') }}" maxlength="10"
                                           class="form-control"
                                           required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Priority</label>
                            <div class="col-lg-12">
                                <select class="form-control select" name="category"
                                        data-dropdown-css-class="bg-slate-800" data-fouc required>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-12">Details</label>
                            <div class="col-lg-12">
                                <textarea name="details" class="form-control" rows="4"
                                          required>{{ old('details') }}</textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
