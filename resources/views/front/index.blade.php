@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="backg backg-one" style="background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);">

<div class="circle-shape"><img src="{{url('/')}}/asset/img/shape/shape-circle.svg" alt="circle"></div>

<div class="container">
    <div class="backg-content-wrap">
        <div class="row align-items-center">
            <div class="col-lg-6 z100">
                <div class="backg-content">
                    <span class="discount wow soneFadeUp text-dark" data-wosw-delay="0.3s"><b>{{$set->title}}</span>
                    <h1 class="backg-title wow soneFadeUp text-dark" data-wow-delay="0.5s">
                    {{$ui->header_title}}
                    </h1>

                    <p class="description wow soneFadeUp text-dark" data-wow-delay="0.6s">
                    {{$ui->header_body}}
                    </p>

                    <a href="{{route('register')}}" class="pxs-btn backg-btn wow soneFadeUp text-dark" data-wow-delay="0.6s">Get Started</a>
                </div>
                <!-- /.backg-content -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="promo-mockup wow soneFadeLeft">
                   
                </div>
                <!-- /.promo-mockup -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.backg-content-wrap -->
</div>
<!-- /.container -->

<div class="bg-shape bg-shape-bottom">
    <svg width="1920" height="500" viewBox="0 0 1920 500" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 378C500.193 206.37 633.5 54 1122.5 220C1611.5 386 1550.97 90.4445 1920 0V500H0V378Z" fill="white"/>
        <path class="path-back-shape" d="M446.5 273.504C354.5 274 272.5 275.504 272.5 275.504C542.689 161.595 684.5 129.5 883 159C883 159 852.5 169 826 176.504C799.5 184.009 768.913 211.198 740 227.504C701 249.5 675.329 267.561 625.5 273.504C558.972 281.439 538.5 273.009 446.5 273.504Z"/>
    </svg>
</div>
</section>

<section id="brand-logo" class="wow soneFadeUp">
    <div class="section-small text-center">
        <h2 class="title">{{$ui->s1_title}}</h2>
    </div>

    <div class="container">
        <div class="swiper-container logo-carousel" id="logo-carousel" data-perpage="5" data-breakpoints='{"1024": {"slidesPerView": 4}, "768": {"slidesPerView": 4}, "640": {"slidesPerView": 2}}'>
            <div class="swiper-wrapper">
                @foreach($brand as $brands)
                    <div class="swiper-slide">
                        <div class="brand-logo"><img src="{{url('/')}}/asset/brands/{{$brands->image}}" alt="{{$brands->title}}"></div>
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="informes">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="editure-feature-image">
                    <div class="image-one">
                        <img src="{{url('/')}}/asset/images/{{$ui->s2_image}}" class="wow soneFadeRight r10" data-wow-delay="0.3s" alt="feature-image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img-text-content">
                    <div class="section-title">
                        <span class="sub-title">{{$set->site_name}}</span>
                        <h2 class="title">
                            {{$ui->s2_title}}
                        </h2>
                        <p>
                            {{$ui->s2_body}}
                        </p>
                    </div>
                </div>
                <!-- /.img-text-content -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="shape-bg wow fadeInLeft">
        <svg width="701" height="611" viewBox="0 0 701 611" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="path-back-shape" d="M174.201 270.953C332.499 211.775 310.558 201.585 347.793 70.6846C385.028 -60.2155 522.67 13.7197 631.888 107.133C720.043 195.244 720.839 240.383 651.481 250.181C582.122 259.98 483.375 262.33 483.375 360.309C483.375 458.288 496.306 415.96 582.122 487.681C667.939 559.402 442.242 644.054 358.765 597.809C275.288 551.564 264.328 513.156 91.5193 519.818C-81.289 526.48 15.9029 330.131 174.201 270.953Z"/>
        </svg>
    </div>
</section>
<section class="informes">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-text-content">
                    <div class="section-title">
                        <span class="sub-title">Save 4 me</span>
                        <h2 class="title">
                        {{$ui->s3_title}}
                        </h2>
                        <p>
                        {{$ui->s3_body}}
                        </p>
                    </div>
                </div>
                <!-- /.img-text-content -->
            </div>
            <div class="col-lg-6">
                <div class="editure-feature-image">
                    <div class="image-one">
                        <img src="{{url('/')}}/asset/images/{{$ui->s3_image}}" class="wow soneFadeRight r10" data-wow-delay="0.3s" alt="feature-image">
                    </div>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="backg backg-four backg-dark" style="background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-8 z100">
                    <div class="backg-content">
                        <h1 class="title wow soneFadeUp" data-wow-delay="0.5s">
                        {{$ui->s4_title}}
                        </h1>
<br>
                        <p class="description wow soneFadeUp" data-wow-delay="0.6s">
                        {{$ui->s4_body}}
                        </p>
                        <div class="">
                            <a href="{{route('register')}}" class="pxs-btn backg-btn wow soneFadeUp text-dark" data-wow-delay="0.6s">Get Started</a>
                        </div>
                    </div>
                    <!-- /.backg-content -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="promo-mockup mockup-mobile wow soneFadeUp" data-wow-delay="0.6s">
                        <img class="mockup-mobile-img-1" alt="" src="{{url('./')}}/asset/images/{{$ui->s4_image}}">
                    </div>
                    <!-- /.promo-mockup -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.backg-content-wrap -->
    </div>
    <!-- /.container -->

    <div class="bg-shape bg-shape-bottom">
        <svg width="1920" height="698" viewBox="0 0 1920 698" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1081 307.5L1920 0V698H0L1081 307.5Z" fill="white"/>
        </svg>
    </div>
