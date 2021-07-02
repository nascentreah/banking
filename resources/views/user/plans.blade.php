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
            $('#tbl_py_scheme').DataTable({
                language: {
                    emptyTable: "No plans available",
                    info: "Showing _START_ to _END_ of _TOTAL_ plans",
                    infoEmpty: "Showing 0 to 0 of 0 plans",
                    infoFiltered: "(filtered from _MAX_ total plans)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ plans",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search plans:",
                    zeroRecords: "No plans match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Py scheme</a></li>
        </ol>
    </div>

    <div class="row">
        @foreach($plan as $val)
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media pb-4 border-bottom mb-4 align-items-center">
                            <div class="media-body">
                                <h4 class="fs-20"><a href="search-job.html" class="text-black">{{$val->name}}</a></h4>
                                <div class="d-flex">
                                    <a href="#" data-toggle="modal" data-target="#calculate{{$val->id}}"
                                       class="btn btn-sm btn-primary">Calculate profit</a>
                                    <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"
                                       class="btn btn-sm btn-success">Purchase plan</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-table mb-2">
                            <h4 class="price float-left d-block text-primary">{{$currency->name}} $325.00</h4>
                        </div>

                        <div class="d-flex mb-3">
                        <span class="text-black mr-auto font-w500">
                            <svg class="mr-3" width="28" height="28" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 0C6.93398 0 2.8125 4.12148 2.8125 9.1875C2.8125 10.8091 3.24094 12.4034 4.05145 13.7979C4.24041 14.123 4.45162 14.4398 4.67934 14.7396L11.6008 24H12.3991L19.3207 14.7397C19.5483 14.4398 19.7595 14.1231 19.9485 13.7979C20.7591 12.4034 21.1875 10.8091 21.1875 9.1875C21.1875 4.12148 17.066 0 12 0ZM12 12.2344C10.32 12.2344 8.95312 10.8675 8.95312 9.1875C8.95312 7.50745 10.32 6.14062 12 6.14062C13.68 6.14062 15.0469 7.50745 15.0469 9.1875C15.0469 10.8675 13.68 12.2344 12 12.2344Z"
                                    fill="#A9A9A9"></path>
                            </svg>
                            {{$val->percent}}% monthly top up
                        </span>
                        </div>
                        <div class="d-flex mb-3">
                        <span class="text-black mr-auto font-w500">
                            <svg class="mr-3" width="28" height="28" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9999 5.99971H20.0001V21.9999H21.9999C23.0997 21.9999 24 21.0993 24 19.9995V7.99951C24 6.9 23.0997 5.99971 21.9999 5.99971Z"
                                    fill="#A9A9A9"></path>
                                <path
                                    d="M15.9999 5.9997V3.9999C15.9999 2.90009 15.0996 1.9998 14.0001 1.9998H9.9999C8.90039 1.9998 8.0001 2.90009 8.0001 3.9999V5.9997H6V21.9999H18V5.9997H15.9999ZM14.0001 5.9997H9.9999V3.99961H14.0001V5.9997Z"
                                    fill="#A9A9A9"></path>
                                <path
                                    d="M2.0001 5.99971C0.900293 5.99971 0 6.9 0 7.99981V19.9998C0 21.0996 0.900293 22.0002 2.0001 22.0002H3.9999V5.99971H2.0001Z"
                                    fill="#A9A9A9"></path>
                            </svg>
                        Interest {{($val->percent*castrotime('1 year'))-100}}%
                        </span>
                        </div>
                        <div class="d-flex mb-3">
                        <span class="text-black mr-auto font-w500">
                            <svg class="mr-3" width="28" height="28" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9999 5.99971H20.0001V21.9999H21.9999C23.0997 21.9999 24 21.0993 24 19.9995V7.99951C24 6.9 23.0997 5.99971 21.9999 5.99971Z"
                                    fill="#A9A9A9"></path>
                                <path
                                    d="M15.9999 5.9997V3.9999C15.9999 2.90009 15.0996 1.9998 14.0001 1.9998H9.9999C8.90039 1.9998 8.0001 2.90009 8.0001 3.9999V5.9997H6V21.9999H18V5.9997H15.9999ZM14.0001 5.9997H9.9999V3.99961H14.0001V5.9997Z"
                                    fill="#A9A9A9"></path>
                                <path
                                    d="M2.0001 5.99971C0.900293 5.99971 0 6.9 0 7.99981V19.9998C0 21.0996 0.900293 22.0002 2.0001 22.0002H3.9999V5.99971H2.0001Z"
                                    fill="#A9A9A9"></path>
                            </svg>
                            Compound interest  {{$val->percent*castrotime('1 year')}}%
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PY scheme system</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="tbl_py_scheme">
                            <thead class="thead-light">
                            <tr>
                                <th>S/N</th>
                                <th>Ref</th>
                                <th>Plan</th>
                                <th>Deposit</th>
                                <th>Monthly percent</th>
                                <th>Profit</th>
                                <th>Started</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($profit as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->trx}}</td>
                                    <td>{{$val->plan->name}}</td>
                                    <td>{{number_format($val->amount).$currency->name}}</td>
                                    <td>{{$val->plan->percent}}%</td>
                                    <td>{{number_format($val->profit).$currency->name}}</td>
                                    <td>{{timeAgo($val->date)}}</td>
                                    <td>
                                        @if ($datetime<$val->end_date)
                                            <span class="badge badge-success">Running</span>
                                        @else
                                            <span class="badge badge-primary">Ended</span>
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

    <!-- Page content -->
{{--    <div class="container-fluid mt--6">--}}
{{--        <div class="content-wrapper">--}}
{{--            <div class="row">--}}
{{--                @foreach($plan as $val)--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="pricing card-group flex-column flex-md-row mb-3">--}}
{{--                            <div class="card card-pricing border-0 bg-default text-center mb-4">--}}
{{--                                <div class="card-header bg-transparent">--}}
{{--                                    <div class="row align-items-center">--}}
{{--                                        <div class="col-lg-4 col-7">--}}
{{--                                            <!-- Title -->--}}
{{--                                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left">{{$val->name}}</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-8 col-12 text-right">--}}
{{--                                            --}}{{--                    <a href="#" data-toggle="modal" data-target="#calculate{{$val->id}}" class="btn btn-sm btn-primary">Calculate profit</a>--}}
{{--                                            --}}{{--                    <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"  class="btn btn-sm btn-success">Purchase plan</a>--}}
{{--                                            <div class="modal fade" id="calculate{{$val->id}}" tabindex="-1"--}}
{{--                                                 role="dialog" aria-labelledby="modal-form" aria-hidden="true">--}}
{{--                                                <div class="modal-dialog modal- modal-dialog-centered modal-sm"--}}
{{--                                                     role="document">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-body p-0">--}}
{{--                                                            <div class="card bg-secondary border-0 mb-0">--}}
{{--                                                                <div class="card-header bg-transparent pb-5">--}}
{{--                                                                    <div class="text-muted text-center mt-2 mb-3">--}}
{{--                                                                        <small>Calculate profit</small></div>--}}
{{--                                                                    <div class="btn-wrapper text-center">--}}
{{--                                                                        <h4 class="text-uppercase ls-1 text-danger py-3 mb-0">{{$val->name}}</h4>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="card-body px-lg-5 py-lg-5">--}}
{{--                                                                    <form role="form" action="{{url('user/calculate')}}"--}}
{{--                                                                          method="post">--}}
{{--                                                                        @csrf--}}
{{--                                                                        <div class="form-group mb-3">--}}
{{--                                                                            <div--}}
{{--                                                                                class="input-group input-group-merge input-group-alternative">--}}
{{--                                                                                <div class="input-group-prepend">--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="input-group-text">{{$currency->name}}</span>--}}
{{--                                                                                </div>--}}
{{--                                                                                <input type="number" step="any"--}}
{{--                                                                                       class="form-control"--}}
{{--                                                                                       placeholder="" name="amount"--}}
{{--                                                                                       required>--}}
{{--                                                                                <input type="hidden" name="plan_id"--}}
{{--                                                                                       value="{{$val->id}}">--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="text-center">--}}
{{--                                                                            <button type="submit"--}}
{{--                                                                                    class="btn btn-danger my-4">--}}
{{--                                                                                Calculate--}}
{{--                                                                            </button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </form>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <div class="modal fade" id="buy{{$val->id}}" tabindex="-1" role="dialog"--}}
{{--                 aria-labelledby="modal-form" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal- modal-dialog-centered modal-sm"--}}
{{--                     role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-body p-0">--}}
{{--                            <div class="card bg-secondary border-0 mb-0">--}}
{{--                                <div class="card-header bg-transparent pb-5">--}}
{{--                                    <div class="text-muted text-center mt-2 mb-3"><small>Purchase--}}
{{--                                            plan</small></div>--}}
{{--                                    <div class="btn-wrapper text-center">--}}
{{--                                        <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">{{$val->name}}</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body px-lg-5 py-lg-5">--}}
{{--                                    <form role="form" action="{{url('user/buy')}}"--}}
{{--                                          method="post">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group mb-3">--}}
{{--                                            <div--}}
{{--                                                class="input-group input-group-merge input-group-alternative">--}}
{{--                                                <div class="input-group-prepend">--}}
{{--                                                                                <span--}}
{{--                                                                                    class="input-group-text">{{$currency->name}}</span>--}}
{{--                                                </div>--}}
{{--                                                <input type="number" step="any"--}}
{{--                                                       class="form-control" placeholder=""--}}
{{--                                                       name="amount" required>--}}
{{--                                                <input type="hidden" name="plan"--}}
{{--                                                       value="{{$val->id}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center">--}}
{{--                                            <button type="submit"--}}
{{--                                                    class="btn btn-primary my-4">Purchase--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
@stop
