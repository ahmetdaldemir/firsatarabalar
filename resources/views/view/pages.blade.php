@extends('layouts.view')
@section('content')

    <div class="dlab-bnr-inr overlay-gradient-dark text-center" style="background-image: url(images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1>{{$pages->title}}</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$pages->title}}</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- About us -->
    <section class="content-inner about-wraper-1" style="background-image: url(images/background/bg15.png); background-size: contain; background-position: center right; background-repeat: no-repeat;">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="section-head style-1">
                        <h6 class="sub-title text-primary m-b15">{{$pages->title}}</h6>
                        <h2 class="title m-b20">{{$pages->meta_description}}</h2>
                        {!! $pages->content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection