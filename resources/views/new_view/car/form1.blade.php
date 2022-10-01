@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Aracını Ekle</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Araç Ekleme</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <link rel="stylesheet" href="{{asset('view/css/damage.css')}}">
    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center" style="margin: 60px 0">
                @include('new_view/car/menu',['url' => request()->route()->getName()])
                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" method="POST" action="{{route('form2')}}">
                        @csrf
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="brand">Marka <span class="text-danger">*</span></label>
                                        <select name="brand" id="brand" class="form-select form-select-sm" required>
                                            <option value="">Marka seçiniz...</option>
                                            @foreach ( $brands as $item )
                                                <option value='{{$item->id}}'>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-block d-lg-none" style="height: 10px"></div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="year">Model Yılı <span class="text-danger">*</span></label>
                                        <select name="year" id="year" class="form-select form-select-sm" required>
                                            <option value="">Model Yılı seçiniz...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-block d-lg-none" style="height: 10px"></div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="model">Model <span class="text-danger">*</span></label>
                                        <select name="model" id="model" class="form-select form-select-sm" required>
                                            <option value="">Model seçiniz...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="body">Kasa Tipi <span class="text-danger">*</span></label>
                                        <select name="body" id="body" class="form-select form-select-sm" required>
                                            <option value="">Kasa Tipi seçiniz...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-block d-lg-none" style="height: 10px"></div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="fuel">Yakıt Tipi <span class="text-danger">*</span></label>
                                        <select name="fuel" id="fuel" class="form-select form-select-sm" required>
                                            <option value="">Yakıt Tipi seçiniz...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-block d-lg-none" style="height: 10px"></div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="gear">Vites Tipi <span class="text-danger">*</span></label>
                                        <select name="gear" id="gear" class="form-select form-select-sm" required>
                                            <option value="">Vites Tipi seçiniz...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="version">Versiyon <span class="text-danger">*</span></label>
                                        <select name="version" id="version" class="form-select form-select-sm" size="5" required>
                                        </select>
                                        <div class="custom-version-group" hidden>
                                            <input type="text" name="custom_version" id="custom-version" class="form-control" placeholder="Örn: Clio 1.2 16V Expression Manuel" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="km">KM Bilgisi <span class="text-danger">*</span></label>
                                        <input type="text" name="km" id="km" class="form-control form-control-sm" placeholder="Örn: 120.000" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="color">Renk <span class="text-danger">*</span></label>
                                        <select name="color" id="color" class="form-select form-select-sm" required>
                                            <option value="">Renk seçiniz...</option>
                                            @foreach ( $colors as $item )
                                                <option value='{{$item->id}}'>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-2 col-6">
                                    <div class="form-group">
                                        <label for="plate">Araç Plakası <span class="text-danger">*</span></label>
                                        <input type="text" name="plate" id="plate" class="form-control form-control-sm" style="text-transform:uppercase" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6 form-group">
                                    <label for="sahip">Kaçıncı Sahibisiniz <span class="text-danger">*</span></label>
                                    <select name="sahip" id="sahip" class="form-select form-select-sm" required>
                                        <option value="">Seçiniz...</option>
                                        <option value="1. Sahibiyim">1. Sahibiyim</option>
                                        <option value="2. Sahibiyim">2. Sahibiyim</option>
                                        <option value="3. Sahibiyim">3. Sahibiyim</option>
                                        <option value="4. Sahibiyim">4. Sahibiyim</option>
                                        <option value="5. Sahibiyim">5. Sahibiyim</option>
                                        <option value="Bilmiyorum">Bilmiyorum</option>
                                    </select>
                                </div>
                                <div class="d-block d-lg-none" style="height: 10px"></div>
                                <div class="col-lg-3 col-6">
                                    <label for="car_city">Aracın Bulunduğu İl <span class="text-danger">*</span></label>
                                    <select name="car_city" id="car_city" class="form-select form-select-sm" required>
                                        <option value="">Seçiniz...</option>
                                        @foreach ( $cities as $City )
                                            <option value="{{$City->id}}">{{$City->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <label for="car_state">Aracın Bulunduğu İlçe <span class="text-danger">*</span></label>
                                    <select id="car_state" name="car_state" class="form-select form-select-sm" required>
                                        <option value="">İlçe Seçiniz</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button name="submit" type="submit" value="Submit"
                                        class="btn btn-primary gradient border-0 rounded-md btn-block">Devam Et
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('body-before-js')

    <script type="text/javascript">
        @if ( isset($notcompleted) && @$notcompleted["car"]->id )
        var customers_cars_id = {{@$notcompleted["car"]->id}};
        @else
        var customers_cars_id = 0;
        @endif
    </script>
    <script>
        function comfirmcheck()
        {
            // if ($("input[name=is_active]").prop(":checked")) {
            if($("input[name=is_active]").is(':checked') ){
                // if ($('input.checkbox_check').is(':checked')) {
                $("#ConfirmModal").modal('hide');
                return true;
            } else {
                alert('Kullanım Şartlarınız Onaylamalısınız');
                $("#ConfirmModal").css('display','block');
                return false;
            }
        }
    </script>

    <script src="{{asset('new_view/js/car-selection.js') }}" charset="utf-8"></script>
    <script src="{{asset('new_view/js/car-damage.js') }}" charset="utf-8"></script>
    <script src="{{asset('new_view/js/new-car-save.js') }}" charset="utf-8"></script>
@endsection

