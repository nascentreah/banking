
@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/ecommerce-2607114_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-12">
        <h1 class="display-2 text-white">Start receiving payment from any website</h1>
      </div>
      <div class="col-lg-12 col-12 text-right">
          <a href="{{route('user.add-merchant')}}" class="btn btn-sm btn-neutral">Create merchant</a>
          <a href="{{url('/')}}/user/merchant-documentation" class="btn btn-sm btn-neutral">Documentation</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="card" id="other">
      <div class="card-header header-elements-inline">
        <h3 class="mb-0">Merchants</h3>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-buttons">
          <thead class="thead-light">
            <tr>
              <th>S/N</th>
              <th>Logo</th>
              <th>Name</th>
              <th>Website url</th>
              <th>Merchant key</th>
              <th>Date</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>  
            @foreach($merchant as $k=>$val)
              <tr>
                <td>{{++$k}}.</td>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="javascript:void;" class="avatar rounded-circle mr-3">
                      <img src="{{url('/')}}/asset/profile/{{$val->logo}}">
                    </a>
                  </div>
                </th>
                <td>{{$val->name}}</td>
                <td>{{$val->site_url}}</td>
                <td>{{$val->merchant_key}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                <td>
                @if($val->status==1)
                  <span class="badge badge-success">Approved</span>
                @else
                  <span class="badge badge-danger">Pending</span>
                @endif
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Edit</a>
                      <a class="dropdown-item" href="#">Delete</a>
                    </div>
                  </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@stop