@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç {{(@$Car->id) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="/settings">Ayarlar</a></li>
                <li class="breadcrumb-item active"><strong>Araç {{(@$Car->id) ? "Düzenle":"Ekle"}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Geri Dön</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title"><h5>Araç Özellikleri</h5></div>
            <div class="ibox-content">

                <form action="{{route('admin.car.store')}}" method="post">
                    <input type="hidden" name="car_id" value="{{@$Car->id}}">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="brand_id">Araç Markası <span class="text-danger">*</span></label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Araç Markası seçin...</option>
                                    @foreach ($brands as $brand )
                                        <option value="{{$brand->id}}" {{ ( $brand->id == @$car->brand_id ) ? "selected" : ""}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="model">Araç Modeli <span class="text-danger">*</span></label>
                                <input type="text" name="model" id="model" class="form-control" value="{{@$Car->model}}" placeholder="Araç modeli yazın..." autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Araç Versiyonu <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{@$Car->name}}" placeholder="Araç versionu yazın..." autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Kasa <span class="text-danger">*</span></label>
                                <select name="bodytype" id="bodytype" class="form-control" required>
                                    <option value="">Kasa seçimi yapın...</option>
                                    @foreach ( $bodyTypes as $key => $body )
                                        <option value="{{$key}}" {{ ( $key == @$car->bodytype ) ? "selected" : ""}}>{{$body}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fueltype">Yakıt <span class="text-danger">*</span></label>
                                <select name="fueltype" id="fueltype" class="form-control" required>
                                    <option value="">Yakıt seçimi yapın...</option>
                                    @foreach ( $fuelTypes as $key => $fuel )
                                        <option value="{{$key}}" {{ ( $key == @$Car->fueltype ) ? "selected" : ""}}>{{$fuel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="transmission">Şanzuman <span class="text-danger">*</span></label>
                                <select name="transmission" id="transmission" class="form-control" required>
                                    <option value="">Şanzuman seçimi yapın...</option>
                                    @foreach ( $transmissions as $key => $Transmission )
                                        <option value="{{$key}}" {{ ($key == @$Car->transmission ) ? "selected" : ""}}>{{$Transmission}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Motor <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input name="engine" type="text" class="form-control" placeholder="Motor Hacmi" aria-label="Motor Hacmi" aria-describedby="basic-addon2" value="{{@$Car->engine}}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cc</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Beygir <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input name="horse" type="text" class="form-control" placeholder="Beygir Gücü" aria-label="Beygir Gücü" aria-describedby="basic-addon2" value="{{@$Car->horse}}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Hp</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone">Üretim Başlangıç & Bitiş <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col pr-1">
                                        <input type="text" name="production_start" id="production_start" class="form-control" value="{{@$Car->production_start}}" placeholder="Yıl yazın..." autocomplete="off" required>
                                    </div>
                                    <div class="col pl-1">
                                        <input type="text" name="production_end" id="production_end" class="form-control" value="{{@$Car->production_end}}" placeholder="Yıl yazın..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox mt-1">
                        <input type="checkbox" name="status" class="custom-control-input" id="status" {{ ( @$Car->status ) ? "checked" : "" }}>
                        <label class="custom-control-label" for="status">Aktif</label>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="buttons">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i> Aracı Kaydet</button>
                        <a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <style media="screen">
        .input-group-text {
            font-size: 13px !important
        }
    </style>

@endsection