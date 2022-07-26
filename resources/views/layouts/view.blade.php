<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content="DexignZone"/>
    <meta name="robots" content=""/>
    <meta name="description" content="Samar - Creative Agency Bootstrap HTML Template"/>
    <meta property="og:title" content="Samar - Creative Agency Bootstrap HTML Template"/>
    <meta property="og:description"
          content="Samar - Creative Agency Bootstrap HTML Template is particularly designed for agency, business, corporate agency, creative, professional, digital agency Business Template"/>
    <meta property="og:image" content="https://samar.dexignzone.com/xhtml/social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>Samar - Creative Agency Bootstrap HTML Template</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('view/images/favicon.png')}}">

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