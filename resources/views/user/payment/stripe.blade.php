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
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Stripe payment</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('ipn.stripe')}}" method="post" id="payment-form">
              @csrf
			  <input type="hidden" value="{{ $track }}" name="track">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Card name</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="text"
					class="form-control input-lg custom-input"
					name="name"
					placeholder="Card Name"
					autocomplete="off" autofocus
					/>
                  </div>
                </div>
              </div>              
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2">Card number</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg custom-input"
					name="cardNumber"
					placeholder="Valid Card Number"
					autocomplete="off"
					required autofocus
					/>
                  </div>
                </div>
              </div> 			  
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2">Expiration date</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg input-sz custom-input"
					name="cardExpiry"
					placeholder="MM / YYYY"
					autocomplete="off"
					required
					/>
                  </div>
                </div>
              </div>			  
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2">Cvc</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg input-sz custom-input"
					name="cardCVC"
					placeholder="CVC"
					autocomplete="off"
					required
					/>
                  </div>
                </div>
              </div>                
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Pay now</button>
              </div>
            </form>
          </div>
        </div>
@stop


@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
<script>
(function ($) {
	$(document).ready(function () {
		var card = new Card({
			form: '#payment-form',
			container: '.card-wrapper',
			formSelectors: {
				numberInput: 'input[name="cardNumber"]',
				expiryInput: 'input[name="cardExpiry"]',
				cvcInput: 'input[name="cardCVC"]',
				nameInput: 'input[name="name"]'
			}
		});
	});
})(jQuery);
</script>
@endsection


