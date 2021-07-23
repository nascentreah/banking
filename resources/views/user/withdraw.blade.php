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

    <!-- row -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 text-black">Profile Strength</h4>
                </div>
                <div class="card-body pt-0">
                    <div id="stackedChart"></div>
                    <div class="d-flex mb-3 align-items-center">
                        <div>
                            <span class="cd-icon bgl-success">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z" fill="#2BC155"></path>
                                    <path d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5757 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z" fill="#2BC155"></path>
                                    <path d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z" fill="#2BC155"></path>
                                </svg>
                            </span>
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
                            <span class="fs-14">Application Answered</span>
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
        <div class="col-xl-3 col-xxl-6 col-lg-3 col-sm-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body mr-3">
                            <h2 class="text-success">43</h2>
                            <span class="position">Application Sent</span>
                        </div>
                        <span class="cd-icon bgl-success">
												<svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
													<path
                                                        d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z"
                                                        fill="#2BC155"/>
													<path
                                                        d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5757 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z"
                                                        fill="#2BC155"/>
													<path
                                                        d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z"
                                                        fill="#2BC155"/>
												</svg>
											</span>
                    </div>
                </div>
                <span class="line bg-success"></span>
            </div>
        </div>

        <div class="col-xl-3 col-xxl-6 col-lg-3 col-sm-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body mr-3">
                            <h2 class="text-success">43</h2>
                            <span class="position">Application Sent</span>
                        </div>
                        <span class="cd-icon bgl-success">
												<svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
													<path
                                                        d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z"
                                                        fill="#2BC155"/>
													<path
                                                        d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5757 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z"
                                                        fill="#2BC155"/>
													<path
                                                        d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z"
                                                        fill="#2BC155"/>
												</svg>
											</span>
                    </div>
                </div>
                <span class="line bg-success"></span>
            </div>
        </div>

        <div class="col-xl-3 col-xxl-6 col-lg-3 col-sm-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body mr-3">
                            <h2 class="text-secondary">27</h2>
                            <span class="position">Interviews Schedule</span>
                        </div>
                        <span class="cd-icon bgl-secondary">
												<svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
													<path
                                                        d="M33.25 8.75H31.5V5.25C31.5 4.78587 31.3156 4.34075 30.9874 4.01256C30.6593 3.68437 30.2141 3.5 29.75 3.5C29.2859 3.5 28.8407 3.68437 28.5126 4.01256C28.1844 4.34075 28 4.78587 28 5.25V8.75H14V5.25C14 4.78587 13.8156 4.34075 13.4874 4.01256C13.1592 3.68437 12.7141 3.5 12.25 3.5C11.7859 3.5 11.3408 3.68437 11.0126 4.01256C10.6844 4.34075 10.5 4.78587 10.5 5.25V8.75H8.75C7.35761 8.75 6.02226 9.30312 5.03769 10.2877C4.05312 11.2723 3.5 12.6076 3.5 14V15.75H38.5V14C38.5 12.6076 37.9469 11.2723 36.9623 10.2877C35.9777 9.30312 34.6424 8.75 33.25 8.75Z"
                                                        fill="#3F9AE0"/>
													<path
                                                        d="M3.5 33.25C3.5 34.6424 4.05312 35.9777 5.03769 36.9623C6.02226 37.9469 7.35761 38.5 8.75 38.5H33.25C34.6424 38.5 35.9777 37.9469 36.9623 36.9623C37.9469 35.9777 38.5 34.6424 38.5 33.25V19.25H3.5V33.25Z"
                                                        fill="#3F9AE0"/>
												</svg>
											</span>
                    </div>
                </div>
                <span class="line bg-secondary"></span>
            </div>
        </div>

        <div class="col-xl-3 col-xxl-12 col-lg-3 col-md-12">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body mr-3">
                            <h2 class="text-warning">52k</h2>
                            <span class="position">Profile Viewed</span>
                        </div>
                        <span class="cd-icon bgl-warning">
												<svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M15.1812 22.0083C15.0651 21.9063 14.7969 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4869 0.0410156 21.0011 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9385 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.5541 24.0553 28.5233 24.3626C35.7277 26.641 40.9507 32.0853 41.8277 38.538C41.9484 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50675 41.9591 3.14821 41.9591C2.27873 41.9591 1.45183 41.5824 0.881272 40.9263C0.310711 40.2701 0.0524068 39.3989 0.172348 38.5437C1.05148 32.0851 6.27447 26.641 13.4778 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1812 22.0083Z"
                                                          fill="#FF9B52"/>
												</svg>
											</span>
                    </div>
                </div>
                <span class="line bg-warning"></span>
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
                                    <td>{{ date("Y/m/d", strtotime($val->created_at)) }}<br/>
                                        <small>{{ date("h:i:A", strtotime($val->created_at)) }}</small></td>
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
