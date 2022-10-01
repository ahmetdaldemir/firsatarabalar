@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>{{$pages->title}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$pages->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content-inner about-wraper-1"
             style="background-image: url(images/background/bg15.png); background-size: contain; background-position: center right; background-repeat: no-repeat;margin: 30px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="section-head style-1">
                        {!! $pages->content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection