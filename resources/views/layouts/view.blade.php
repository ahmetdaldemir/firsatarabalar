<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content="Ahmet DALDEMİR - 05468038003"/>
    <meta name="robots" content=""/>
    <meta name="description" content="{{setting('meta_description')}}"/>
    <meta property="og:title" content="{{setting('meta_title')}}"/>
    <meta property="og:description" content="{{setting('meta_description')}}"/>
    <meta property="og:image" content="{{asset('storage/app/files/'.setting('theme'))}}"/>
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>{{setting('meta_title')}}</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('storage/app/files/'.setting('favicon'))}}">

    <!-- Stylesheet -->
    @include('layouts/custom/style')


</head>
<body id="bg">
<div id="loading-area" class="loading-01"></div>
<div class="page-wraper">
    @include('layouts/custom/header')
    <div class="page-content bg-white">
        @yield('content')
    </div>
    @include('layouts/custom/footer')
    <button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
@include('layouts/custom/script')
</body>
</html>