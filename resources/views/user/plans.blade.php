@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/blog-img59.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-6"></span>
  <!-- Header container -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-7">
        <h1 class="display-2 text-white">Per year scheme</h1>
      </div>
      <div class="col-lg-6 col-12 text-right">
        <a href="{{url('/')}}/user/plans#earnings" class="btn btn-sm btn-neutral">Track earnings</a>
      </div>
    </div>
  </div>
</div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="content-wrapper">
      <div class="row">
      @foreach($plan as $val)
        <div class="col-md-6">
          <div class="pricing card-group flex-column flex-md-row mb-3">
            <div class="card card-pricing border-0 bg-default text-center mb-4">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col-lg-4 col-7">
                    <!-- Title -->
                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left">{{$val->name}}</h4>
                  </div>
                  <div class="col-lg-8 col-12 text-right">
                    <a href="#" data-toggle="modal" data-target="#calculate{{$val->id}}" class="btn btn-sm btn-primary">Calculate profit</a>
                    <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"  class="btn btn-sm btn-success">Purchase plan</a>
                    <div class="modal fade" id="calculate{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                              <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-3"><small>Calculate profit</small></div>
                                <div class="btn-wrapper text-center">
                                   <h4 class="text-uppercase ls-1 text-danger py-3 mb-0">{{$val->name}}</h4>
                                </div>
                              </div>
                              <div class="card-body px-lg-5 py-lg-5">
                                <form role="form" action="{{url('user/calculate')}}" method="post">
                                @csrf
                                  <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->name}}</span>
                                      </div>
                                      <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                      <input type="hidden" name="plan_id" value="{{$val->id}}"> 
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-danger my-4">Calculate</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="modal fade" id="buy{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                              <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-3"><small>Purchase plan</small></div>
                                <div class="btn-wrapper text-center">
                                   <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">{{$val->name}}</h4>
                                </div>
                              </div>
                              <div class="card-body px-lg-5 py-lg-5">
                                <form role="form" action="{{url('user/buy')}}" method="post">
                                @csrf
                                  <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->name}}</span>
                                      </div>
                                      <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                      <input type="hidden" name="plan" value="{{$val->id}}">
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Purchase</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-body px-lg-7">
                <div class="display-2 text-white" style="font-size: 2.0rem;">{{$val->min_deposit}} - {{$val->amount.$currency->name}}</div>
                <span class="text-muted">For  {{$val->duration.' '.$val->period}}</span>
                <ul class="list-unstyled my-4">
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-danger shadow rounded-circle text-white">
                          <i class="fa fa-check"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">{{$val->percent}}% monthly top up</span>
                      </div>
                    </div>
                  </li>                   
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-danger shadow rounded-circle text-white">
                          <i class="fa fa-check"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">Interest {{($val->percent*castrotime('1 year'))-100}}% </span>
                      </div>
                    </div>
                  </li>
                 <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-danger shadow rounded-circle text-white">
                          <i class="fa fa-check"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">Compound interest  {{$val->percent*castrotime('1 year')}}% </span>
                      </div>
                    </div>
                  </li>                  
                </ul>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
      <div class="row" id="earnings">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">PY scheme system</h3>
          </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
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
@stop