@extends('userlayout')

@section('content')
    {{--<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/dashboard/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">--}}
    {{--  <!-- Mask -->--}}
    {{--  <span class="mask bg-gradient-default opacity-6"></span>--}}
    {{--  <!-- Header container -->--}}
    {{--  <div class="container-fluid d-flex align-items-center">--}}
    {{--    <div class="row">--}}
    {{--      <div class="col-lg-10 col-md-10">--}}
    {{--        <h1 class="display-2 text-white">Hello {{$user->name}}</h1>--}}
    {{--        <p class="text-white mt-0 mb-5">This is your profile page.</p>--}}
    {{--        <a href="{{url('/')}}/user/profile#edit" class="btn btn-neutral">Edit profile</a>--}}
    {{--      </div>--}}
    {{--    </div>--}}
    {{--  </div>--}}
    {{--</div>--}}

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Profile</a></li>
        </ol>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{ asset('images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ title_case($user->name) }}</h4>
                                <p>User</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ $user->email }}</h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ml-auto">
                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                   aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View
                                        profile
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close
                                        friends
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card text-white bg-primary">
                <div class="card-body mb-0">
                    <small class="text-white">My Balance</small>
                    <small class="text-white">&nbsp;</small>
                    <small class="text-white">&nbsp;</small>
                    <p class="text-white pull-right">{{ $set->site_name }}</p>
                    <h5 class="card-title text-white">
                        ${{number_format($user->balance, 2,".",",")}}
                    </h5>
                    <p class="card-text text-white pull-right">
                    <div class="card-number pull-right">
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 0, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 4, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 8, 4) }}
                        {{ substr(str_pad($user->acct_no, 16, '0', STR_PAD_LEFT), 12, 4) }}
                    </div>
                    </p>
                    <span class="badge badge-pill badge-warning">Debit</span>
                </div>
                <div class="card-footer bg-transparent border-0 text-white">
                    <small class="text-white">Card Holder</small><br/>
                    <b>{{ $user->name }}</b>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About
                                        Me</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">About Me</h4>
                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul,
                                                like these sweet mornings of spring which I enjoy with my whole heart. I
                                                am alone, and feel the charm of existence was created for the bliss of
                                                souls like mine.I am so happy, my dear friend, so absorbed in the
                                                exquisite sense of mere tranquil existence, that I neglect my
                                                talents.</p>
                                            <p>A collection of textile samples lay spread out on the table - Samsa was a
                                                travelling salesman - and above it there hung a picture that he had
                                                recently cut out of an illustrated magazine and housed in a nice, gilded
                                                frame.</p>
                                        </div>
                                    </div>
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Username <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->username }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->name }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->email }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Mobile<span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Country <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->country }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">City <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->city }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Zip Code <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->zip_code }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ $user->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form action="{{url('user/account')}}" method="post">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Username:</label>
                                                        <input type="text" name="username" class="form-control" readonly
                                                               value="{{ $user->username }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Name:</label>
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{ old( 'name', $user->name) }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Email:</label>
                                                        <input type="email" name="email" class="form-control" readonly
                                                               value="{{ old( 'email', $user->email) }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Mobile:</label>
                                                        <input type="text" name="phone" class="form-control"
                                                               value="{{ old('phone', $user->phone) }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Address:</label>
                                                    <input type="text" name="address" class="form-control"
                                                           value="{{ old('address', $user->address) }}">
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Country:</label>
                                                        <input type="text" name="country" class="form-control"
                                                               value="{{ old('country', $user->country) }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>City:</label>
                                                        <input type="text" name="city" class="form-control"
                                                               value="{{ old('city', $user->city) }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Zip Code:</label>
                                                        <input type="text" name="zip_code" class="form-control"
                                                               value="{{ old('zip_code',$user->zip_code) }}">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Pin:</label>
                                                        <input type="number" name="pin" class="form-control"
                                                               value="{{ old('pin', $user->pin) }}">
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-statistics mb-5">
                        <div class="text-center">
                            <div class="row">
                                <div class="col">
                                    <h3 class="m-b-0">150</h3><span>Follower</span>
                                </div>
                                <div class="col">
                                    <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                </div>
                                <div class="col">
                                    <h3 class="m-b-0">45</h3><span>Reviews</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="javascript:void()" class="btn btn-primary mb-1 mr-1">Follow</a>
                                <a href="javascript:void()" class="btn btn-primary mb-1" data-toggle="modal"
                                   data-target="#sendMessageModal">Send Message</a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="sendMessageModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Send Message</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="comment-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="text-black font-w600">Name <span class="required">*</span></label>
                                                        <input type="text" class="form-control" value="Author"
                                                               name="Author" placeholder="Author">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="text-black font-w600">Email <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control" value="Email"
                                                               placeholder="Email" name="Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="text-black font-w600">Comment</label>
                                                        <textarea rows="8" class="form-control" name="comment"
                                                                  placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-0">
                                                        <input type="submit" value="Post Comment"
                                                               class="submit btn btn-primary" name="submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-news">
                        <h5 class="text-primary d-inline">Our Latest News</h5>
                        <div class="media pt-3 pb-3">
                            <img src="images/profile/5.jpg" alt="image" class="mr-3 rounded" width="75">
                            <div class="media-body">
                                <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile
                                        samples</a></h5>
                                <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                            </div>
                        </div>
                        <div class="media pt-3 pb-3">
                            <img src="images/profile/6.jpg" alt="image" class="mr-3 rounded" width="75">
                            <div class="media-body">
                                <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile
                                        samples</a></h5>
                                <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                            </div>
                        </div>
                        <div class="media pt-3 pb-3">
                            <img src="images/profile/7.jpg" alt="image" class="mr-3 rounded" width="75">
                            <div class="media-body">
                                <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile
                                        samples</a></h5>
                                <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
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
                <div class="col-md-8">
                    @if($set->kyc)
                        <div class="card bg-gradient-default" id="kyc">
                            <div class="card-body">
                                <h3 class="card-title mb-3 text-white">Kyc verification</h3>
                                <p class="card-text mb-4 text-white">Upload an identity document, for example, driver
                                    licence, voters card, international passport, national ID.</p>
                                <span class="badge badge-pill badge-warning">
              @if($user->kyc_status==0)
                                        Unverified
                                    @else
                                        Verified
                                    @endif
              </span>
                                <br><br>
                                @if(empty($user->kyc_link))
                                    <form method="post" action="{{url('user/kyc')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFileLang1"
                                                           name="image" lang="en">
                                                    <label class="custom-file-label" for="customFileLang1">Select
                                                        document</label>
                                                </div>
                                                <span class="form-text text-white">Accepted formats: png, jpg.</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="submit" class="btn btn-neutral" value="Upload">
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-4">

                    <!-- Basic layout-->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h3 class="mb-0">Change account photo</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{url('user/avatar')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFileLang" name="image"
                                               accept="image/*">
                                        <label class="custom-file-label" for="customFileLang">Select photo</label>
                                    </div>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                    <span class="form-text text-muted">Accepted formats:png, jpg.</span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Upload<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
