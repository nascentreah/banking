@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url('{{url('/')}}/asset/images/AAP.jpeg'); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-3"></span>
  <!-- Header container -->
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        @if($s)
        <div class="col-sm-12"><div class="alert alert-danger"><h4>Account Suspended</h4> <br>Reason:{{$m}}</div></div>
        @endif
        <div class="col-sm-4">

          <h3 style="color:#ffffff;">Acct bal- ${{number_format($user->balance, 2,".",",")}} {{$currency->name}}</h3>

        </div>

        <div class="col-sm-4">
          <h3 class="text-white">Acct - #{{$user->acct_no}}</h3>


        </div>
        <div class="col-lg-4 col-12 text-right">
          <?php $num = str_pad($user->acct_no, 16, '0', STR_PAD_LEFT) ?>
          @if($set->py_scheme==1)
          @if($user->upgrade==0)
          <span>
            <a href="#" data-toggle="modal" data-target="#modal-formx" class="btn btn-sm btn-neutral">Upgrade account</a>
          </span>

          @else
          <span>
            <a href="{{route('user.plans')}}" class="btn btn-sm btn-default">Investment scheme</a>
          </span>
          @endif
          @endif
          &nbsp;&nbsp;&nbsp;
          <a href="{{route('user.statement')}}" class="btn btn-sm btn-neutral">Transaction History</a>
          <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card bg-gradient-default border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                      <div class="text-white text-left mt-2 mb-3">Don't let your money sit there, upgrade your account & start investing in PY(per year) scheme.</div>
                      <div class="text-white text-left mt-2 mb-3">Upgrade fee costs {{$set->upgrade_fee.$currency->name}} . Check PY scheme to see what your money is invested on.</div>
                      <div class="text-left">
                        <a href="{{route('user.upgrade')}}" class="btn btn-neutral">Upgrade</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-8">
        <div class="card bg-gradient-default shadow">
          <div class="card-header bg-transparent">
            <h3 class="mb-0 text-white">Account timeline</h3>
          </div>
          <div class="card-body">
            <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
              @foreach($alert as $hh)
              <div class="timeline-block">
                <span class="timeline-step badge-info">
                  <i class="ni ni-like-2"></i>
                </span>
                <div class="timeline-content">
                  <small class="text-light font-weight-bold">{{date("Y/m/d h:i:A", strtotime($hh->created_at))}}</small>
                  <h5 class="text-white mt-3 mb-0">#{{$hh->reference}}</h5>
                  <p class="text-light text-sm mt-1 mb-0">Date: {{$hh->created_at}}, Amt: {{number_format($hh->amount).$currency->name}}, Ref: {{$hh->reference}}, Desc: {{$hh->details}}</p>
                  <div class="mt-3">
                    <span class="badge badge-pill badge-primary">
                      @if($hh->type==1)
                      Debit
                      @elseif($hh->type==2)
                      Credit
                      @endif
                    </span>
                    <span class="badge badge-pill badge-secondary">
                      @if($hh->status==1)
                      Successful
                      @elseif($hh->status==0)
                      Pending
                      @endif
                    </span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        @if($set->kyc==1)
        <div class="card bg-gradient-default">
          <!-- Card image -->
          <!-- List group -->
          <!-- Card body -->
          <div class="card-body">
            <h3 class="card-title mb-3 text-white">Identity verification</h3>
            <p class="card-text mb-4 text-white">Upload an identity document, for example, driver licence, voters card, international passport, national ID.</p>
            <span class="badge badge-pill badge-warning">
              @if($user->kyc_status==0)
              Unverified
              @else

              <span style="color:green;">Verified</span>
              @endif
            </span>

            @if(empty($user->kyc_link))
            <div class="row align-items-center">
              <div class="col-12 text-right">
                <a href="{{route('user.profile')}}#kyc" class="btn btn-sm btn-neutral">Upload</a>
              </div>
            </div>
            @endif
          </div>
        </div>
        @endif
        @if($set->save==1)
        <a href="{{route('user.save')}}">
          <div class="card bg-gradient-default shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h3 mb-0 text-white">Save 4 me</h5>
                </div>
              </div>
              <p class="card-text mb-4 text-white">Join our program and learn to save wisely ahead for your future.</p>
            </div>
          </div>
        </a>
        @endif

        <div class="card">
          <div class="flip">
            <div class="front">
              <div class="strip-bottom"></div>
              <div class="strip-top"></div>
              <svg class="logo" width="40" height="40" viewbox="0 0 17.5 16.2">
                <path d="M3.2 0l5.4 5.6L14.3 0l3.2 3v9L13 16.2V7.8l-4.4 4.1L4.5 8v8.2L0 12V3l3.2-3z" fill="white"></path>
              </svg>
              <div class="investor">BINANCEMERCHANT PAY</div>
              <div class="chip">
                <div class="chip-line"></div>
                <div class="chip-line"></div>
                <div class="chip-line"></div>
                <div class="chip-line"></div>
                <div class="chip-main"></div>
              </div>
              <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
              </svg>
              <div class="card-number">
                <div class="section"><?= substr($num, 0, 4) ?></div>
                <div class="section"><?= substr($num, 4, 4) ?></div>
                <div class="section"><?= substr($num, 8, 4) ?></div>
                <div class="section"><?= substr($num, 12, 4) ?></div>
              </div>
              <div class="end"><span class="end-text">exp. end:</span><span class="end-date">XX/XX</span></div>
              <div class="card-holder"><span class="mb-0 text-sm  font-weight-bold">{{$user->name}}</span></div>
              <div class="master">
                <div class="circle master-red"></div>
                <div class="circle master-yellow"></div>
              </div>
            </div>
            <div class="back">
              <div class="strip-black"></div>
              <div class="ccv">
                <label>ccv</label>
                <div>XXX</div>
              </div>
              <div class="terms">
                <p>This card is property of Binancemerchantpay, Misuse is criminal offence. </p>
              </div>
            </div>
          </div>
        </div>



        <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <style>
          *,
          *:before,
          *:after {
            box-sizing: border-box;
          }

          .inspiration {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-family: 'Gill Sans', sans-serif;
            font-size: 12px;
            color: #fff;
          }

          .left {
            position: absolute;
            left: 0;
            width: 60vw;
            height: 100vh;
            background-image: -webkit-gradient(linear, left top, right top, from(#202020), to(#808080));
            background-image: linear-gradient(to right, #202020, #808080);
          }

          .right {
            position: absolute;
            right: 0;
            width: 60vw;
            height: 100vh;
            overflow: hidden;
          }

          .right .strip-top {
            width: calc(50vw + 90px);
            -webkit-transform: skewX(20deg) translateX(160px);
            transform: skewX(20deg) translateX(160px);
          }

          .right .strip-bottom {
            width: calc(50vw + 40px);
            -webkit-transform: skewX(-15deg) translateX(90px);
            transform: skewX(-15deg) translateX(90px);
          }

          .card {}

          .flip {
            width: inherit;
            height: inherit;
            -webkit-transition: 0.7s;
            transition: 0.7s;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-animation: flip 2.5s ease;
            animation: flip 2.5s ease;
          }

          .front,
          .back {
            position: absolute;
            width: inherit;
            height: inherit;
            border-radius: 15px;
            color: #fff;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
            box-shadow: 0 1px 10px 1px rgba(0, 0, 0, 0.3);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background-image: -webkit-gradient(linear, left top, right top, from(#111), to(#555));
            background-image: linear-gradient(to right, #111, #555);
            overflow: hidden;
          }

          .front {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
          }

          .strip-bottom,
          .strip-top {
            position: absolute;
            right: 0;
            height: inherit;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#ff6767), to(#ff4545));
            background-image: linear-gradient(to bottom, #ff6767, #ff4545);
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.5);
          }

          .strip-bottom {
            width: 200px;
            -webkit-transform: skewX(-15deg) translateX(50px);
            transform: skewX(-15deg) translateX(50px);
          }

          .strip-top {
            width: 180px;
            -webkit-transform: skewX(20deg) translateX(50px);
            transform: skewX(20deg) translateX(50px);
          }

          .logo {
            position: absolute;
            top: 30px;
            right: 25px;
          }

          .investor {
            position: relative;
            top: 30px;
            left: 25px;
            text-transform: uppercase;
          }

          .chip {
            position: relative;
            top: 60px;
            left: 25px;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 50px;
            height: 40px;
            border-radius: 5px;
            background-image: -webkit-gradient(linear, right top, left bottom, from(#ffecc7), to(#d0b978));
            background-image: linear-gradient(to bottom left, #ffecc7, #d0b978);
            overflow: hidden;
          }

          .chip .chip-line {
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #333;
          }

          .chip .chip-line:nth-child(1) {
            top: 13px;
          }

          .chip .chip-line:nth-child(2) {
            top: 20px;
          }

          .chip .chip-line:nth-child(3) {
            top: 28px;
          }

          .chip .chip-line:nth-child(4) {
            left: 25px;
            width: 1px;
            height: 50px;
          }

          .chip .chip-main {
            width: 20px;
            height: 25px;
            border: 1px solid #333;
            border-radius: 3px;
            background-image: -webkit-gradient(linear, right top, left bottom, from(#efdbab), to(#e1cb94));
            background-image: linear-gradient(to bottom left, #efdbab, #e1cb94);
            z-index: 1;
          }

          .wave {
            position: relative;
            top: 20px;
            left: 100px;
          }

          .card-number {
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            margin: 40px 25px 10px;
            font-size: 23px;
            font-family: 'cc font', monospace;
          }

          .end {
            margin-left: 25px;
            text-transform: uppercase;
            font-family: 'cc font', monospace;
          }

          .end .end-text {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.8);
          }

          .card-holder {
            margin: 10px 25px;
            text-transform: uppercase;
            font-family: 'cc font', monospace;
          }

          .master {
            position: absolute;
            right: 20px;
            bottom: 20px;
            display: -webkit-box;
            display: flex;
          }

          .master .circle {
            width: 25px;
            height: 25px;
            border-radius: 50%;
          }

          .master .master-red {
            background-color: #eb001b;
          }

          .master .master-yellow {
            margin-left: -10px;
            background-color: rgba(255, 209, 0, 0.7);
          }

          .card {
            -webkit-perspective: 1000;
            perspective: 1000;
          }

          .card:hover .flip {
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
          }

          .back {
            -webkit-transform: rotateY(180deg) translateZ(0);
            transform: rotateY(180deg) translateZ(0);
            background: #9e9e9e;
          }

          .back .strip-black {
            position: absolute;
            top: 30px;
            left: 0;
            width: 100%;
            height: 50px;
            background: #000;
          }

          .back .ccv {
            position: absolute;
            top: 110px;
            left: 0;
            right: 0;
            height: 36px;
            width: 90%;
            padding: 10px;
            margin: 0 auto;
            border-radius: 5px;
            text-align: right;
            letter-spacing: 1px;
            color: #000;
            background: #fff;
          }

          .back .ccv label {
            display: block;
            margin: -30px 0 15px;
            font-size: 10px;
            text-transform: uppercase;
            color: #fff;
          }

          .back .terms {
            position: absolute;
            top: 150px;
            padding: 20px;
            font-size: 10px;
            text-align: justify;
          }

          @font-face {
            font-family: 'cc font';
            src: url("data:application/font-woff2;charset=utf-8;base64,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") format("woff2");
            font-weight: normal;
            font-style: normal;
          }

          @-webkit-keyframes flip {

            0%,
            100% {
              -webkit-transform: rotateY(0deg);
              transform: rotateY(0deg);
            }

            50% {
              -webkit-transform: rotateY(180deg);
              transform: rotateY(180deg);
            }
          }

          @keyframes flip {

            0%,
            100% {
              -webkit-transform: rotateY(0deg);
              transform: rotateY(0deg);
            }

            50% {
              -webkit-transform: rotateY(180deg);
              transform: rotateY(180deg);
            }
          }
        </style>
        @stop