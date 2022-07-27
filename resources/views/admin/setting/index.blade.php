@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Ayarlar Sayfası</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Ayarlar Sayfası</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <form action="{{route('admin.setting.save')}}" method="post" enctype="multipart/form-data">
            @csrf
            @foreach($settings as $setting)

                @if($setting->type == 'input')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{$setting->title}}</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="{{$setting->type}}" name="setting[{{$setting->key}}]"
                                   value="{{$setting->value}}"/>
                        </div>
                    </div>
                @endif

                @if($setting->type == 'textarea')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label d-flex align-items-center">{{$setting->title}}</label>
                        <div class="col-sm-9">
                            <textarea name="setting[{{$setting->key}}]" rows="6"
                                      class="form-control">{{$setting->value}} </textarea>
                        </div>
                    </div>
                @endif

                @if($setting->type == 'radio')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label d-flex align-items-center">{{$setting->title}}</label>
                        <div class="col-sm-9">
                            <input type="{{$setting->type}}" name="setting[{{$setting->key}}]" class="form-control">
                        </div>
                    </div>
                @endif

                @if($setting->type == 'checkbox')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{$setting->title}}</label>
                        <div class="col-sm-9">
                            <input type="checkbox" name="setting[{{$setting->key}}]" class="maintance js-switch"
                                   value="1" @if($setting->value=='true') checked @endif data-switchery="true">
                            </span>
                        </div>
                    </div>
                @endif

                @if($setting->type == 'file')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{$setting->title}}</label>
                        <div class="col-md-3">
                            <img src="{{asset('storage/files/'.$setting->value)}}">
                        </div>
                        <div class="col-sm-6">
                            <input type="{{$setting->type}}" class="form-control" name="setting[{{$setting->key}}]"/>
                        </div>
                    </div>
                @endif

            @endforeach
            <div class="hr-line-dashed"></div>

            <div class="buttons mt-2">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fad fa-save mr-1"></i> Ayarları
                    Kaydet
                </button>
                <a href="/" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Geri Dön</a>
            </div>
        </form>
    </div>

@endsection
