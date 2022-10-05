@extends('layouts.app')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç Bilgileri</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><a href="/cars">Araçlar</a></li>
                <li class="breadcrumb-item active"><strong>{{str_replace(" ", "", strtoupper($car['plate']))}}
                        - {{$car['car_city'] ?? NULL}} - {{$car->customer['firstname'] ?? NULL}} {{$car->customer['lastname'] ?? NULL}}
                        - {{$car->customer['phone'] ?? NULL}}</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 46px">
            <a href="/cars" class="btn btn-sm btn-secondary mr-2"><i class="fad fa-reply mr-1"></i> Geri Dön</a>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <div class="tabs-container">
            <ul id="CarTabs" class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#general"><i
                                class="fad fa-fw fa-info-square"></i>Genel Bilgiler</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#photos"><i class="fad fa-fw fa-photo-video"></i>Fotoğraflar</a>
                </li>
                <li hidden><a class="nav-link" data-toggle="tab" href="#videos"><i class="fad fa-fw fa-video"></i>Videolar</a>
                </li>
                <li><a class="nav-link" data-toggle="tab" href="#experts"><i class="fad fa-fw fa-file-chart-line"></i>Exper
                        Raporu</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#notes"><i class="fad fa-fw fa-comment-alt-dots"></i>
                        Araç Notları <span class="label label-plain ml-2"></span></a></li>
                <li><a class="nav-link" data-toggle="tab" href="#valuation"><i
                                class="fad fa-fw fa-comment-alt-dots"></i> Araç Değerleme </a></li>
                <li><a class="nav-link" data-toggle="tab" href="#request"><i class="fad fa-fw fa-comment-alt-dots"></i>
                      Talepler </a></li>
                <li><a class="nav-link" data-toggle="tab" href="#customercars"><i class="fad fa-fw fa-comment-alt-dots"></i>
                        Müşteri Araçları </a></li>
                <!-- li><a class="nav-link" data-toggle="tab" href="#messages"><i class="fad fa-fw fa-comment-alt-dots"></i>
                        Mesajlaşma </a></li -->
            </ul>
            <div class="tab-content" ng-controller="postController">
                <div role="tabpanel" id="general" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <form action="/cars/{{$car['id']}}/save" method="post">

                                    <div class="accordion" id="accordionExample">

                                        <div class="card">
                                            <div class="card-header p-1" id="headingOne">
                                                <button class="btn btn-link btn-block text-left text-success"
                                                        type="button" data-toggle="" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">Araç
                                                    Özellikleri
                                                </button>
                                            </div>
                                            <div id="collapseOne" class="collapse show p-3" aria-labelledby="headingOne"
                                                 data-parent="#accordionExample">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="brand">Marka</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->car->brand->name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="year">Model Yılı</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->caryear}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="model">Model</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->car->model}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="body">Kasa Tipi</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{\App\Enums\BodyType::BodyType[$car->body]}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fuel">Yakıt Tipi</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{\App\Enums\FullType::FullType[$car->fuel]}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="gear">Vites Tipi</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{\App\Enums\Transmission::Transmission[$car->gear]}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="version">Versiyon</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->car->brand->name}} ({{$car->car->horse}} HP)"
                                                                   disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Bilgisi</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->km}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Sorgu Fotoğrafı</label>
                                                            <a href="/Uploads/Cars/Km/{{$car->kmPhoto}}" target="_blank"
                                                               class="btn btn-sm btn-primary w-100"><i
                                                                        class="fad fa-external-link-square mr-1"></i>
                                                                Fotoğrafa Bak</a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="color">Renk</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->colors->name}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header p-1" id="c3">
                                                <button class="btn btn-link btn-block text-left text-success"
                                                        type="button" data-toggle="" data-target="#c3-a"
                                                        aria-expanded="true" aria-controls="c3-a">Araç Bilgileri
                                                </button>
                                            </div>
                                            <div id="c3-a" class="collapse show p-3" aria-labelledby="c3"
                                                 data-parent="#accordionExample">

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın paketinde olmayan
                                                        ekstraları açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="description" id="description" cols="30" rows="2"
                                                              class="form-control" style="font-size: 13px"
                                                              required>{{$car->description}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızda çalışmayan aksam varsa
                                                        açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_notwork" id="car_notwork" cols="30" rows="2"
                                                              class="form-control" style="font-size: 13px"
                                                              required>{{$car->car_notwork}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın dış kozmetik kusurları
                                                        varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_exterior_faults" id="car_exterior_faults"
                                                              cols="30" rows="2" class="form-control"
                                                              style="font-size: 13px"
                                                              required>{{$car->car_exterior_faults}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın iç kozmetik kusurları
                                                        varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_interior_faults" id="car_interior_faults"
                                                              cols="30" rows="2" class="form-control"
                                                              style="font-size: 13px"
                                                              required>{{$car->car_interior_faults}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <strong>Aracın Bakım Geçmişi <span
                                                                class="text-danger">*</span></strong>
                                                    <textarea name="bakim_gecmisi" id="bakim_gecmisi" cols="30" rows="5"
                                                              class="form-control" style="font-size: 13px"
                                                              required>{{$car->maintenance_history}}</textarea>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Araç Plakası</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->plate}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Kaçıncı Sahibisiniz</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->ownorder}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Şehir</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{\App\Models\City::find($car->car_city)->name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-2 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">İlçe</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{\App\Models\Town::find($car->car_state)->name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Mahalle</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{$car->car_mahalle}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Son Muayene</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="{{date('d-m-Y',strtotime($car->date_inspection))}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 1 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control form-control-sm text-right"
                                                                       value="{{$car->gal_price_1}}" disabled>
                                                                <span class="input-group-text"
                                                                      style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 2 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control form-control-sm text-right"
                                                                       value="{{$car->gal_price_2}}" disabled>
                                                                <span class="input-group-text"
                                                                      style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 3 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control form-control-sm text-right"
                                                                       value="{{$car->gal_price_3}}" disabled>
                                                                <span class="input-group-text"
                                                                      style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="buttons mt-3">
                                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i
                                                    class="fad fa-save mr-1"></i> Kaydet
                                        </button>
                                        <a href="/cars" class="btn btn-sm btn-secondary"><i
                                                    class="fad fa-reply mr-1"></i> Vazgeç</a>
                                    </div>

                                </form>

                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header p-1" id="c2">
                                        <button class="btn btn-link btn-block text-left text-success" type="button"
                                                data-toggle="" data-target="#c2-a" aria-expanded="true"
                                                aria-controls="c2-a">Boya &amp; Değişen &amp; İşlem Durumu
                                        </button>
                                    </div>

                                    <div id="c2-a" class="collapse show p-3" aria-labelledby="c2" data-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col">
                                                <div class="car-damage-wrapper">

                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            @if(!empty($car->damage))
                                                            <div class="damage-area">
                                                                <div class="car-parts">
                                                                    @if($car->damage)
                                                                        @foreach (json_decode($car->damage) as $key => $value)
                                                                            @continue( substr($key, 0, 5) == "islem" )
                                                                            <div class="{{$key}} {{$value}}"></div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="color-desc d-flex justify-content-center align-items-center mt-4">
                                                                <div class="mr-3"><a href="javascript:;"
                                                                                     class="btn btn-sm original">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                                    Orijinal
                                                                </div>
                                                                <div class="mr-3"><a href="javascript:;"
                                                                                     class="btn btn-sm painted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                                    Boyalı
                                                                </div>
                                                                <div class="mr-3"><a href="javascript:;"
                                                                                     class="btn btn-sm paintedlocal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                                    Lokal Boyalı
                                                                </div>
                                                                <div class=""><a href="javascript:;"
                                                                                 class="btn btn-sm changed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                                    Değişen
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mt-3 mb-3">
                                            <div class="col">
                                                <table class="islem-table table table-bordered table-striped mb-0">
                                                    <tr>
                                                        <td>Aracın <u><b>şasesinde</b></u> işlem/ekleme/düzeltme var mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_frame == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>direklerinde</b></u> işlem/ekleme/düzeltme var
                                                            mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_pole == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>podyelerinde</b></u> işlem/ekleme/düzeltme var
                                                            mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_podium == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi
                                                            satışa engel bir durumu var mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->durum_satilamaz == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>Ön, Arka Panel ve Bagaj Havuzu'nda</b></u>
                                                            işlem/değişim var mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_onArkaBagaj == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>hava yastıklarında</b></u> işlem/kusur/değişim
                                                            var mı?
                                                        </td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_airbag == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi?</td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_km == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl?</td>
                                                        <td width="80"
                                                            class="text-center">{{($car->status_tyre == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-lg-4 col-sm-12 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramer" class="mb-1">Tramer Bilgisi</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                           value="{{( $car->tramer ) ? \App\Enums\Tramer::Tramer[$car->tramer] : ""}}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 pl-1 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Tutarı</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control form-control-sm text-right"
                                                               value="{{$car->tramerValue}}" disabled>
                                                        <span class="input-group-text"
                                                              style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-12 pl-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Fotoğrafı</label>
                                                    <a href="/Uploads/Cars/Tramer/{{$car->tramer_photo}}"
                                                       target="_blank" class="btn btn-sm btn-primary w-100"><i
                                                                class="fad fa-external-link-square mr-1"></i> Fotoğrafa
                                                        Bak</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div role="tabpanel" id="photos" class="tab-pane">
                    @if($car->photo)
                        <div class="panel-body">
                            <div class="row">
                                @foreach ( $car->photo as $photo )
                                    <div class="col-2" style="padding: 2px;top: 13px;text-align: center">
                                        <div style="border: 2px solid #ccc;padding: 10px;">
                                        <a href="{{asset('storage/cars')}}/{{$photo->image}}"
                                           title="{{str_replace(" ", "", strtoupper($car->plate))}} Fotoğrafları"
                                           data-gallery>
                                            <img src="{{asset('storage/cars')}}/{{$photo->image}}" style="height: 150px"
                                                 class="img-fluid rounded mb-3">
                                            <img src="{{ public_path($photo->image)}}" alt="" />
                                        </a>
                                        <a class="btn btn-success w-100" href="{{route('admin.customer_car_valuation.default_photo',['id' => $car->id,'photo' => $photo->id])}}">
                                            Default
                                           @if($photo->image == $car->default_image)
                                               <i style="float: right;line-height: 1.5" class="fas fa-check"></i>
                                            @endif
                                        </a>
                                        </div>
                                    </div>
                                @endforeach

                                <div id="blueimp-gallery" class="blueimp-gallery">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <a class="prev">‹</a>
                                    <a class="next">›</a>
                                    <a class="close">×</a>
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
                <div role="tabpanel" id="videos" class="tab-pane" hidden>
                    @if($car->video)
                        <div class="panel-body">
                            <div class="row">
                                @foreach ( $car->video as $video )
                                    <div class="col-2 mb-3 text-center">
                                        <a class="fakeVideo d-flex justify-content-center align-items-center mb-2"
                                           href="/Uploads/Cars/Videos/{{$video->video}}" target="_blank">
                                            <i class="fad fa-play-circle fa-3x"></i>
                                        </a>
                                        {{$video->video}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div role="tabpanel" id="experts" class="tab-pane">
                    <div class="panel-body">
                        @if($car->exper)
                            <div class="row">
                                @foreach ($car->exper as $expert)
                                    <div class="col-2 mb-3">
                                        <a data-gallery href="{{asset('storage/expers')}}/{{$expert->image}}" target="_blank">
                                            <img src="{{asset('storage/expers')}}/{{$expert->image}}"  class="img-fluid rounded">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div role="tabpanel" id="notes" class="tab-pane">
                    <div class="panel-body">

                        <form action="#" ng-click="AdminCommentAdd()" id="AdminCommentsForm" method="post">
                            <input type="hidden" name="car_id" id="car_id" value="{{$car->id}}">
                            <div class="input-group mb-3">
                                <input id="comment" name="comment" type="text" class="form-control"
                                       placeholder="Yöneticiler için notunuzu yazın..."
                                       aria-label="Yöneticiler için notunuzu yazın..." aria-describedby="addNote"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                                class="fad fa-plus-circle mr-1"></i> Notu Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>

                        <table id="comments_table" class="table table-striped table-hover table-bordered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Not</th>
                                <th width="220" class="text-center">Ekleyen</th>
                                <th width="150" class="text-center">Eklenme Zamanı</th>
                                <th width="80" class="text-center">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ( !empty($car->comment) )
                                @foreach ( $car->comment as $Comment )
                                    <tr>
                                        <td class="text-center">{{$Comment->id}}</td>
                                        <td>{{$Comment->comment}}</td>
                                        <td>{{\App\Models\User::find($Comment->user_id)->name}}</td>
                                        <td class="text-center">{{$Comment->created_at}}</td>
                                        <td class="text-center"><a href="{{route('admin.customer_car_valuation.delete_commnet',['id'=>$Comment->id])}}"
                                                                   class="comment_delete btn btn-sm btn-danger" ><i
                                                        class="fad fa-trash-alt"></i> Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç not
                                        eklenmemiş!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
                <div role="tabpanel" id="valuation" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <form id="ValuationSave" ng-submit="ValuationSave()" method="post">
                                    <input type="hidden" name="valuation_id" value="{{$valuation->id ?? 0}}">
                                    <input type="hidden" name="customers_car_id" value="{{$car->id}}">
                                    <input type="hidden" name="sendtoadmin" id="sendtoadmin" value="">

                                    <div class="form-group mt-4">
                                        <textarea name="comment" cols="30" rows="10" style="    width: 100%;" placeholder="Araç değerlemesi için gerekli notlarınızı yazın..." >{{$valuation->comment ?? NULL}}</textarea>

                                        <label for="">Emsal Araçlar</label>

                                        <input type="text" name="link1" class="form-control mb-1"
                                               placeholder="Araç Linki (1)"
                                               value="{{$valuation->link1 ?? NULL}}">
                                        <textarea name="link1_comment" rows="2" class="form-control mb-2"
                                                  placeholder="Bu link için açıklama...">{{$valuation->link1_comment ?? NULL}}</textarea>

                                        <input type="text" name="link2" class="form-control mb-1"
                                               placeholder="Araç Linki (2)"
                                               value="{{$car->valuation->link2 ?? NULL}}">
                                        <textarea name="link2_comment" rows="2" class="form-control mb-2"
                                                  placeholder="Bu link için açıklama...">{{$valuation->link2_comment ?? NULL}}</textarea>

                                        <input type="text" name="link3" class="form-control mb-1"
                                               placeholder="Araç Linki (3)"
                                               value="{{$valuation->link3 ?? NULL}}">
                                        <textarea name="link3_comment" rows="2" class="form-control mb-2"
                                                  placeholder="Bu link için açıklama...">{{$valuation->link3_comment ?? NULL}}</textarea>

                                        <input type="text" name="link4" class="form-control mb-1"
                                               placeholder="Araç Linki (4)"
                                               value="{{$valuation->link4 ?? NULL}}">
                                        <textarea name="link4_comment" rows="2" class="form-control mb-2"
                                                  placeholder="Bu link için açıklama...">{{$valuation->link4_comment ?? NULL}}</textarea>

                                        <input type="text" name="link5" class="form-control mb-1"
                                               placeholder="Araç Linki (5)"
                                               value="{{$valuation->link5 ?? NULL}}">
                                        <textarea name="link5_comment" rows="2" class="form-control mb-2"
                                                  placeholder="Bu link için açıklama...">{{$valuation->link5_comment ?? NULL}}</textarea>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="offer_price"><b>Önerilecek Fiyat <span
                                                            class="text-danger">*</span></b></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="offer_price" id="offer_price"
                                                       class="form-control text-right" aria-describedby="tl-addon"
                                                       value="{{$valuation->offer_price ?? NULL}}" required>
                                                <div class="input-group-append"><span class="input-group-text"
                                                                                      id="tl-addon"
                                                                                      style="font-size: 13px">TL</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="buttons mt-1">
                                        <button type="submit" class="sendtoadmin btn btn-sm btn-success mr-1"><i class="fad fa-long-arrow-right mr-1"></i> Kaydet &amp; Onaya Gönder
                                        </button>
                                        <a href="/cars" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="messages" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="chatbox">

                                <div class="chatbox__row chatbox__row_fullheight">
                                    <div class="chatbox__content">
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                    <img class="message__smiley"
                                                         src="http://www.pic4ever.com/images/14k8gag.gif" border="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div class="message__head">
                                                <span class="message__note">Princess Murphy</span>
                                                <span class="message__note">Вчера, 17:00</span>
                                            </div>
                                            <div class="message__base">
                                                <div class="message__avatar avatar">
                                                    <a href="#" class="avatar__wrap">
                                                        <img class="avatar__img" src="http://placehold.it/35x35"
                                                             width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                    <img class="message__smiley"
                                                         src="http://www.pic4ever.com/images/245.gif" border="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chatbox__row">
                                    <div class="enter">
                                        <div class="enter__submit">
                                            <button class="button button_id_submit" type="submit">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="enter__textarea">
                                            <textarea name="enterMessage" id="enterMessage" cols="30" rows="2"
                                                      placeholder="Say message..."></textarea>
                                        </div>
                                        <div class="enter__icons">
                                            <a href="#" class="enter__icon">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="enter__icon">
                                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="request" class="tab-pane">
                    <div class="panel-body">
                         <div class="row">
                            @if($requests->count() != 0)
                             <ul>
                                 <?php foreach ($requests->get() as $item){ ?>
                                 <li><?=$item->customer_car->customer->fullname?></li>
                                 <?php } ?>
                             </ul>
                            @else
                                <div class="col-md-12">Talep Bulunamadı</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="customercars" class="tab-pane">
                    <div class="panel-body">
                        <table id="Cars" class="cars table table-striped table-bordered table-hover mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th width="40" class="text-center">#</th>
                                <th width="80" class="text-center">Plaka</th>
                                <th class="text-left">Araç Marka / İsim</th>
                                <th width="100" class="text-center">Yakıt</th>
                                <th width="120" class="text-center">Kasa</th>
                                <th width="120" class="text-center">Kayıt Zamanı</th>
                                <th width="200" class="text-center">Atanan</th>
                                <th width="160" class="text-center">İşlem(ler)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $customercars = \App\Models\CustomerCar::where('customer_id',$car->customer['id'])->get() ?>
                            @if ( empty(@$customercars) )
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç araç yok!</td>
                                </tr>
                            @else
                                @foreach ( @$customercars as $car )
                                    <tr id="carRow-1">
                                        <td class="text-center">{{@$car->id}}</td>
                                        <td class="text-center">{{@$car->plate}}</td>
                                        <td class="text-left">{{@$car->brand->name}}</td>
                                        <td class="text-center">{{@$car->fuel}}</td>
                                        <td class="text-center">{{@$car->body}}</td>
                                        <td class="text-center">{{@$car->date_created}}</td>
                                        <td class="text-center">{{@$car->agent}}</td>
                                        <td class="text-center">

                                            @if ( @$car->payment->status == 0 )
                                                <span class="text-danger">Ödeme Bekleniyor</span>
                                            @else
                                                @if(!$car->user_id )
                                                    <a href="javascript:;" data-carid="{{$car->id}}"
                                                       class="confirm btn btn-xs btn-primary"><i
                                                                class="fad fa-check mr-1"></i> Onayla ve Ata</a>
                                                @else
                                                    <a href="javascript:;" class="btn btn-xs btn-warning"><i
                                                                class="fad fa-hourglass-half mr-1"></i> Değerleme
                                                        Bekleniyor</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <style media="screen">

        #experts .row:last-child .col-2,
        #videos .row:last-child .col-2,
        #photos .row:last-child .col-2 {
            margin-bottom: 0 !important;
        }

        .blueimp-gallery .slide .slide-content {
            border-radius: 3px !important;
        }

        .blueimp-gallery .title,
        .blueimp-gallery .prev,
        .blueimp-gallery .next,
        .blueimp-gallery .close,
        .blueimp-gallery .play-pause,
        .blueimp-gallery .indicator {
            display: block !important;
        }

        .fakeVideo {
            background-color: #000;
            border-radius: 4px;
            height: 140px;
            color: #fff;
        }

        .fakeVideo i {

        }

    </style>

    <link href="{{asset('admin/css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(window).on('hashchange', function () {
                $(".nav-tabs a[href='" + window.location.hash + "']").click();
            });

            $('#CarsTabs a.nav-link').on('click', function (e) {
                e.preventDefault();
                window.location.hash = $(this).attr("href");
            });

            if (window.location.hash.length > 0) {
                $(".nav-tabs a[href='" + window.location.hash + "']").click();
            }

            $("#AdminCommentsForm").on("submit", function (e) {

                e.preventDefault();

                var car_id = $("#car_id").val();
                var comment = $("#comment").val();

                $.post("/cars/comments/save", {car_id: car_id, comment: comment}, function (r) {
                    if (r.status == "success") {
                        window.location.reload();
                    }
                }, "json");

            });


        });
    </script>

    <link rel="stylesheet" href="{{asset('admin/css/car-damage.css')}}">
    <script>
        var postApp = angular.module('app', []);
        postApp.controller('postController', function ($scope, $http) {
            $scope.user = {};
            $scope.ValuationSave = function () {
                $http({
                    method: 'POST',
                    url: '{{route('admin.customer_car_valuation.store_valuation')}}',
                    data: $("#ValuationSave").serialize(),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(data) {
                    swal(data.data);
                }, function errorCallback(response) {
                    swal(response.data);
                });
            };

            $scope.AdminCommentAdd = function () {
                $http({
                    method: 'POST',
                    url: '{{route('admin.customer_car_valuation.store_comment')}}',
                    data: $("#AdminCommentsForm").serialize(),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(data) {
                    swal(data.data);
                    window.location.reload();
                }, function errorCallback(response) {
                    swal(response.data);
                });
            };

        });
    </script>
@endsection