</section>
<section class="services-2 wow soneFadeUp" id="services">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Our services</span>
            <h2 class="title">Our capabilities</h2>
        </div>
        <!-- /.section-title -->

        <div class="row">
            @foreach($service as $services)
            <div class="col-lg-4 col-md-6">
                <div class="services-box-wrapper">
                    <div class="services-box-content">
                        <h3 class="services-box-content-title"><a href="#">{{$services->title}}</a></h3>
                        <p>{{$services->details}}</p>
                    </div>
                </div>
                <!-- /.saasone-box style-two -->
            </div>
            @endforeach
            <!-- /.col-lg-4 col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="revolutionize revolutionize-two wow soneFadeUp">
    <div class="bg-top">
        <svg width="1980" height="1048" viewBox="0 0 1980 1048" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="path-back-shape" d="M0 0C928.798 191.774 1789.23 848.231 1980 130.176V1048C1144.65 918.284 558.169 465.411 0 914.528V0Z" fill="#FFF8EE"/>
        </svg>
    </div>
    <div class="container">
        <div class="section-title text-center">
            <h3 class="sub-title">Frequent question</h3>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="section-title text-left">
                    <h5 class="title">
                    {{$ui->s5_title}}
                    </h5>

                    <p>
                    {{$ui->s5_body}}
                    </p>

                    <a href="{{route('faq')}}" class="sone-btn btn-outline">Discover More</a>
                </div>
            </div>
            <div id="accordion" class="col-lg-8 faq">
                @foreach($faq as $vfaq)
                <div class="card">
                    <div class="card-header" id="heading{{$vfaq->id}}">
                        <h5><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$vfaq->id}}" aria-expanded="false" aria-controls="collapse{{$vfaq->id}}">{{$vfaq->question}}</button></h5>
                    </div>
                    <div id="collapse{{$vfaq->id}}" class="collapse" aria-labelledby="heading{{$vfaq->id}}" data-parent="#accordion" style="">
                        <div class="card-body">
                            <p>{!! $vfaq->answer!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@if(count($posts)>0)
<section id="blog-list" class="wow soneFadeUp">
    <div class="container">
        <div class="section-title flex_center_betwen">
            <div class="title_l">
                <span class="sub-title">News & Cases</span>
                <h2 class="title">Latest posts</h2>
            </div>
            <div class="show_more_b">
                <a href="{{route('blog')}}" class="sone-btn">Read All Posts</a>
            </div>
        </div>
        <div class="row">
        @foreach($posts as $vblog)
            <div class="col-lg-4 col-md-6">
                <article class="blog-post">
                    <div class="feature-image"><a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}"><img src="{{url('/')}}/asset/thumbnails/{{$vblog->image}}" alt="blog-thumb"></a></div>
                    <div class="blog-content">
                        <ul class="post-meta">
                            <li>{{date("M j, Y", strtotime($vblog->created_at))}}</li>
                        </ul>
                        <h3 class="entry-title"><a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}">{!!  str_limit($vblog->title, 60);!!}..</a></h3>
                </article>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endif
<section class="call-to-action" style="background-image:url('{{url('/')}}/asset/images/{{$ui->s7_image}}');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 z100">
                <div class="action-content text-center">
                    <h2 class="title text-dark text-left">
                    {{$ui->s6_title}}
                    </h2>

                    <p class="text-dark text-left"> 
                    {{$ui->s6_body}}
                     </p>
                </div>
            </div>
        </div>
        <!-- /.action-content -->
    </div>
    <!-- /.container -->
</section>
<div class="pt-100"></div>
@if(count($review)>0)
<section class="testimonials-two wow soneFadeUp" id="testimonialxx">
    <div class="animation-shape">
        <img src="{{url('/')}}/asset/img/shape/shape-triangle-1.svg" alt="" class="shape-five">
        <img src="{{url('/')}}/asset/img/shape/shape-square-1.svg" alt="" class="shape-three">
        <img src="{{url('/')}}/asset/img/shape/shape-cross-1.svg" alt="" class="shape-four">
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="section-title">
                <h3 class="sub-title">Reviews</h3>
                <h2 class="title">{{$ui->s7_title}}</h2>
                <p>{{$ui->s7_body}}</p>
            </div>
        </div>
        <div class="col-lg-8">
            <div id="testimonial-wrapper">
                <div class="swiper-container" id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="2" data-space="50" data-breakpoints='{"991": {"slidesPerView": 1}}'>
                    <div class="swiper-wrapper">
                        @foreach($review as $vreview)
                            <div class="swiper-slide">
                                <div class="testimonial-two">
                                    <div class="testi-content-inner">
                                        <div class="testimonial-bio">
                                            <div class="avatar"><img src="{{url('/')}}/asset/review/{{$vreview->image_link}}" alt="testimonial"></div>
                                            <div class="bio-info">
                                                <h3 class="name">{{$vreview->name}}</h3>
                                                <span class="job">{{$vreview->occupation}}</span></div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>{{$vreview->review}}</p>
                                        </div>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endif
@stop