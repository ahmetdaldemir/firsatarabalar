@extends('layouts.view_new')

@section('content')

    <div class="slide-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="slides owl-carousel owl-theme">
                        @if($sliders)
                            @foreach ($sliders as $slider)

                                <a href="/ilan/{{$slider->id}}/{{$slider->caryear}}-{{\Illuminate\Support\Str::slug($slider->car->name)}}">
                                    <!-- figure style="background-image: url(asset('storage/cars'.$slider->default_image.''}})" -->
                                    <figure style="background-image: url({{$slider->default_image}})" >
                                        <figcaption class="d-flex justify-content-between">
                                            <div class="text-center text-secondary">
                                                <i class="fad fa-calendar-alt fw fa-3x mb-2"></i>
                                                <h4>{{$slider->caryear}}</h4>
                                                <span>Model</span>
                                            </div>
                                            <div class="text-center text-secondary">
                                                <i class="fad fa-tachometer-alt fw fa-3x mb-2"></i>
                                                <h4>{{$slider->km}}</h4>
                                                <span>KM</span>
                                            </div>
                                            <div class="text-center text-secondary">
                                                <i class="fad fa-gas-pump fw fa-3x mb-2"></i>
                                                <h4>{{\App\Enums\FullType::FullType[$slider->fuel]}}</h4>
                                                <span>Yakıt</span>
                                            </div>
                                            <div class="text-center text-secondary">
                                                <i class="fad fa-cogs fw fa-3x mb-2"></i>
                                                <h4>{{\App\Enums\Transmission::Transmission[$slider->gear]}}</h4>
                                                <span>Vites</span>
                                            </div>
                                            <div class="text-center text-secondary">
                                                <i class="fad fa-flux-capacitor fw fa-3x mb-2"></i>
                                                <h4>{{$slider->car->engine}} CC</h4>
                                                <span>Motor</span>
                                            </div>
                                        </figcaption>
                                    </figure>

                                    @if ($agent->isMobile())
                                        <div class="price-box d-flex justify-content-between align-items-center">
                                            <span>Süper<br>Fırsat Fiyatı</span>
                                            <h3>{{$slider->price}} ₺</h3>
                                        </div>

                                    @else
                                        <div class="price-box text-end">
                                            <span>Fırsat Fiyatı</span>
                                            <h3>{{$slider->price}} ₺</h3>
                                        </div>
                                    @endif

                                </a>
                            @endforeach
                        @else
                            <a href="javascript:;">
                                <figure style="background-image: url({{asset('new_view/img/no-car-slide.jpg')}}"></figure>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 ps-1 d-none d-sm-none d-lg-block">
                    <a href="javascript:;"  data-bs-toggle="vehiclerequest" data-bs-target="#vehiclerequest" class="vehiclerequest"><img src="{{asset('new_view/img/slide-banner.png')}}" alt="" style="height: 600px"></a>
                </div>
            </div>
        </div>
    </div>

    <section class="main-section last-sales mt-5">
        <div class="container">
            <div class="row justify-content-md-center mb-3">
                <div class="col-lg-8">
                    <div class="wo-sectionhead text-center">
                        <h2 style="color:#d53f3f;font-size: 24px; letter-spacing: -1px; font-weight: 600">Araç Satışlarını Kaçırma</h2>
                        <p class="fs-5">Araç Satışlarını Kaçırmamak için instagram hesabımızı takip edin. <a href="https://www.instagram.com/parababasi_firsat_arabalar/?hl=tr">instagram hesabı için tıklayın</a> .</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center mb-3">
                <div class="col-lg-8">
                    <div class="wo-sectionhead text-center">
                        <h2 style="color:#3f8ed5; letter-spacing: -1px; font-weight: 600">Satışta Olan Araçlar</h2>
                        <p class="fs-5">Kaliteli değerleme hizmetimiz ve Pro Aktif Hızlı Pazarlama stratejimiz ile bize güvenen müşterilerimizin satışlarını gerçekleştirdiğimiz bazı araçlarımız.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <?php if(!is_null($yayinlanan_araclar)){ ?>
                    <div id="sold-items" class="sold-items owl-carousel owl-theme">
                        @foreach($yayinlanan_araclar as $sold)
                            <div class="item mb-4">
                                <div class="card">
                                    <a href="{{route('car_detail',['id' => $sold['id']])}}" style="text-decoration: none">
                                        <img src="{{$sold['default_image']}}" alt="" class="card-img-top img-fluid">
                                        <p class="sale-ribbon"><span class="text"> Alıcısını Bekliyor</span></p>
                                        <div class="card-body">
                                            <p class="card-text" style="min-height: 60px;">
                                                <b>{{$sold['name']}}{{(@$sold['model']) ? " / ".@$sold['model'] : ""}}</b><br>
                                                {{$sold['name']}}
                                            </p>

                                            <div class="route d-flex justify-content-center align-items-center">
                                                <div>Şehir</div>
                                                <div class="px-3"><i class="far fa-route"></i></div>
                                                <div>İlçe</div>
                                            </div>

                                            <table class="table table-striped mb-1">
                                                <tr>
                                                    <td width="60" class="text-muted">Model</td>
                                                    <td>: {{$sold['year']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Yakıt</td>
                                                    <td>: {{$sold['fuel']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Vites</td>
                                                    <td>: {{$sold['gear']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Renk</td>
                                                    <td>: {{$sold['color']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted border-bottom-0">Kasa</td>
                                                    <td class="border-bottom-0">: {{$sold['body']}}</td>
                                                </tr>
                                            </table>
                                            <div class="saled-price d-flex justify-content-start align-items-center">
                                                <div class="left"><i class="fad fa-handshake-alt"></i></div>
                                                <div class="center">
                                                    <b>{{$sold['price']}} TL</b><br>
                                                    <small>Fiyat ile satılacak.</small>
                                                </div>
                                                <i class="fal fa-shield-check check-bg"></i>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row justify-content-md-center mb-3">
                <div class="col-lg-8">
                    <div class="wo-sectionhead text-center">
                        <h2 style="color:#3f8ed5; letter-spacing: -1px; font-weight: 600">Son Satılan Araçlar</h2>
                        <p class="fs-5">Kaliteli değerleme hizmetimiz ve Pro Aktif Hızlı Pazarlama stratejimiz ile bize güvenen müşterilerimizin satışlarını gerçekleştirdiğimiz bazı araçlarımız.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <?php if(!is_null($satilan_araclar)){ ?>
                    <div id="sold-items" class="sold-items owl-carousel owl-theme">
                        @foreach($satilan_araclar as $sold)
                            <div class="item mb-4">
                                <div class="card">
                                    <a href='{{( $sold['id'] ) ? '/ilan/'.$sold['id'].'/'.$sold['year'] : "javascript:;"}}' style="text-decoration: none">
                                        <img src="{{$sold['default_image']}}" alt="" class="card-img-top img-fluid">
                                        <p class="sale-ribbon"><span class="text"> Alıcısını Bekliyor</span></p>
                                        <div class="card-body">
                                            <p class="card-text" style="min-height: 60px;">
                                                <b>{{$sold['name']}}{{(@$sold['model']) ? " / ".@$sold['model'] : ""}}</b><br>
                                                {{$sold['name']}}
                                            </p>

                                            <div class="route d-flex justify-content-center align-items-center">
                                                <div>Şehir</div>
                                                <div class="px-3"><i class="far fa-route"></i></div>
                                                <div>İlçe</div>
                                            </div>

                                            <table class="table table-striped mb-1">
                                                <tr>
                                                    <td width="60" class="text-muted">Model</td>
                                                    <td>: {{$sold['year']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Yakıt</td>
                                                    <td>: {{$sold['fuel']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Vites</td>
                                                    <td>: {{$sold['gear']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Renk</td>
                                                    <td>: {{$sold['color']}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted border-bottom-0">Kasa</td>
                                                    <td class="border-bottom-0">: {{$sold['body']}}</td>
                                                </tr>
                                            </table>
                                            <div class="saled-price d-flex justify-content-start align-items-center">
                                                <div class="left"><i class="fad fa-handshake-alt"></i></div>
                                                <div class="center">
                                                    <b>{{$sold['price']}} TL</b><br>
                                                    <small>Fiyat ile satılacak.</small>
                                                </div>
                                                <i class="fal fa-shield-check check-bg"></i>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <?php } ?>
                </div>
            </div>


            <div class="row">
                <div class="col text-center mt-4 pt-5">
                    <a href="/satilan-araclar" class="btn wo-btn"><i class="fad fa-list-ul me-1"></i> Tüm Satılan Araçları Göster</a>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <section>
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="text-primary h6">Blog</h5>
                <h2 class="display-20 display-md-18 display-lg-16">Fırsat Arabalar sizler için araştırdı düşündü ve yazdı</h2>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-2-6">
                    <article class="card card-style2">
                        <div class="card-img">
                            <img class="rounded-top" src="{{asset('storage/files')}}/{{$blog->images}}" style="width: 100%" alt="...">
                        </div>
                        <div class="card-body">
                            <h3 class="h5"><a href="{{route('sayfalar',['slug' => $blog->slug])}}">{{$blog->title}}</a></h3>
                            <a href="{{route('sayfalar',['slug' => $blog->slug])}}" class="read-more">Devamını Oku</a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('before-css')
    <link rel="stylesheet" href="{{ asset('new_view/css/owl/owl.carousel.min.css') }}">
<style>
     .card-style2 {
    position: relative;
    display: flex;
    transition: all 300ms ease;
    border: 1px solid rgba(0, 0, 0, 0.09);
    padding: 0;
    height: 100%;
    }
    .card-style2 .card-img {
    position: relative;
    display: block;
    background: #ffffff;
    overflow: hidden;
    border-radius: 0.25rem;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }
    .card-style2 .card-img img {
    transition: all 0.3s linear 0s;
    }
    .card-style2:hover .card-img img {
    transform: scale(1.05);
    }
    .card-style2 .date {
    position: absolute;
    right: 30px;
    top: 30px;
    z-index: 1;
    color: #16bae1;
    overflow: hidden;
    padding-bottom: 10px;
    line-height: 24px;
    text-align: center;
    border: 2px solid #ededed;
    display: inline-block;
    background-color: #ffffff;
    text-transform: uppercase;
    border-radius: 0.25rem;
    }
    .card-style2 .date span {
    position: relative;
    color: #ffffff;
    font-weight: 500;
    font-size: 20px;
    display: block;
    text-align: center;
    padding: 12px;
    margin-bottom: 10px;
    background-color: #00baee;
    border-radius: 0.25rem;
    }
    .card-style2 .card-body {
    position: relative;
    display: block;
    background: #ffffff;
    padding: 2rem;
    }
    .card-style2 .card-body h3 {
    margin-bottom: 0.8rem;
    }
    .card-style2 .card-body h3 a {
    color: #004975;
    }
    .card-style2 .card-body h3 a:hover {
    color: #00baee;
    }
    .card-style2 .card-footer {
    border-top: 1px solid rgba(0, 0, 0, 0.09);
    background: transparent;
    padding-right: 2rem;
    padding-left: 2rem;
    -ms-flex-align: end;
    align-items: flex-end;
    }
    .card-style2 .card-footer ul {
    display: flex;
    justify-content: space-between;
    list-style: none;
    margin-bottom: 0;
    }
    .card-style2 .card-footer ul li {
    font-size: 15px;
    }
    .card-style2 .card-footer ul li a {
    color: #394952;
    }
    .card-style2 .card-footer ul li a:hover {
    color: #00baee;
    }
    .card-style2 .card-footer ul li i {
    color: #00baee;
    font-size: 14px;
    margin-right: 8px;
    }
</style>
@endsection

@section('body-before-js')
    <script src="{{ asset('new_view/js/owl.carousel.min.js') }}" charset="utf-8"></script>
@endsection

@section('body-after-js')
    <script type="text/javascript">
        $(function(){

            if( $('.slides').length ){
                $('.slides').owlCarousel({
                    singleItem: true,
                    items:1,
                    loop:false,
                    autoplay: false,
                    nav:true,
                    dots:false,
                    navText: ['<span><i class="fad fa-chevron-left"></i></span>', '<span><i class="fad fa-chevron-right"></i></span>'],
                    pullDrag: true,
                    touchDrag: true,
                    mouseDrag: true,
                });
            }

            if( $('.sold-items').length ){
                $('.sold-items').owlCarousel({
                    items: 4,
                    loop: false,
                    autoplay: false,
                    nav:false,
                    dots:false,
                    pullDrag: true,
                    touchDrag: true,
                    mouseDrag: true,
                    margin: 30,
                    autoplayHoverPause: true,
                    responsive:{
                        0:{ items:1, autoplay: true, },
                        600:{ items:2, autoplay: true, },
                        1000:{ items:3 },
                        1200:{ items:4 }
                    }
                });
            }
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js" class=""></script>

    <script> var app = angular.module("app", ['ngSanitize']);
        app.filter('unsafe', function ($sce) {
            return $sce.trustAsHtml;
        });
        app.directive('customOnChange', function() {
            return {
                restrict: 'A',
                link: function(scope, element, attrs) {
                    var onChangeFunc = scope.$eval(attrs.customOnChange);
                    element.unbind('change').bind('change', function(e) {
                        onChangeFunc(e);
                    });
                }
            };
        });
    </script>
    <script src="{{asset('new_view/js/angular.js')}}" class=""></script>

@endsection


<div class="modal fade wo-vehiclerequest wo-vehiclerequest" tabindex="-1" role="dialog" id="vehiclerequest" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="wo-modalcontent modal-content">
            <div class="wo-popuptitle d-flex justify-content-between align-items-center">
                <h4><i class="fad fa-edit me-1"></i> Araç Talep Et</h4>
                <a href="javascript:void(0);" class="close"><i class="fal fa-times" data-bs-dismiss="modal"></i></a>
            </div>
            <div class="modal-body">
                <form id="VehicleRequest" method="POST" ng-submit="VehicleRequest()">
                    <div class="modal-title">
                        <div ng-if="error" class="alert alert-danger">
                            <span style="display: flex">@{{ price_min_error }}</span>
                            <span style="display: flex">@{{ price_max_error }}</span>
                            <span style="display: flex">@{{ customer_id_error }}  <a href='authpage'>Üye Paneli</a></span>
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
                                        <select name="brand_id" id="onlybrand" class="form-select w-100">
                                            <option value="">Seçiniz</option>
                                            <?php foreach ($brands as $key => $value){ ?>
                                            <option value="<?=$value->id?>"><?=$value->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Model</label>
                                        <select name="model" id="onlymodel" class="form-select w-100"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Vites Tipi</label>
                                        <select name="gear_id"
                                                class="form-select w-100">
                                            <?php foreach ($transmissions as $key => $value){ ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label>Kasa Tipi</label>
                                        <select name="body_type_id"
                                                class="form-select w-100">
                                            <?php foreach ($bodytypes as $key => $value){ ?>
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
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <label>Aciliyetiniz ?</label>
                                        <select name="request_time" class="form-select w-100">
                                            <option value="1">Acil</option>
                                            <option value="2">Zamanım Var</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-dismiss="modal">İptal Et</button>
                        <button type="submit" class="btn btn-primary" id="VehicleRequestButton">Talep Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
