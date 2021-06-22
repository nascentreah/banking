@extends('userlayout')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/ecommerce-2607114_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-7">
      </div>
      <div class="col-lg-12 col-12 text-right">
          <a href="{{url('/')}}/user/fund#bank" class="btn btn-sm btn-neutral">Bank transfer logs</a>
          <a href="{{url('/')}}/user/fund#other" class="btn btn-sm btn-neutral">Other deposit logs</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="align-item-sm-center flex-sm-nowrap text-center">
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <div id="paystackEmbedContainer"></div>
            <form action="{{url('/')}}/ipnpaystack" method="POST">
                <script>
                    PaystackPop.setup({
                        key:'{{$paystack['value1']}}',
                        email:'{{$user->email}}',
                        amount:'{{ $paystack['amount'] }}',
                        container:'paystackEmbedContainer',
                        currency:'{{$currency->name}}',
                        reference:'{{ $paystack['track'] }}',
                    });
                </script>
            </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection