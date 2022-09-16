@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <link rel="stylesheet" href="{{asset('view/css/damage.css')}}">
    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                @include('view/car/menu',['url' => request()->route()->getName()])
                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" method="POST" action="{{route('form2')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Marka</label>
                                <div class="input-group">
                                    <select name="brand"
                                            ng-init="brands = '{{($customer_car && $customer_car->car->brand->id) ?  $customer_car->car->brand->id : '1'}}'"
                                            id="getModelValue" ng-model="brands" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option @if($customer_car &&  $customer_car->car->brand->id == $brand->id) selected
                                                    @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Yıl</label>
                                <div class="input-group">
                                    <select name="year"
                                            ng-init="year = '{{($customer_car && $customer_car->year) ?  $customer_car->year : ''}}'"
                                            class="form-select" ng-change="GetModel(year,brands)" ng-model="year">
                                        <option value="">Model Yılı</option>
                                        @for($i= date('Y'); $i > 1950; $i--)
                                            <option @if($customer_car && $customer_car->year == $i) selected @endif  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Model</label>
                                <div class="input-group">
                                    <select name="model" class="form-select"
                                            ng-init="model = '{{($customer_car && $customer_car->car->model) ?  $customer_car->car->model : '0'}}'"
                                            ng-change="GetVersion(year,brands,model)" ng-model="model">
                                        <option selected value="0">Model</option>
                                        <option ng-repeat="model in modelList"
                                                ng-selected="model.model == <?=@$customer_car->car->model?>"
                                                value="@{{model.model}}">
                                            @{{model.model}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Kaçıncı Sahibisiniz</label>
                                <div class="input-group">
                                    <select name="ownorder" class="form-select">
                                        <option selected>Kaçıncı Sahibisiniz</option>
                                        <option @if($customer_car && $customer_car->ownorder == 1) selected
                                                @endif  value="1">1.Sahibiyim
                                        </option>
                                        <option @if($customer_car && $customer_car->ownorder == 2) selected
                                                @endif  value="2">2.Sahibiyim
                                        </option>
                                        <option @if($customer_car && $customer_car->ownorder == 3) selected
                                                @endif  value="3">3.Sahibiyim
                                        </option>
                                        <option @if($customer_car && $customer_car->ownorder == 4) selected
                                                @endif  value="4">4.Sahibiyim
                                        </option>
                                        <option @if($customer_car && $customer_car->ownorder == 5) selected
                                                @endif  value="5">5.Sahibiyim
                                        </option>
                                        <option @if($customer_car && $customer_car->ownorder == 6) selected
                                                @endif  value="6">Bilmiyorum
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Kasa Tipi</label>
                                <div class="input-group">
                                    <select name="body" class="form-select">
                                        <option selected value="0">Kasa Tipi</option>
                                        @foreach($bodytype as $key => $value)
                                        <option ng-selected="item.id == <?=@$customer_car->body?>" value="{{$key}}">
                                            {{$value}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Yakıt Tipi</label>
                                <div class="input-group">
                                    <select name="fuel" class="form-select">
                                        <option selected value="0">Yakıt Tipi</option>
                                        @foreach($fueltype as $key => $value)
                                        <option @if($key == @$customer_car->fuel) selected @endif  value="{{$key}}">
                                            {{$value}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Vites Tipi</label>
                                <div class="input-group">
                                    <select name="transmission" class="form-select">
                                        <option selected>Vites Tipi</option>
                                        @foreach($transmission as $key => $value)
                                            <option value="{{$key}}"
                                                    @if($customer_car && $customer_car->transmission == $key) selected @endif >{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">Renk</label>
                                <div class="input-group">
                                    <select name="color" class="form-select input-group-lg">
                                        <option value="" selected>Seçiniz</option>
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}"
                                                    @if($customer_car && $customer_car->color == $color->id) selected @endif>{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label style="font-weight: 600">Araç Versiyon</label>
                                <div class="input-group">
                                    <select name="version" id="version" class="form-select" rows="40" cols="50"
                                            style="    width: 100%;">
                                        <option ng-repeat="item in versionList" ng-selected="item.id == {{($customer_car && $customer_car->car_id) ?  $customer_car->car_id : '0'}}" value="@{{item.id}}">@{{item.name}}
                                        </option>
                                    </select>
                                    <input name="custom_version" id="custom_version" style="display: none;"
                                           placeholder="Araç Versiyonunu yazınız...!" class="form-select">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">KM</label>
                                <div class="input-group">
                                    <input name="km" required type="text" class="form-control"
                                           value="<?=@$customer_car->km?>" placeholder="KM Bilgisi">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label style="font-weight: 600">Araç Plakası</label>
                                <div class="input-group">
                                    <input name="plate" type="text" class="form-control"
                                           value="<?=@$customer_car->plate?>" placeholder="Araç Plakası">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label style="font-weight: 600">İl</label>
                                <div class="input-group">
                                    <select name="car_city" ng-init="districts ='{{($customer_car && $customer_car->car_city) ?  $customer_car->car_city : '0'}}'" ng-change="GetDistricts(districts)"
                                            ng-model="districts" class="form-select" style="height: 45px">
                                        <option value="0" selected>Seçiniz</option>
                                    @foreach($cities as $city)
                                            <option value="{{$city->id}}"  @if($customer_car && $customer_car->car_city == $city->id) selected @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label style="font-weight: 600">İlçe</label>
                                <div class="input-group">
                                    <select name="car_state" class="form-select" style="height:45px">
                                        <option selected>İlçe</option>
                                        <option ng-repeat="district in districtsList"
                                                ng-selected="district.id == <?=@$customer_car->car_state?>"
                                                value="@{{district.id}}">
                                            @{{district.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label style="font-weight: 600">Açıklama</label>
                                <div class="input-group">
                                    <textarea name="description" class="form-control"
                                              placeholder="Mesaj"><?=@$customer_car->description?></textarea>
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



