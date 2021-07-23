@extends('userlayout')

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Accounts</a></li>
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
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary">Account timeline</h4>
                                <p>This is your account statement page. Always keep track
                                    for your account history</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($alert as $hh)
            <div class="col-xl-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        <h5 class="card-title text-white">#{{ $hh->reference }}</h5>
                    </div>
                    <div class="card-body mb-0">
                        <p class="card-text">
                            Date: {{$hh->created_at}},
                            Amt: {{number_format($hh->amount)." ".$currency->name}},<br/> Ref: {{$hh->reference}},<br/>
                            Desc: {{ $hh->details }}
                        </p>

                      @if($hh->type==1)
                            <span class="badge badge-pill badge-warning">Debit</span>
                            @elseif($hh->type==2)
                            <span class="badge badge-light">Credit</span>
                            @endif
                        @if($hh->status==1)
                            <span class="badge badge-pill badge-success">Successful</span>
                        @elseif($hh->status==0)
                            <span class="badge badge-pill badge-danger">Pending</span>
                        @endif
                    </div>
                    <div
                        class="card-footer bg-transparent border-0 text-white">{{ date("Y/m/d h:i:A", strtotime($hh->created_at)) }}</div>
                </div>
            </div>
        @endforeach
    </div>
@stop
