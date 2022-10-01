@extends('layouts.view_new')
@section('content')
    <section class="main-section pt-4">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 m-lg-auto col-sm-12">
                    <div class="alert alert-warning text-center view-alert">
                        Bu fırsat aracını şu zaman kadar <b>{{$car->shows}}</b> kişi görüntüledi. &nbsp;&nbsp; Vakit kaybetmeden siz de ilgilendiğinizi bildirin ve size dönüş yapalım.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1 d-none d-lg-block d-sm-none"></div>
                <div class="col-lg-7 col-sm-12 pb-3 pe-2">

                    <div id="sync1" class="car-image slides owl-carousel">
                        @foreach ($car->photo as $photo)
                            <img src="{{asset('storage/cars/')}}{{$photo->image}}" alt="" class="img-fluid rounded">
                        @endforeach
                    </div>

                    <div id="sync2" class="photos-carousel owl-carousel mt-3">
                        @foreach ( $car->photo as $photo)
                            <a href="#">
                                <img src="{{asset('storage/cars/')}}{{$photo->image}}" alt="" class="img-fluid rounded">
                            </a>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-3 col-sm-12 ps-2" style="position: relative;">

                    <div class="car-price bg-warning text-white p-3 px-4 rounded mb-3 lead text-end d-flex justify-content-between align-items-center">
                        <i class="fal fa-stars"></i>
                        Fırsat Fiyatı
                        <h2 class="m-0">{{@$car->price}} ₺</h2>
                    </div>

                    <div class="card car-sidebar border-secondary mb-3">
                        <h6 class="card-header bg-secondary text-white py-3 font-weight-bold">Araç Bilgileri</h6>
                        <table class="table table-striped table-borderless mb-0 car-details" style="height: 420px">
                            <tr>
                                <td colspan="2">{{$car->car->brand->name??"Bulunamadı"}} - {{$car->car->model??"Bulunamadı"}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">{{str_replace($car->car->model??"Bulunamadı"." ", "", $car->car->brand->name??"Bulunamadı") }}</td>
                            </tr>
                            <tr>
                                <td>Araç KM</td>
                                <td class="text-end"><b>{{$car->km??"Bulunamadı"}} KM</b></td>
                            </tr>
                            <tr>
                                <td>Araç Yılı</td>
                                <td class="text-end">{{$car->caryear??"Bulunamadı"}}</td>
                            </tr>
                            <tr>
                                <td>Kasa Tipi</td>
                                <td class="text-end">{{$car->body??"Bulunamadı"}}</td>
                            </tr>
                            <tr>
                                <td>Vites</td>
                                <td class="text-end">{{$car->gear??"Bulunamadı"}}</td>
                            </tr>
                            <tr>
                                <td>Motor Gücü</td>
                                <td class="text-end">{{@$car->car->horse??"Bulunamadı"}} Hp</td>
                            </tr>
                            <tr>
                                <td>Motor Hacmi</td>
                                <td class="text-end">{{@$car->car->engine??"Bulunamadı"}}cc</td>
                            </tr>
                            <tr>
                                <td>Yakıt</td>
                                <td class="text-end">{{$car->fuel??"Bulunamadı"}}</td>
                            </tr>
                            <tr>
                                <td>Tramer Kaydı</td>
                                <td class="text-end">{{ ( !$car->tramerValue) ? 0 : $car->tramerValue}} ₺</td>
                            </tr>
                        </table>
                    </div>

                     @if(!$customer_car_buy)
                    @if($car->specs == "has_showcase")
                        <div class="vstack gap-2">
                            <button ng-click="CustomerCarBuy({{$car->id}})"  id="pay" type="button" class="d-flex justify-content-between align-items-center">
                                <div class="center">
                                    <div class="notranslate">Bu araç ile ilgileniyorum</div>
                                    <small>Hızlıca teklifinizi gönderin</small>
                                </div>
                                <div class="right d-flex justify-content-between align-items-center"><i class="fad fa-angle-right fa-2x"></i></div>
                            </button>
                        </div>
                    @endif
                    @else
                    <div>
                        <div class="vstack gap-2">
                            <button  type="button" class="btn btn-warning d-flex justify-content-between align-items-center">
                                <div class="center">
                                    <div class="notranslate">Daha Önce Teklif Verdiniz</div>
                                </div>
                                <div class="right d-flex justify-content-between align-items-center"><i class="fad fa-angle-right fa-2x"></i></div>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 m-lg-auto col-sm-12">

                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Boya &amp; Değişen &amp; İşlem Durumu</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-0">
                                    <div class="car-damage-wrapper border-0 bg-transparent">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                @if(gettype($car->damage) == "object")
                                                <div class="damage-area mt-0 pt-0">
                                                    <div class="car-parts">
                                                        @foreach (@$car->damage as $key => $value)
                                                            @continue( substr($key, 0, 5) == "islem" )
                                                            <div class="{{$key}} {{$value}}"></div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="color-desc mt-4">
                                                    <div class="form-check form-check-inline original">
                                                        <input class="form-check-input" type="radio" checked>
                                                        <label class="form-check-label">Orjinal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline painted">
                                                        <input class="form-check-input" type="radio" checked>
                                                        <label class="form-check-label">Boyalı</label>
                                                    </div>
                                                    <div class="form-check form-check-inline paintedlocal">
                                                        <input class="form-check-input" type="radio" checked>
                                                        <label class="form-check-label">Lokal Boyalı</label>
                                                    </div>
                                                    <div class="form-check form-check-inline changed">
                                                        <input class="form-check-input" type="radio" checked>
                                                        <label class="form-check-label">Değişen</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <table class="islem-table table table-bordered table-striped mb-0" style="height: 438px">
                                                    <tr>
                                                        <td>Aracın <u><b>şasesinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_frame == "Yok" ) ? "<span class='text-success'>".$car->status_frame."</span>" : $car->status_frame!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>direklerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_pole == "Yok" ) ? "<span class='text-success'>".$car->status_pole."</span>" : $car->status_pole!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>podyelerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_podium == "Yok" ) ? "<span class='text-success'>".$car->status_podium."</span>" : $car->status_podium!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi satışa engel bir durumu var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_unrealizable == "Hayır" ) ? "<span class='text-success'>".$car->status_unrealizable."</span>" : $car->status_unrealizable!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>Ön, Arka Panel ve Bagaj Havuzu'nda</b></u> işlem/değişim var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_onArkaBagaj == "Hayır" ) ? "<span class='text-success'>".$car->status_onArkaBagaj."</span>" : $car->status_onArkaBagaj!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>hava yastıklarında</b></u> işlem/kusur/değişim var mı?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_airbag == "Yok" ) ? "<span class='text-success'>".$car->status_airbag."</span>" : $car->status_airbag!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi?</td>
                                                        <td width="120" class="text-center">{!!( $car->status_km == "Evet" ) ? "<span class='text-success'>".$car->status_km."</span>" : $car->status_km!!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl?</td>
                                                        <td width="120" class="text-center">{{$car->status_tyre}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ( $car->exper )
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingZero">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">Exper Raporu</button>
                                </h2>
                                <div id="collapseZero" class="accordion-collapse collapse show" aria-labelledby="headingZero" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pb-2">
                                        <div class="row">
                                            @foreach ($car->exper as $expert)
                                                <div class="col-2 mb-3">
                                                    <a href="{{asset('storage/expers/')}}{{$expert->image}}" style="background-image: url({{asset('storage/expers/')}}{{$expert->image}})" class="expert-item expert-gallery">
                                                        <i class="fad fa-search"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Araç Özel Bilgileri</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_details">Aracın Ekstraları</label>
                                        <textarea name="car_details" id="car_details" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly>{{@$car->description}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_notwork">Aracınızda çalışmayan aksamları</label>
                                        <textarea name="car_notwork" id="car_notwork" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly>{{@$car->car_notwork}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_exterior_faults">Aracınızın dış kozmetik kusurları</label>
                                        <textarea name="car_exterior_faults" id="car_exterior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly>{{@$car->car_exterior_faults}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_interior_faults">Aracınızın iç kozmetik kusurları</label>
                                        <textarea name="car_interior_faults" id="car_interior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly>{{@$car->car_interior_faults}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <strong>Aracın Bakım Geçmişi</strong>
                                        <textarea name="bakim_gecmisi" id="bakim_gecmisi" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly>{{@$car->bakim_gecmisi}}</textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-6 form-group">
                                            <label for="sahip">Kaçıncı Sahibi</label>
                                            <input type="text" class="detail form-control" value="{{$car->ownorder}}" readonly>
                                        </div>
                                        <div class="d-block d-lg-none" style="height: 10px"></div>
                                        <div class="col-lg-3 col-6">
                                            <label for="car_city">Aracın Bulunduğu İl</label>
                                            <input type="text" class="detail form-control" value="{{$car->car_city}}" readonly>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <label for="car_state">Aracın Bulunduğu İlçe</label>
                                            <input type="text" class="detail form-control" value="{{$car->car_state}}" readonly>
                                        </div>
                                        <div class="d-block d-lg-none" style="height: 10px"></div>
                                        <div class="col-lg-3 col-12">
                                            <label for="car_mahalle">Aracın Bulunduğu Mahalle</label>
                                            <input type="text" class="detail form-control" value="{{( !$car->car_mahalle ) ? "" : $car->car_mahalle}}" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="Teklif" tabindex="-1" aria-labelledby="TeklifLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TeklifLabel">Bu Araç ile İlgileniyorum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="InterestForm" action="#">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="interest-name" class="mb-1">İsminiz <span class="text-danger">*</span></label>
                                    <input type="text" name="interest-name" id="interest-name" class="form-control form-control-sm" placeholder="İsminizi yazın..." required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="interest-phone" class="mb-1">Cep Telefonu No. <span class="text-danger">*</span></label>
                                    <input type="text" name="interest-phone" id="interest-phone" class="form-control form-control-sm" placeholder="+90 (XXX) XXX XX XX" required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="interest-email" class="mb-1">E-Posta Adresiniz <span class="text-danger">*</span></label>
                                    <input type="email" name="interest-email" id="interest-email" class="form-control form-control-sm" placeholder="eposta@adresiniz.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="interest-message" class="mb-1">İletmek İstedikleriniz <span class="text-danger">*</span></label>
                                <textarea name="interest-message" id="interest-message" cols="30" rows="5" class="form-control form-control-sm" placeholder="Araç ile ilgilendiğinizi bildirin..." required></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fad fa-long-arrow-right me-1"></i> Gönder</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fad fa-times me-1"></i> Kapat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <style media="screen">

        .islem-table td {
            vertical-align: middle;
        }

        .detail.form-control {
            font-size: 13px;
            background-color: #fafafa !important;
            border-color: #ebebf0
        }

        .view-alert {
            font-size: 16px
        }

        .car-details td {
            padding: 8px 14px;
            vertical-align: middle;
        }

        .car-details td:first-child {
            color: #666
        }

        .car-price {
            overflow: hidden;
            position: relative;
            background-color: #1a54b2 !important;
            border-radius: 5px !important
        }

        .car-price h2 {
            font-weight: 900;
        }

        .car-price .fa-stars {
            font-size: 90px;
            position: absolute;
            left: -10px;
            opacity: .10;
            transform: rotate(340deg);
        }

        .car-image img {
            border-radius: 5px !important
        }

        #pay {
            box-sizing: border-box;
            height: 90px;
            border: none;
            border-radius: 0.31em;
            background-color: #0ab285;
            color: #fff;
        }

        #pay .left {
            padding-top:18px;
            padding-bottom:18px;
            padding-left:18px;
        }

        #pay .right {
            height: inherit;
            padding-top:18px;
            padding-bottom:18px;
            padding-left:14px;
            padding-right: 12px;
            background-color: #1d9a78;
            border-top-right-radius: 0.31em;
            border-bottom-right-radius: 0.31em;
        }

        #pay .fa-2x {
            font-size: 3em;
        }

        #pay .center {
            padding-left: 23px;
            text-align: left
        }

        #pay .center .notranslate {
            font-size: 20px;
            line-height: 1
        }

        #pay .center small {
            font-size: 1em !important;
            font-weight: 100
        }

        .expert-item {
            display: block;
            width: 100%;
            height: 120px;
            border-radius: 5px;
            background-size: cover;
            background-repeat: no-repeat;
            box-sizing: border-box;
            font-size: 30px;
            color: #fff;
            text-align: center;
            padding-top: 40px
        }

    </style>

