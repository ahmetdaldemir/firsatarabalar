@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Satılan Araçlar</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Satılan Araçlar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <section class="content my-5 pt-0">
        <div class="container">

            @if($allcars != "")
            @foreach ( $allcars as $group )
                <div class="row">
                    @foreach ( $group as $sold )
                        <div class="col-lg-3 item mb-4">
                            <div class="card">
                                <a href='{{( $sold->customers_car_id ) ? '/ilan/'.$sold->customers_car_id.'/'.$sold->year.'-'.slug($sold->version) : "javascript:;"}}'>
                                    <img src="/Uploads/{{$sold->sold_image}}" alt="" class="card-img-top img-fluid">
                                </a>
                                <p class="sale-ribbon"><span class="text"><b>{{$sold->sold_time}}</b> Satıldı</span></p>
                                <div class="card-body">
                                    <p class="card-text" style="min-height: 60px;">
                                        <b>{{$sold->brand_name}} / {{$sold->model}}</b><br>
                                        {{$sold->version}}
                                    </p>

                                    <div class="route d-flex justify-content-center align-items-center">
                                        <div>{{$sold->city_from}}</div>
                                        <div class="px-3"><i class="far fa-route"></i></div>
                                        <div>{{$sold->city_where}}</div>
                                    </div>

                                    <table class="table table-striped mb-1">
                                        <tr>
                                            <td width="60" class="text-muted">Model</td>
                                            <td>: {{$sold->year}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Yakıt</td>
                                            <td>: {{$sold->fueltype}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Vites</td>
                                            <td>: {{$sold->transmission}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Renk</td>
                                            <td>: {{$sold->sold_color}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted border-bottom-0">Kasa</td>
                                            <td class="border-bottom-0">: {{$sold->bodytype}}</td>
                                        </tr>
                                    </table>
                                    <a href='{{( $sold->customers_car_id ) ? '/ilan/'.$sold->customers_car_id.'/'.$sold->year.'-'.slug($sold->version) : "javascript:;"}}' style="text-decoration: none">
                                        <div class="saled-price d-flex justify-content-start align-items-center">
                                            <div class="left"><i class="fad fa-handshake-alt"></i></div>
                                            <div class="center">
                                                <b>{{$sold->sold_price}} TL</b><br>
                                                <small>Fiyat ile satıldı.</small>
                                            </div>
                                            <i class="fal fa-shield-check check-bg"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            @else
                <div class="row">
                    <h3>Araç Bulunamadı</h3>
                </div>
            @endif


        </div>
        </div>
@endsection
