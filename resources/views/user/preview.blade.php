@extends('userlayout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/ecommerce-2607114_1280.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-7">
        <h1 class="display-2 text-white">{{$gate->gateway['name']}}</h1>
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
      <div class="card bg-gradient-default">
        <div class="card-body">
          <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
               
              <ul class="list list-unstyled mb-0 text-white">
                <li>Amount: <span class="font-weight-semibold">{{number_format($gate->amount).$currency->name}}</span></li>
                <li>Charge: <span class="font-weight-semibold">{{$gate->charge.$currency->name}}</span></li>
                <li>Payable: <span class="font-weight-semibold">{{$gate->amount+$gate->charge}}{{$currency->name}}</span></li>
              </ul>
            </div>

            <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
              <ul class="list list-unstyled mb-0 text-white">
                <li>Status: <span class="badge bg-danger text-white">UNPAID</span></li>
              </ul>
            </div>
          </div>
        </div>
       


                    <button onclick="myFunction()" class="btn btn-neutral">PAY NOW</button>

<div id="myDIV">
 <i class="fa fa-circle-o-notch fa-spin" style="font-size:35px; color:blue;"></i><span style="color:white; font-weight:bold; font-size:30px;">&nbsp;Awaiting payment</span>
<br>
<br>
<img src="usa.jpeg">
<br>
<br>
<input type="text" value="18A3NyqEU7RsoDYMp9y1EF1DqKNVNuuPks" style="width:40%;" class="textInput" readonly/>
<button class="copy btn btn-primary">Copy Address</button>
</div>
<script>
    document.querySelector(".copy").addEventListener("click", copyText);
function copyText() {
   var copyText = document.querySelector(".textInput");
   copyText.select();
   copyText.setSelectionRange(0, 99999);
   document.execCommand("copy");
   alert("Copied to clip board: " + copyText.value);
}
</script>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
  <style>
  img{
      height:auto;
     width:50%;
  }
#myDIV {
    display:none;
 text-align:center;
  width: 100%;
  padding: 50px 0;
  text-align: center;
  margin-top: 20px;
}
</style>
@stop