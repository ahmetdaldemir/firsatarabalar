@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/damage.css')}}">

    <div class="dlab-bnr-inr overlay-gradient-dark text-center"
         style="background-image: url({{asset('view/images/banner/bnr2.png')}});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h3 style="color:#fff;">{{$car->car->brand_name}} {{$car->car->model}}</h3>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Araç Detayı</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <section class="content-inner"
             style="background-image: url(images/background/bg18.png); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="dlab-team style-3 mb-5">
                        <div class="dlab-media rounded-md shadow "  id="lightgallery">
                            <div class="post-carousel owl-carousel owl-theme owl owl-btn-center-lr owl-btn-2">
                                @if(!is_null($car->default_image))
                                    <div class="item"> <img src="{{asset('storage/files')}}/{{$car->default_image}}"
                                                            alt="image"/></div>
                                @else
                                    <div class="item"><img style="height: 400px" src="{{asset('view/images/banner/pic2.jpg')}}"
                                                           alt="image"/></div>
                                @endif
                                <?php foreach ($car->photo as $image){ ?>
                                    <div class="item lightgallery"><a href="{{asset('storage/files')}}/{{$image->image}}"><img class="rounded-sm" src="{{asset('storage/files')}}/{{$image->image}}" alt=""></a></div>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="section-head style-1">
                        <h5 class="title m-b20">{{$car->car->name}}</h5>
                    </div>
                    <div class="section-head style-1">
                        <div class="car-price bg-warning text-white p-3 px-4 rounded mb-3 lead text-end d-flex justify-content-between align-items-center">
                            <i class="fas fa-stars"></i>
                            Fırsat Fiyatı
                            <h3 class="m-0">{{($car->price == 0) ? $car->price."TL" :"Açıklanmadı" }}</h3>
                        </div>
                    </div>




                    <div class="about-media">
                        <div class="dz-content">
                            <div class="row media-portion">

                                <div class="col-md-6">
                                    <div class="icon-bx-wraper style-6 left p-0 m-b30 icon-up">
                                        <div class="icon-bx-sm bg-white">
                                            <a href="javascript:void(0);" class="icon-cell text-primary">
                                                <img src="{{asset('view/icons/calendar.png')}}" />
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-title m-b10 lh-lg">{{$car->caryear}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="icon-bx-wraper style-6 left p-0 m-b30 icon-up">
                                        <div class="icon-bx-sm bg-white">
                                            <a href="javascript:void(0);" class="icon-cell text-primary">
                                                <img src="{{asset('view/icons/speed.png')}}" />
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-title m-b10 lh-lg">{{$car->km}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="icon-bx-wraper style-6 left p-0 m-b30 icon-up">
                                        <div class="icon-bx-sm bg-white">
                                            <a href="javascript:void(0);" class="icon-cell text-primary">
                                                <img src="{{asset('view/icons/manual-transmission.png')}}" />
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-title m-b10 lh-lg">{{\App\Enums\Transmission::Transmission[$car->gear]}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="icon-bx-wraper style-6 left p-0 m-b30 icon-up">
                                        <div class="icon-bx-sm bg-white">
                                            <a href="javascript:void(0);" class="icon-cell text-primary">
                                                <img src="{{asset('view/icons/chassis.png')}}" />
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-title m-b10 lh-lg">{{\App\Enums\BodyType::BodyType[$car->body]}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {!! $car->description !!}
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="details-tabs">
                        <ul class="nav nav-tabs m-b40" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Skills-tab" data-bs-toggle="tab"
                                        data-bs-target="#Skills" type="button" role="tab" aria-controls="Skills"
                                        aria-selected="true">Boya & Değişen Durumu
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Biography-tab" data-bs-toggle="tab"
                                        data-bs-target="#Biography" type="button" role="tab" aria-controls="Biography"
                                        aria-selected="false">Tramer Bilgileri
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Send-message-tab" data-bs-toggle="tab"
                                        data-bs-target="#Send-message" type="button" role="tab"
                                        aria-controls="Send-message" aria-selected="false">Araç Bakım Bilgileri
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Skills" role="tabpanel"
                                 aria-labelledby="Skills-tab">
                                <div class="wpb_wrapper">
                                    <div class="car-damage-wrapper border-0 bg-transparent">


                                        <div class="row">
                                            <div class="col-lg-6 text-center">
                                                @if($car->damage)
                                                <div class="damage-area mt-0 pt-0">
                                                    <div class="car-parts">
                                                        @foreach ($car->damage as $key => $value)
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
                                            <div class="col-lg-6">

                                                <table class="islem-table table table-bordered table-striped mb-0"
                                                       style="height: 438px">
                                                    <tbody>
                                                    <tr>
                                                        <td>Aracın <u><b>şasesinde</b></u> işlem/ekleme/düzeltme var mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_frame == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>direklerinde</b></u> işlem/ekleme/düzeltme var
                                                            mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_pole == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>podyelerinde</b></u> işlem/ekleme/düzeltme var
                                                            mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_podium == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi
                                                            satışa engel bir durumu var mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_unrealizable == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>Ön, Arka Panel ve Bagaj Havuzu'nda</b></u>
                                                            işlem/değişim var mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_onArkaBagaj == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>hava yastıklarında</b></u> işlem/kusur/değişim
                                                            var mı?
                                                        </td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_airbag == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi?</td>
                                                        <td width="120" class="text-center"><span
                                                                    class="text-success">{{($car->status_km == 1) ? "Var":"Yok"}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl?</td>
                                                        <td width="120"
                                                            class="text-center">{{ ($car->status_tyre == 1) ? "Kötü" : ($car->status_tyre == 2 ? "Orta" : "İyi") }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Biography" role="tabpanel" aria-labelledby="Biography-tab">
                                <div class="wpb_wrapper">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="progress-bx overflow-hidden mb-3">
                                                <div class="progress-info">
                                                    <span class="title">Tramer Kaydı</span>
                                                    <span class="progress-value">{{($car->tramer == 0)?"Yok":"Var"}}</span>
                                                </div>
                                                <div class="progress mb-3">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="2s"
                                                         data-wow-delay="0.6s"
                                                         style="width: 1000%; visibility: visible; animation-duration: 2s; animation-delay: 0.6s; animation-name: fadeInLeft;"></div>
                                                </div>
                                            </div>
                                            <div class="progress-bx overflow-hidden mb-3">
                                                <div class="progress-info">
                                                    <span class="title">Tramer Kaydı Tutarı</span>
                                                    <span class="progress-value">{{$car->tramerValue}} TL</span>
                                                </div>
                                                <div class="progress mb-3">
                                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="2s"
                                                         data-wow-delay="0.6s"
                                                         style="width: 1000%; visibility: visible; animation-duration: 2s; animation-delay: 0.6s; animation-name: fadeInLeft;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if(!is_null($car->tramer_photo) && $car->tramer_photo != "" && Storage::disk('local')->exists($car->tramer_photo))
                                                <img style="min-width: 100%"  src="{{asset('images')}}/{{$car->tramer_photo}}" />
                                            @else
                                                <img style="min-width: 100%"  src="{{asset('view/images/banner/pic2.jpg')}}" alt="image"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Send-message" role="tabpanel" aria-labelledby="Send-message-tab">

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_details">Aracın Ekstraları</label>
                                        <textarea name="car_details" id="car_details" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly="">{{$car->details}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_notwork">Aracınızda çalışmayan aksamları</label>
                                        <textarea name="car_notwork" id="car_notwork" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly="">{{$car->car_notwork}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_exterior_faults">Aracınızın dış kozmetik kusurları</label>
                                        <textarea name="car_exterior_faults" id="car_exterior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly="">{{$car->car_exterior_faults}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label style="font-weight: bold !important" for="car_interior_faults">Aracınızın iç kozmetik kusurları</label>
                                        <textarea name="car_interior_faults" id="car_interior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly="">{{$car->car_interior_faults}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <strong>Aracın Bakım Geçmişi</strong>
                                        <textarea name="maintenance_history" id="maintenance_history" cols="30" rows="2" class="form-control" style="font-size: 13px" readonly="">{{$car->maintenance_history}}</textarea>
                                    </div>


                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <style>
        .dlab-bnr-inr {
            background: #1b1b1b;
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            top: 100px;
        }
        .car-price {
            overflow: hidden;
            position: relative;
            background-color: #1a54b2 !important;
            border-radius: 5px !important;
        }
        .car-price h3 {
            font-weight: 900;
            color: #fff;
        }
        .m-0 {
            margin: 0!important;
        }
        .dlab-bnr-inr .dlab-bnr-inr-entry .breadcrumb-row {
            margin-top: 0px;
        }
    </style>
@endsection