@endsection

@section('before-css')
    <link rel="stylesheet" href="{{asset('new_view/css/car-damage.css')}}">
    <link rel="stylesheet" href="{{asset('new_view/css/owl/owl.carousel.min.css')}}">
@endsection

@section('body-before-js')
    <script src="{{asset('new_view/js/owl.carousel.min.js')}}" charset="utf-8"></script>
@endsection

@section('body-after-js')
    <script type="text/javascript">

        $(function(){

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 6; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 100,
                navText: ['<span><i class="fad fa-chevron-left"></i></span>', '<span><i class="fad fa-chevron-right"></i></span>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    margin:10,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 50
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }

                if (current > count) {
                    current = 0;
                }

                //end block

                sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");

                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });

            $("#InterestForm").on("submit", function(e){

                e.preventDefault();

                var fd = new FormData();
                $.each( $("#InterestForm").serializeObject(), function( key, value ){ fd.append( key, value); });

                $.ajax({
                    url : '/ilan/{{$car->id}}/interest',
                    type : 'POST',
                    data : fd,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success : function(r){
                        if( r.status == "success" ){
                            $("#Teklif .modal-footer").append("<div class='text-success'>Teklifinizi aldık. En kısa sürede sizinle iletişime geçeceğiz.</div>");
                            $("#InterestForm")[0].reset();
                            setTimeout(function(){
                                $("#Teklif").modal("hide");
                                $("#Teklif .modal-footer .text-success").remove();
                            }, 2000);

                        }
                    }
                });

            });

            // Experts Galery
            $('a.expert-gallery').colorbox({
                rel:'gal',
                maxWidth: 800,
                maxHeight: 800,
            });

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
