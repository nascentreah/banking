<!doctype html>
<html class="no-js" lang="en">
<head>
    <base href="{{url('/')}}"/>
    <title>{{ $title }} | {{$set->site_name}}</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
    <meta name="application-name" content="{{$set->site_name}}"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="description" content="{{$set->site_desc}}"/>
    <link rel="shortcut icon" href="{{url('/')}}/asset/{{ $logo->image_link }}"/>
    <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{ $logo->image_link }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
{{--    @yield('css')--}}
</head>
<!-- header begin-->
<body class="h-100">
<div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Required vendors -->
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>

</html>
