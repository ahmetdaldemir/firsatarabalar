@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç Bilgileri</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><a href="/cars">Araçlar</a></li>
                <li class="breadcrumb-item active"><strong>{{str_replace(" ", "", strtoupper($customer_car->plate))}} - {{@$customer_car->car_city}} - {{@$customer_car->customer->firstname}} {{@$customer_car->customer->lastname}} - {{@$customer_car->customer->phone}}</strong></li>
                <li class="breadcrumb-item active"><strong>{{str_replace(" ", "", strtoupper($customer_car->plate))}} - {{@$customer_car->car_city}} - {{@$customer_car->buyer->firstname}} {{@$customer_car->buyer->lastname}} - {{@$customer_car->buyer->phone}}</strong></li>
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
                <li><a class="nav-link" data-toggle="tab" href="#notes"><i class="fad fa-fw fa-comment-alt-dots"></i> Araç Notları <span class="label label-plain ml-2">{{$customer_car->comment()->count()}}</span></a></li>
                <li><a class="nav-link" data-toggle="tab" href="#valuation"><i class="fad fa-fw fa-comment-alt-dots"></i> Araç Değerleme </a></li>
                <li><a class="nav-link" data-toggle="tab" href="#messages"><i class="fad fa-fw fa-comment-alt-dots"></i> Mesajlaşma </a></li>
            </ul>
            <div class="tab-content">

                <div role="tabpanel" id="general" class="tab-pane active">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-7">

                                <form action="/cars/{{$customer_car->id}}/save" method="post">

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
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->car->brand->name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="year">Model Yılı</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->caryear}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="model">Model</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->car->model}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="body">Kasa Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->body}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fuel">Yakıt Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->fuel}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="gear">Vites Tipi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->gear}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="version">Versiyon</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->car->brand->name}} ({{@$customer_car->car->horse}} HP)" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Bilgisi</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->km}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="km">KM Sorgu Fotoğrafı</label>
                                                            <a href="/Uploads/Cars/Km/{{@$customer_car->kmPhoto}}" target="_blank" class="btn btn-sm btn-primary w-100"><i class="fad fa-external-link-square mr-1"></i> Fotoğrafa Bak</a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="color">Renk</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{$customer_car->color}}" disabled>
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
                                                    <textarea name="description" id="description" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{@$customer_car->description}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızda çalışmayan aksam varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_notwork" id="car_notwork" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{@$customer_car->car_notwork}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın dış kozmetik kusurları varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_exterior_faults" id="car_exterior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{@$customer_car->car_exterior_faults}}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <strong style="font-size: 12px">Aracınızın iç kozmetik kusurları varsa açıklayın <span class="text-danger">*</span></strong>
                                                    <textarea name="car_interior_faults" id="car_interior_faults" cols="30" rows="2" class="form-control" style="font-size: 13px" required>{{@$customer_car->car_interior_faults}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <strong>Aracın Bakım Geçmişi <span class="text-danger">*</span></strong>
                                                    <textarea name="bakim_gecmisi" id="bakim_gecmisi" cols="30" rows="5" class="form-control" style="font-size: 13px" required>{{@$customer_car->bakim_gecmisi}}</textarea>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Araç Plakası</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->plate}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Kaçıncı Sahibisiniz</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->ownorder}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Şehir</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->car_city}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">İlçe</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->car_state}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Mahalle</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->car_mahalle}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="plate">Son Muayene</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{@$customer_car->date_inspection}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 1 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$customer_car->gal_fiyat_1}}" disabled>
                                                                <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1 pr-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 2 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$customer_car->gal_fiyat_2}}" disabled>
                                                                <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <div class="form-group mb-0">
                                                            <label for="sahip">Galeri 3 Fiyat</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm text-right" value="{{$customer_car->gal_fiyat_3}}" disabled>
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
                                                                    @if (@$customer_car->damage)
                                                                        @foreach ($customer_car->damage as $key => $value)
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
                                                        <td width="80" class="text-center">{{$customer_car->durum_sasi}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>direklerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_direk}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>podyelerinde</b></u> işlem/ekleme/düzeltme var mı?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_podye}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi satışa engel bir durumu var mı?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_satilamaz}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>Ön, Arka Panel ve Bagaj Havuzu'nda</b></u> işlem/değişim var mı?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_onArkaBagaj}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><b>hava yastıklarında</b></u> işlem/kusur/değişim var mı?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_airbag}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_km}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl?</td>
                                                        <td width="80" class="text-center">{{$customer_car->durum_lastik}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-lg-4 col-sm-12 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramer" class="mb-1">Tramer Bilgisi</label>
                                                    <input type="text" class="form-control form-control-sm" value="{{( $customer_car->tramer ) ? \App\Enums\Tramer::Tramer[$customer_car->tramer] : ""}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 pl-1 pr-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Tutarı</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm text-right" value="{{$customer_car->tramerValue}}" disabled>
                                                        <span class="input-group-text" style="font-size: 11px; border-radius: 0 3px 3px 0; border-left:0;">TL</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-12 pl-1">
                                                <div class="form-group mb-0">
                                                    <label for="tramerValue" class="mb-1">Tramer Fotoğrafı</label>
                                                    <a href="/Uploads/Cars/Tramer/{{$customer_car->tramer_photo}}" target="_blank" class="btn btn-sm btn-primary w-100"><i class="fad fa-external-link-square mr-1"></i> Fotoğrafa Bak</a>
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
                    <div class="panel-body">

                        <div class="row">
                            @foreach ($customer_car->photo() as $photo )
                                <div class="col-2">
                                    <a href="/Uploads/Cars/Photos/{{$photo->photo}}" title="{{str_replace(" ", "", strtoupper($customer_car->plate))}} Fotoğrafları" data-gallery>
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
                </div>

                <div role="tabpanel" id="videos" class="tab-pane" hidden>
                    <div class="panel-body">
                        <div class="row">
                            @foreach ( $customer_car->video() as $video )
                                <div class="col-2 mb-3 text-center">
                                    <a class="fakeVideo d-flex justify-content-center align-items-center mb-2" href="/Uploads/Cars/Videos/{{$video->video}}" target="_blank">
                                        <i class="fad fa-play-circle fa-3x"></i>
                                    </a>
                                    {{$video->video}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div role="tabpanel" id="experts" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            @foreach ( $customer_car->exper() as $expert )
                                <div class="col-2 mb-3">
                                    <a href="/Uploads/Cars/Expert/{{$expert->expert}}" target="_blank">
                                        <img src="/Uploads/Cars/Expert/{{$expert->expert}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div role="tabpanel" id="notes" class="tab-pane">
                    <div class="panel-body">

                        <form action="#" id="AdminCommentsForm" method="post">
                            <input type="hidden" name="car_id" id="car_id" value="{{$customer_car->id}}">
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
                            @if ( !empty($customer_car->comments) )
                                @foreach ( $customer_car->comments as $Comment )
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
                <div role="tabpanel" id="valuation" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <form id="ValuationSave" action="/cars/valuation_save" method="post">

                                    <input type="hidden" name="valuation_id" value="{{@$valuation->id}}">
                                     <input type="hidden" name="customers_car_id" value="{{$customer_car->id}}">
                                    <input type="hidden" name="sendtoadmin" id="sendtoadmin" value="">

                                    <textarea name="comment" cols="30" rows="10" class="editor" placeholder="Araç değerlemesi için gerekli notlarınızı yazın..." required>{{@$customer_car->valuation->comment}}</textarea>

                                    <div class="form-group mt-4">

                                        <label for="">Emsal Araçlar</label>

                                        <input type="text" name="link1" class="form-control mb-1" placeholder="Araç Linki (1)" value="{{@$customer_car->valuation->link1}}">
                                        <textarea name="link1_comment" rows="2" class="form-control mb-2" placeholder="Bu link için açıklama...">{{@$customer_car->valuation->link1_comment}}</textarea>

                                        <input type="text" name="link2" class="form-control mb-1" placeholder="Araç Linki (2)" value="{{@$customer_car->valuation->link2}}">
                                        <textarea name="link2_comment" rows="2" class="form-control mb-2" placeholder="Bu link için açıklama...">{{@$customer_car->valuation->link2_comment}}</textarea>

                                        <input type="text" name="link3" class="form-control mb-1" placeholder="Araç Linki (3)" value="{{@$customer_car->valuation->link3}}">
                                        <textarea name="link3_comment" rows="2" class="form-control mb-2" placeholder="Bu link için açıklama...">{{@$customer_car->valuation->link3_comment}}</textarea>

                                        <input type="text" name="link4" class="form-control mb-1" placeholder="Araç Linki (4)" value="{{@$customer_car->valuation->link4}}">
                                        <textarea name="link4_comment" rows="2" class="form-control mb-2" placeholder="Bu link için açıklama...">{{@$customer_car->valuation->link4_comment}}</textarea>

                                        <input type="text" name="link5" class="form-control mb-1" placeholder="Araç Linki (5)" value="{{@$customer_car->valuation->link5}}">
                                        <textarea name="link5_comment" rows="2" class="form-control mb-2" placeholder="Bu link için açıklama...">{{@$customer_car->valuation->link5_comment}}</textarea>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="offer_price"><b>Önerilecek Fiyat <span class="text-danger">*</span></b></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="offer_price" id="offer_price" class="form-control text-right" aria-describedby="tl-addon" value="{{@$customer_car->valuation->offer_price}}" required>
                                                <div class="input-group-append"><span class="input-group-text" id="tl-addon" style="font-size: 13px">TL</span></div>
                                            </div>
                                        </div>
                                    </div>


                                        <div class="buttons mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i> Kaydet</button>
                                            <button type="button" class="sendtoadmin btn btn-sm btn-success mr-1"><i class="fad fa-long-arrow-right mr-1"></i> Kaydet &amp; Onaya Gönder</button>
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                    <img class="message__smiley" src="http://www.pic4ever.com/images/14k8gag.gif" border="0">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
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
                                                        <img class="avatar__img" src="http://placehold.it/35x35" width="35" height="35" alt="avatar image">
                                                    </a>
                                                </div>
                                                <div class="message__textbox">
                                                    <span class="message__text">Hello, Bogdan! Yes, funny smiles</span>
                                                    <img class="message__smiley" src="http://www.pic4ever.com/images/245.gif" border="0">
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
                                            <textarea name="enterMessage" id="enterMessage" cols="30" rows="2" placeholder="Say message..."></textarea>
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

            </div>
        </div>

    </div>
<style>


    /* Icons sprite */

    .icon-attachment {
        width: 12px;
        height: 20px;
        background-position: -5px -5px;
    }

    .icon-smiles {
        width: 16px;
        height: 16px;
        background-position: -5px -61px;
    }



    .close {
        width: 12px;
        height: 12px;
        position: relative;
    }

    .close:before,
    .close:after {
        content: '';
        background-color: #fff;
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: rotate(45deg) scale(.86667);
    }

    .close:before {
        width: 2px;
        height: 18px;
        margin: -9px 0 0 -1px;
    }

    .close:after {
        width: 18px;
        height: 2px;
        margin: -1px 0 0 -9px;
    }


    /* Chatbox */

    .chatbox {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 530px;
        table-layout: fixed;
        box-sizing: border-box;
        width: 100%;
        padding: 0 26px;
        position: relative;
    }

    .chatbox__row {
        display: block;
    }

    .chatbox__row_fullheight {
        flex: 1;
        overflow-y: auto;
    }

    .head {
        display: inline-flex;
        position: relative;
        width: 100%;
        align-items: center;
        padding: 11px 0 13px 0;
    }

    .head:after {
        background-color: #edeef1;
        height: 2px;
        width: 100%;
        content: '';
        position: absolute;
        left: 0;
        top: 100%;
    }

    .head__avatar.avatar {
        position: relative;
        background-color: #4cceea;
    }

    .head__title {
        color: #5b6171;
        font-size: 18px;
        font-weight: 400;
        margin-left: 21px;
        padding-top: 3px;
    }

    .head__note {
        color: #a0a3b1;
        font-size: 14px;
        font-weight: 400;
        margin-left: auto;
        padding-right: 18px;
        padding-top: 3px;
    }

    .head__icon {
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #d2d4da;
        display: inline-block;
        vertical-align: middle;
        margin-left: 8px;
    }

    .chatbox__content {
        height: 100%;
    }


    /* message block */

    .message {}

    .message__head {
        display: flex;
        justify-content: space-between;
        padding: 12px 80px 10px 82px;
    }

    .message__note {
        opacity: 0.5;
        color: #5b6171;
        font-size: 12px;
    }

    .message__date {}

    .message__base {
        display: inline-flex;
        width: 100%;
        align-items: center;
    }

    .message__avatar {}

    .message__textbox {
        box-sizing: border-box;
        display: flex;
        align-items: center;
        margin-left: 15px;
        width: 100%;
        min-height: 43px;
        background-color: #f5f6fa;
        border-radius: 9px;
        padding: 11px 25px 12px 25px;
        color: #6a6d77;
    }

    .message__smiley {
        margin-right: 3px;
    }

    .message__smiley:last-child {
        margin-right: 0;
    }

    .message__text + .message__smiley {
        margin-left: 4px;
    }

    .avatar {
        border-radius: 50%;
        position: relative;
        border: none;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: 700;
        background-color: #b8bbc8;
    }

    .avatar_larger {
        width: 43px;
        height: 43px;
    }

    .avatar_online:before {
        position: absolute;
        content: '';
        top: 0;
        right: 0;
        width: 6px;
        height: 6px;
        background-color: #4cceea;
        border: 2px solid #eff0f5;
        border-radius: 50%;
    }

    .avatar__wrap {
        border-radius: 50%;
        text-decoration: none;
        display: inherit;
        color: #fff;
    }

    .avatar__img {
        border-radius: 50%;
    }

    .counter {
        line-height: 11px;
        color: white;
        font-size: 13px;
        font-weight: 700;
        display: block;
    }


    /* enter block */

    .enter {
        position: relative;
        padding-top: 12px;
        padding-bottom: 14px;
    }

    .enter:before {
        background-color: #edeef1;
        height: 2px;
        width: 100%;
        content: '';
        position: absolute;
        bottom: 100%;
        left: 0;
    }

    .enter__submit {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        width: 38px;
        height: 38px;
        border: 2px solid #e2e3e7;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
    }

    .enter__textarea {
        padding-right: 50px;
    }

    .enter__textarea textarea {
        width: 100%;
        border: none;
        resize: none;
    }

    .enter__icons {
        padding-right: 50px;
        font-size: 0;
        display: flex;
        align-items: center;
        margin-top: 6px;
    }

    .enter__icons .fa-paperclip {
        font-size: 16px;
        color: grey;
    }

    .enter__icons .fa-smile-o {
        font-size: 16px;
        color: grey;
    }

    .enter__icon {
        margin-right: 12px;
    }
</style>
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
    <link href="{{asset('admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}" rel="stylesheet">

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

    <link href="{{asset('admin/css/car-damage.css')}}" rel="stylesheet">

@endsection
