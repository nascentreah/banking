@extends('master')

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Deposits</a></li>
        </ol>
    </div>
    <div class="row">

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-calendar-1"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Deactivated Users</p>
                            <h3 class="text-white">{{ $blockedusers }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-diamond"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Active Users</p>
                            <h3 class="text-white">{{ $activeusers }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Deposits</p>
                            <h3 class="text-white">{{ $totalbdeposit }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Withdraws</p>
                            <h3 class="text-white">{{ $totalwd }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <h3 class="text-white">{{ $totalloan }}</h3>
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
    
@stop
