@extends('layouts.app')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç Bilgileri</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><a href="/cars">Araçlar</a></li>
                <li class="breadcrumb-item active"><strong>{{str_replace(" ", "", strtoupper($car['plate']))}} - {{$car['car_city']}} - {{$car->customer['firstname']}} {{$car->customer['lastname']}} - {{$car->customer['phone']}}</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 46px">
            <a href="/cars" class="btn btn-sm btn-secondary mr-2"><i class="fad fa-reply mr-1"></i> Geri Dön</a>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <div class="tabs-container">
            <ul id="CarTabs" class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#general"><i class="fad fa-fw fa-info-square"></i>Genel Bilgiler</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#photos"><i class="fad fa-fw fa-photo-video"></i>Fotoğraflar</a></li>
                <li hidden><a class="nav-link" data-toggle="tab" href="#videos"><i class="fad fa-fw fa-video"></i>Videolar</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#experts"><i class="fad fa-fw fa-file-chart-line"></i>Exper Raporu</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#notes"><i class="fad fa-fw fa-comment-alt-dots"></i> Araç Notları <span class="label label-plain ml-2"></span></a></li>
            </ul>
            <div class="tab-content">

                <div role="tabpanel" id="general" class="tab-pane active">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-7">
                                <form action="/cars/{{$car['id']}}/save" method="post">

                                    <div class="accordion" id="accordionExample">

                                        <div class="card">
                                            <div class="card-header p-1" id="headingOne">
                                                <button class="btn btn-link btn-block text-left text-success" type="button" data-toggle="" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Araç Özellikleri</button>
                                            </div>
                                            <div id="collapseOne" class="collapse show p-3" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="brand">Marka</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->car->brand->name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="year">Model Yılı</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->caryear}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="model">Model</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->model}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="body">Kasa Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->body}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fuel">Yakıt Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->fuel}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="gear">Vites Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->gear}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="version">Versiyon</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->car->brand->name}} ({{$car->car->horse}} HP)" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Bilgisi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->km}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Sorgu Fotoğrafı</label>
                                                            <a href="/Uploads/Cars/Km/{{$car->kmPhoto}}" target="_blank" class="btn btn-sm btn-primary w-100"><i class="fad fa-external-link-square mr-1"></i> Fotoğrafa Bak</a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="color">Renk</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->color}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header p-1" id="c3">
                                                <button class="btn btn-link btn-block text-left text-success" type="button" data-toggle="" data-target="#c3-a" aria-expanded="true" aria-controls="c3-a">Araç Bilgileri</button>
                                            </div>
                                            <div id="c3-a" class="collapse show p-3" aria-labelledby="c3" data-parent="#accordionExample">

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın paketinde olmayan ekstraları açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="description" id="description" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{$car->description}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızda çalışmayan aksam varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_notwork" id="car_notwork" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{$car->car_notwork}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın dış kozmetik kusurları varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_exterior_faults" id="car_exterior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{$car->car_exterior_faults}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın iç kozmetik kusurları varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_interior_faults" id="car_interior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{$car->car_interior_faults}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <strong>Aracın Bakım Geçmişi <span class="text-danger">*</span></strong>
                                                    <textarea name="bakim_gecmisi" id="bakim_gecmisi" cols="30" rows="5" class="form-control" style="font-size: 13px" required>{{$car->maintenance_history}}</textarea>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Araç Plakası</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->plate}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Kaçıncı Sahibisiniz</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->ownorder}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Şehir</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->car_city}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">İlçe</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->car_state}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Mahalle</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->car_mahalle}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Son Muayene</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$car->date_inspection}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 1 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$car->gal_fiyat_1}}" disabled>
                                                                <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 2 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$car->gal_fiyat_2}}" disabled>
                                                                <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 3 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$car->gal_fiyat_3}}" disabled>
                                                                <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="buttons mt-3">
                                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i> Kaydet</button>
                                        <a href="/cars" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
                                    </div>

                                </form>

                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header p-1" id="c2">
                                        <button class="btn btn-link btn-block text-left text-success" type="button" data-toggle="" data-target="#c2-a" aria-expanded="true" aria-controls="c2-a">Boya &amp; Değişen &amp; İşlem Durumu</button>
                                    </div>
                                    <div id="c2-a" class="collapse show p-3" aria-labelledby="c2" data-parent="#accordionExample">

                                        <div class="row">
                                            <div class="col">
                                                <div class="car-damage-wrapper">

                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <div class="damage-area">
                                                                <div class="car-parts">
                                                                    @if ($car->damage)
                                                                        @foreach ($car->damage as $key => $value)
                                                                            @continue( substr($key, 0, 5) == "islem" )
                                                                            <div class="{{$key}} {{$value}}"></div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="color-desc d-flex justify-content-center align-items-center mt-4">
                                                                <div class="mr-3"><a href="javascript:;" class="btn btn-sm original">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> Orijinal</div>
                                                                <div class="mr-3"><a href="javascript:;" class="btn btn-sm painted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> Boyalı</div>
                                                                <div class="mr-3"><a href="javascript:;" class="btn btn-sm paintedlocal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> Lokal Boyalı</div>
                                                                <div class=""><a href="javascript:;" class="btn btn-sm changed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> Değişen</div>
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
                                                        <td>Aracın <u><b>şasesinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="80" class="text-center">{{($car->status_frame == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>direklerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="80" class="text-center">{{($car->status_pole == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>podyelerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="80" class="text-center">{{($car->status_podium == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi satışa engel bir durumu var mı?</td>
                                                        <td width="80" class="text-center">{{($car->durum_satilamaz == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>Ön, Arka Panel ve Bagaj Havuzu'nda</b></u> işlem/değişim var mı?</td>
                                                        <td width="80" class="text-center">{{($car->status_onArkaBagaj == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>hava yastıklarında</b></u> işlem/kusur/değişim var mı?</td>
                                                        <td width="80" class="text-center">{{($car->status_airbag == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi?</td>
                                                        <td width="80" class="text-center">{{($car->status_km == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl?</td>
                                                        <td width="80" class="text-center">{{($car->status_tyre == 1) ? 'Evet' : 'Hayır'}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-lg-4 col-sm-12 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramer" class="mb-1">Tramer Bilgisi</label>
                                                    <input type="text" class="form-control form-control-sm" value="{{( $car->tramer ) ? \App\Enums\Tramer::Tramer[$car->tramer] : ""}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 pl-1 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Tutarı</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm text-right" value="{{$car->tramerValue}}" disabled>
                                                        <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-12 pl-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Fotoğrafı</label>
                                                    <a href="/Uploads/Cars/Tramer/{{$car->tramer_photo}}" target="_blank" class="btn btn-sm btn-primary w-100"><i class="fad fa-external-link-square mr-1"></i> Fotoğrafa Bak</a>
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
                                <div class="col-2">
                                    <a href="/Uploads/Cars/Photos/{{$photo->photo}}" title="{{str_replace(" ", "", strtoupper($car->plate))}} Fotoğrafları" data-gallery>
                                        <img src="/Uploads/Cars/Photos/{{$photo->photo}}" alt="" class="img-fluid rounded mb-3">
                                    </a>
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
                                    <a class="fakeVideo d-flex justify-content-center align-items-center mb-2" href="/Uploads/Cars/Videos/{{$video->video}}" target="_blank">
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
                                    <a href="/Uploads/Cars/Expert/{{$expert->expert}}" target="_blank">
                                        <img src="/Uploads/Cars/Expert/{{$expert->expert}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <div role="tabpanel" id="notes" class="tab-pane">
                    <div class="panel-body">

                        <form action="#" id="AdminCommentsForm" method="post">
                            <input type="hidden" name="car_id" id="car_id" value="{{$car->id}}">
                            <div class="input-group mb-3">
                                <input id="comment" name="comment" type="text" class="form-control" placeholder="Yöneticiler için notunuzu yazın..." aria-label="Yöneticiler için notunuzu yazın..." aria-describedby="addNote" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fad fa-plus-circle mr-1"></i> Notu Kaydet</button>
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
                                        <td class="text-center">{{$Comment->name}}</td>
                                        <td class="text-center">{{$Comment->date_created}}</td>
                                        <td class="text-center"><a href="javascript:;" class="comment_delete btn btn-sm btn-danger" data-commentid='{{$Comment->id}}'><i class="fad fa-trash-alt"></i> Sil</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç not eklenmemiş!</td>
                                </tr>
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
        $(document).ready(function(){

            $(window).on('hashchange', function(){
                $(".nav-tabs a[href='"+ window.location.hash +"']").click();
            });

            $('#CarsTabs a.nav-link').on('click', function (e) {
                e.preventDefault();
                window.location.hash = $(this).attr("href");
            });

            if( window.location.hash.length > 0 ){
                $(".nav-tabs a[href='"+ window.location.hash +"']").click();
            }

            $("#AdminCommentsForm").on("submit", function(e){

                e.preventDefault();

                var car_id = $("#car_id").val();
                var comment = $("#comment").val();

                $.post("/cars/comments/save", { car_id:car_id, comment:comment }, function(r){
                    if( r.status == "success" ){
                        window.location.reload();
                    }
                }, "json");

            });

            $("a.comment_delete").on("click", function(){

                let parenttr = $(this).parents("tr");
                let comment_id = $(this).data("commentid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu kaydı silmek istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, sil!",
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/cars/comments/delete", { comment_id:comment_id }, function(){

                        $(parenttr).remove();

                        if( !$("#comments_table tbody tr").length ){
                            $("#comments_table tbody").append('<tr><td colspan="10" class="text-center bg-white" height="80">Henüz hiç not eklenmemiş!</td></tr>');
                        }

                        swal({
                            title: "Silindi!",
                            text: "Kayıt başarıyla silindi.",
                            type: "success",
                            confirmButtonColor: "#1a7bb9",
                            confirmButtonText: "Tamam"
                        });

                    });
                });

            });

        });
    </script>

    <link rel="stylesheet" href="{{asset('admin/css/car-damage.css')}}">

@endsection
