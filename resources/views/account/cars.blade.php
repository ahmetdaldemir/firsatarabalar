@extends('layouts.view_new')
@section('content')


    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Araçlarım</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>

    <div class="content-inner" style="background-image: url(images/background/bg1.png);padding-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 m-b30">
                    @include('account.leftmenu')
                </div>
                <div class="col-xl-9 col-lg-9 m-b30">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($cars as $car) {  if(!empty($car->default_image)){$x = json_decode($car->default_image);}   ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="icon-bx-wraper style-7 text-center m-b30">
                                        <div class="icon-media">
                                            @if(!empty($car->default_image)){
                                            <img src="{{asset('storage/cars')}}/<?php echo $x->image; ?>" alt="" style="width: 100%;    height: 250px;">
                                            @else
                                                <img src="{{asset('new_view/img/noimage.jpg')}}" alt="" style="width: 100%;    height: 250px;">
                                            @endif
                                        </div>
                                        <div class="icon-content">
                                            <div class="row">
                                                <div class="col-md-7"></div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: left"><h5 class="dlab-title">{{$car->car->name ?? "Bulunamadı" }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" style="text-align: left;font-size: 14px;  overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                    <img src="{{asset('view/icons/engine.png')}}" style="float:left;width: 20px;height: 20px;"/> {{  \App\Enums\Transmission::Transmission[$car->gear] ?? "Bulunamadı" }}
                                                </div>
                                                <div class="col-md-4" style="text-align: left;font-size: 14px;  overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                    <img src="{{asset('view/icons/fuel.png')}}" style="float:left;width: 20px;height: 20px;"/>
                                                    {{  \App\Enums\FullType::FullType[$car->fuel] ?? NULL }}
                                                </div>
                                                <div class="col-md-4" style="text-align: left;  overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                    <img src="{{asset('view/icons/calendar.png')}}" style="float:left;width: 20px;height: 20px;"/> <span style="margin-left: 10px;">{{ $car->caryear ?? "Bulunamadı" }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-t10">
                                                    <a href="car_detail?id={{$car->id}}" style="    width: 100%; padding: 10px;  color: #fff; background: #00309c;" class="btn btn-success">Detay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .icon-bx-wraper.style-7 .icon-content .dlab-title {
                margin-bottom: 15px;
                width: 350px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
@endsection