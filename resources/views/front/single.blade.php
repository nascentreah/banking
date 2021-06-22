@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="page-backg blog-details-backg">
    <div class="animation-shape">
        <img src="{{url('/')}}/asset/img/element-shape/oval-1.svg" alt="" class="oval-one">
        <img src="{{url('/')}}/asset/img/shape/shape-square-1.svg" alt="" class="shape-three">
        <img src="{{url('/')}}/asset/img/shape/shape-cross-1.svg" alt="" class="shape-four">
        <img src="{{url('/')}}/asset/img/shape/shape-square-1.svg" alt="" class="shape-eleven">
        <img src="{{url('/')}}/asset/img/shape/shape-cross-1.svg" alt="" class="shape-two">
        <img src="{{url('/')}}/asset/img/shape/shape-wave-1.svg" alt="" class="shape-six">
    </div>
    <div class="container">
        <div class="page-title-wrapper">
            <ul class="post-meta color-theme">
                <li><a href="javascript:void;">{{date("M j, Y", strtotime($post->created_at))}}</a></li>
            </ul>
            <h1 class="page-title">{{$post->title}}</h1>
            <ul class="post-meta">
                <li><span>By</span> <a href="#">Admin</a></li>
                <li><a href="cat/{{$xcat->id}}">{{$xcat->categories}}</a></li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="feature-image"><a href="javascript:void;"><img src="{{url('/')}}/asset/thumbnails/{{$post->image}}" alt=""></a></div>
                        <div class="blog-content">
                            <p>{!!$post->details!!}</p>                           
                            <div class="single-blog-bottom-content">
                                <div class="blog-share">
                                    <div class="share-title">
                                        <p>Share:</p>
                                    </div>
            @include('partials.share')
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
        <!-- NAV -->
    </div>
</section>
@stop