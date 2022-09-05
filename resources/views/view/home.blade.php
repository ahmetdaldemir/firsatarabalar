@extends('layouts.view')
@section('content')

    <div class="modal fade" id="VehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" style="    z-index: 99999;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Araç Talep Et</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="VehicleRequest" method="POST" ng-submit="VehicleRequest()">
                    <div class="modal-title">
                        <div ng-if="error" class="alert alert-danger">
                            <span style="display: flex">@{{ brand_id_error }}</span>
                            <span style="display: flex">@{{ customer_id_error }}</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->id()}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Marka</label>
                                        <select name="brand_id" ng-change="GetVersionOnlyCar(brands)" ng-model="brands"
                                                id="getModelValue" class="form-select w-100">
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}" my-directive>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Araç</label>
                                        <select name="version" id="version" class="form-select  w-100">
                                            <option ng-repeat="version in versionList" value="@{{version.name}}">
                                                @{{version.name}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Vites Tipi</label>
                                        <select name="gear_id" id="body_type_id"
                                                class="form-select w-100">
                                            <?php foreach ($transmissions as $key => $value){ ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Hasar Durumu</label>
                                        <select name="damage_id" id="damage_id"
                                                class="form-select w-100">
                                            <?php foreach ($tramers as $key => $value){ ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Kasa Tipi</label>
                                        <select name="body_type_id" id="body_type_id"
                                                class="form-select w-100">
                                            <?php foreach ($bodytypes as $key => $value){ ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Yakıt Tipi</label>
                                        <select name="body_type_id" id="body_type_id"
                                                class="form-select w-100">
                                            <?php foreach ($fueltypes as $key => $value){ ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Fiyat Aralığı</label>
                                    <div class="input-group">
                                        <input class="form-control" name="price_min"
                                               placeholder="0.00"/>
                                        <input class="form-control" name="price_max"
                                               placeholder="1.000.000"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Mesajınız</label>
                                    <div class="input-group" style="margin-bottom: 0;">
                                            <textarea name="message" cols="5" class="form-control"
                                                      placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                     </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal Et</button>
                <button type="submit" class="btn btn-primary" id="VehicleRequestButton">Talep Gönder</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="banner-one" style="background-image: url({{asset('view/images/main-slider/slider1/pic2.png')}});">
        <div class="container">
            <div class="banner-inner">
                <div class="img1"><img src="{{asset('view/images/main-slider/slider1/pic3.png')}}" alt=""></div>
                <div class="img2"><img src="{{asset('view/images/main-slider/slider1/pic4.png')}}" alt=""></div>
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="banner-content">
                            <h2 data-wow-duration="1.2s" data-wow-delay="1s" class="wow fadeInUp">AİLENE EN UYGUN ARACI
                                SANİYELER İÇİNDE BUL</h2>
                            <p data-wow-duration="1.4s" data-wow-delay="1.5s" class="wow fadeInUp m-b30 text-white">
                                Aramış olduğunuz kriterlere uygun aracı portföyümüzdeki araçlar ile karşılaştırıp size
                                sunuyoruz</p>
                            <a data-wow-duration="1.6s" data-wow-delay="2s" class="wow fadeInUp btn btn-primary"
                               href="javascript:;" ng-click="VehicleModal()">ARAÇ AL<i
                                        class="fa fa-angle-right m-l10"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="dz-media move-box wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.8s">
                            <img class="move-1" src="{{asset('view/images/main-slider/slider1/pic5.png')}}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="content-inner-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <a href="{{route('form1')}}">

                        <div class="icon-bx-wraper style-1 box-hover text-center m-b30"
                             style="display: table;height: 230px;  margin-bottom: 15px;background-size: cover;background-image: url('{{asset('view/images/banner/aracini-en-iyi-fiyata-sat.jpg')}}')">
                            <div class="icon-content" style="display: table-cell;    vertical-align: middle;">
                                <h4 class="dlab-title text-white shadow">ARACINI EN İYİ FİYATA HEMEN SAT</h4>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="icon-bx-wraper style-1 box-hover text-center m-b30"
                         style="display: table;height: 230px;background-size: cover;background-image: url('{{asset('view/images/banner/ihale-araclari-cok-yakinda.jpg')}}')">
                        <div class="icon-content" style="display: table-cell;    vertical-align: middle;">
                            <h4 class="dlab-title text-white shadow">İHALE ARAÇLARI ÇOK YAKINDA</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 wow fadeInUp">
                    <a href="javascript:;" ng-click="VehicleModal()">
                        <div class="icon-bx-wraper style-1 box-hover text-center m-b30"
                             style="display: table;height: 230px;background-size: cover;background-image: url('{{asset('view/images/banner/aradigim-arac-gelince-haber-ver.webp')}}')">
                            <div class="icon-content" style="display: table-cell;    vertical-align: middle;">
                                <h4 class="dlab-title text-white shadow">ARADIĞIM ARAÇ GELİNCE HABER VER</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects -->
    <section class="content-inner-1">
        <div class="container-fluid">
            <div class="section-head style-1 text-center mb-3">
                <h3 class="title">ARAÇLAR</h3>
            </div>
            <div class="site-filters style-1 clearfix center mb-5">
                <ul class="filters" data-bs-toggle="buttons">
                    <li data-filter=".web_development" class="btn active">
                        <input type="radio">
                        <a ng-click="GetCar(5)" href="javascript:void(0);">Satılan Araçlar</a>
                    </li>
                    <li data-filter=".branding" class="btn">
                        <input type="radio">
                        <a ng-click="GetCar(4)" href="javascript:void(0);">Gelecek Araçlar</a>
                    </li>
                </ul>
            </div>
            <div class="container" ng-init="GetCar(5)">
                <ul id="masonry" class="row lightgallery h-auto">
                    <li ng-repeat="car in carList"
                        class="card-container col-lg-3 col-md-6 col-sm-6 web_design wow fadeInUp"
                        data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="icon-bx-wraper style-7 text-center m-b30">
                                <div class="icon-media">
                                    <a href="car_detail?id=@{{car.id}}">
                                        <img src="{{asset('storage/files')}}/@{{ car.default_image }}" alt="">
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div class="col-md-7"></div>
                                    </div>
                                    <a href="car_detail?id=@{{car.id}}">
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left"><h5 class="dlab-title">
                                                    @{{car.name }}</h5></div>
                                            <div class="col-md-6" style="text-align: left"><img
                                                        src="{{asset('view/icons/calendar.png')}}"
                                                        style="float:left;width: 20px;height: 20px;"/> @{{ car.year }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left;font-size: 14px;"><img
                                                        src="{{asset('view/icons/engine.png')}}"
                                                        style="float:left;width: 20px;height: 20px;"/> @{{ car.gear }}
                                            </div>
                                            <div class="col-md-6" style="text-align: left;font-size: 14px;"><img
                                                        src="{{asset('view/icons/fuel.png')}}"
                                                        style="float:left;width: 20px;height: 20px;"/> @{{ car.fuel }}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="row">
                                        <div class="col-md-12 m-t10" ng-if="car.type == 4">
                                            <button ng-if="car.follow == 0" type="button"
                                                    ng-click="CustomerCarFollow(car.type,car.id)"
                                                    style="    width: 100%; padding: 10px;  color: #fff; background: #00309c;"
                                                    class="btn btn-success">Takibe Al
                                                <i class="fas fa-check-circle"
                                                   style="    float: left;font-size: 19px;"></i>
                                            </button>
                                            <button ng-if="car.follow == 1" type="button"
                                                    ng-click="CustomerCarUnFollow(car.type,car.id)"
                                                    style="    width: 100%; padding: 10px;  color: #fff; background: #00309c;"
                                                    class="btn btn-success">Listeden Çıkart
                                                <i class="fas fa-check-circle"
                                                   style="    float: left;font-size: 19px;"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-12 m-t10" ng-if="car.type == 5">
                                            <button ng-if="car.follow == 1" type="button"
                                                    ng-click="CustomerCarBuy(car.id)"
                                                    style="    width: 100%; padding: 10px;  color: #fff; background: #00309c;"
                                                    class="btn btn-success">Aldım
                                            </button>
                                            <a ng-if="car.follow == 0" href="car_detail?id=@{{car.id}}"
                                               style="    width: 100%; padding: 10px;  color: #fff; background: #00309c;"
                                               class="btn btn-success">İncele</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <style>
        .shadow {
            position: relative;
            font-size: 21px;
            font-weight: bold;
            text-align: center;
            perspective: 50px;
            perspective-origin: 50% 100%;
            display: inline-block;
        }

        .shadow::after {
            content: 'Fırsat Arabalar';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transform: scaleY(0.5) rotateX(-15deg);
            transform-origin: 50% 100%;
            opacity: .3;
        }
    </style>
    <div class="clearfix"></div>
    <section style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%;">
        <div class="content-inner-2">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h2 class="title">Nasıl Çalışır</h2>
                </div>

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                            <div class="dlab-media cf-r-img d-lg-block d-none">
                                <img src="{{asset('view/images/main-slider/slider1/pic1.png')}}" class="move-2"
                                     style="    width: 66%;" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="section-wraper-one">
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-red">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <img src="{{asset('view/images/icon/car_add.jpeg')}}"/>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">Aracını Ekle</h4>
                                    </div>
                                </div>
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-yellow">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <img src="{{asset('view/images/icon/fast_valuation.jpeg')}}"/>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">Değerleme Sonucunu Onayla</h4>
                                    </div>
                                </div>
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-green">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <img src="{{asset('view/images/icon/confirm.jpeg')}}"/>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">24 Saat İçerisinde Satalım</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <section>
        <div class="content-inner-2">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h6 class="sub-title">Aracını satmayımı düşünüyorsun <br> Sizin için daha hızlı ve kolayca araç
                        değerleme hizmeti sunuyoruz. </h6>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                            <div class="icon-bx-md radius bg-yellow shadow-yellow">
                                <a href="javascript:void(0);" class="icon-cell">
                                    <img style="filter: brightness(0) invert(1);"
                                         src="{{asset('view/images/icon/padlock.png')}}"/>
                                </a>
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title">Güvenilir</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="icon-bx-wraper style-1 box-hover active text-center m-b30">
                            <div class="icon-bx-md radius bg-red shadow-red">
                                <a href="javascript:void(0);" class="icon-cell">
                                    <img style="filter: brightness(0) invert(1);"
                                         src="{{asset('view/images/icon/valuation.png')}}"/>
                                </a>
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title">Değerinde Değerleme</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 wow fadeInUp" data-wow-duration="2s"
                         data-wow-delay="0.6s">
                        <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                            <div class="icon-bx-md radius bg-green shadow-green">
                                <a href="javascript:void(0);" class="icon-cell">
                                    <img style="filter: brightness(0) invert(1);"
                                         src="{{asset('view/images/icon/balance.png')}}"/>
                                </a>
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title">Parasının Karşılığı</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team -->
    <!-- section class="content-inner-1 bgl-primary">
        <div class="container">
            <div class="section-head style-1 text-center">
                <h3 class="title">Aradığın Araca Saniyeler içinde ulaş</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row align-items-center about-wraper-2">
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-idea"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Idea &amp; Analysis</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-vector"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Designing</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-vector"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">SEO Marketing</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn d-lg-block d-none" data-wow-duration="2s"
                                 data-wow-delay="0.2s"
                                 style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: zoomIn;">
                                <div class="dz-media text-center m-b30 scale1">
                                    <img src="images/about/img7.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-coding"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Development</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-rocket"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Lunching</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-rocket"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Research</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section -->

    @if(!empty($reviews))
        <!-- Testimonials -->
        <section class="content-inner bgl-primary">
            <div class="container">
                <div class="row testimonials-wraper-1 align-items-center">
                    <div class="col-lg-12">
                        <div class="testimonials-carousel1 owl-carousel owl-theme owl-btn-2 owl-btn-white owl-btn-shadow owl-btn-center">
                            <?php foreach ($reviews as $review){ ?>
                            <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                <div class="testimonial-1" style="height: 138px">
                                    <div class="testimonial-text">
                                        <?php echo word_abbreviation($review->content, 75); ?>
                                    </div>
                                    <div class="testimonial-detail">
                                        <div class="clearfix">
                                            <strong class="testimonial-name"> <?=$review->firstname?>   <?=$review->lastname?></strong>
                                            <span class="testimonial-position"> <?=$review->job?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blogs))
        <!-- Blog -->
        <section class="content-inner-2"
                 style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%; background-position:center; background-repeat:no-repeat;">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h3 class="sub-title">BLOG</h3>
                </div>
                <div class="blog-carousel1 owl-carousel owl-theme owl-btn-1 owl-btn-center-lr owl-dots-none owl-btn-primary">
                    <?php foreach ($blogs as $blog){ ?>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="dlab-blog style-1 bg-white">
                            <div class="dlab-media" style="width: 370px;height: 208px">
                                <a href="{{route('blog',['slug'=>$blog->slug])}}"> <img
                                            src="{{asset('storage/files/')}}/{{$blog->images}}" alt=""></a>
                            </div>
                            <div class="dlab-info">
                                <h5 class="dlab-title"
                                    style="    width: 324px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                    <a href="{{route('blog',['slug'=>$blog->slug])}}">{{$blog->title}}</a>
                                </h5>
                                <p class="m-b0">Detaylı bilgi için okuyunuz.</p>
                                <div class="dlab-meta meta-bottom">
                                    <ul>
                                        <li class="post-date"><i
                                                    class="flaticon-clock m-r10"></i>{{date('d-m-Y',strtotime($blog->created_at))}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    @endif

    <section class="overlay-secondary-middle bg-img-fix"
             style="background-image: url({{asset('view/images/background/bg5.jpg')}}); background-size: cover;">
        <div class="container">
            <div class="row action-box style-1  align-items-center">

            </div>
        </div>
    </section>



@endsection