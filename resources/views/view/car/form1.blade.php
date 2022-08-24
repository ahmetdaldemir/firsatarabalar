@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <link rel="stylesheet" href="{{asset('view/css/damage.css')}}">

    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                <div class="stepwizard mb-5">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="form-1.html" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Yeni Araç Seçimi</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="form-2.html" type="button" class="btn btn-default btn-circle"
                               disabled="disabled">2</a>
                            <p>Boya & Değişen & İşlem</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="form-3.html" type="button" class="btn btn-default btn-circle"
                               disabled="disabled">3</a>
                            <p>Araç Özel Bilgileri</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="form-4.html" type="button" class="btn btn-default btn-circle"
                               disabled="disabled">4</a>
                            <p>Araç Fotoğrafları</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="form-5.html" type="button" class="btn btn-default btn-circle"
                               disabled="disabled">5</a>
                            <p>Ödeme Bilgileri</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" method="POST" action="{{route('form2')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="brand" ng-init="brands ='1'" id="getModelValue" ng-model="brands"
                                            class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}" my-directive>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="year" ng-init="year ='2022'" class="form-control"
                                            ng-change="GetModel(year,brands)" ng-model="year">
                                        <option selected>Model Yılı</option>
                                        @for($i= date('Y'); $i > 1950; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="model" class="form-control" ng-init="model ='0'"
                                            ng-change="GetBody(year,brands,model)" ng-model="model">
                                        <option selected value="0">Seçiniz</option>
                                        <option ng-repeat="model in modelList" value="@{{model.model}}">
                                            @{{model.model}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="body" ng-init="body ='0'" class="form-control" ng-change="GetFuel(year,brands,model)"  ng-model="body">
                                        <option selected value="0">Kasa Tipi</option>
                                        <option ng-repeat="item in bodyList" value="@{{item.id}}">@{{item.bodytype}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="fuel" class="form-control"  ng-init="fuel ='0'"
                                            ng-change="GetVersion(year,brands,model,body,fuel)" ng-model="fuel">
                                        <option selected value="0">Yakıt Tipi</option>
                                        <option ng-repeat="item in fuelList" value="@{{item.id}}">@{{item.fueltype}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="transmission" class="form-control">
                                        <option selected>Vites Tipi</option>
                                        @foreach($transmission as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <select name="version" id="version" class="form-control form-select-sm" rows="40"
                                            cols="50" style="height:150px">
                                        <option ng-repeat="item in versionList" value="@{{item.id}}">@{{item.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input name="km" required type="text" class="form-control" placeholder="KM Bilgisi">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="color" class="form-control">
                                        <option selected>Renk</option>
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input name="plate" type="text" class="form-control" placeholder="Araç Plakası">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="ownorder" class="form-control">
                                        <option selected>Kaçıncı Sahibisiniz</option>
                                        <option value="1">1.Sahibiyim</option>
                                        <option value="2">2.Sahibiyim</option>
                                        <option value="3">3.Sahibiyim</option>
                                        <option value="4">4.Sahibiyim</option>
                                        <option value="5">5.Sahibiyim</option>
                                        <option value="6">Bilmiyorum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="car_city"  ng-init="districts ='1'" ng-change="GetDistricts(districts)"
                                            ng-model="districts" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="car_state"  class="form-control">
                                        <option selected>İlçe</option>
                                        <option ng-repeat="district in districtsList" value="@{{district.id}}">
                                            @{{district.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <textarea name="description" class="form-control" placeholder="Mesaj"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button name="submit" type="submit" value="Submit"
                                        class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>


@endsection