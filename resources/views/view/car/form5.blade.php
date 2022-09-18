@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/js/custom.js')}}"></script><!-- CUSTOM JS -->
    <script src="{{asset('view/js/js/dz.ajax.js')}}"></script><!-- CUSTOM JS -->
    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
               @include('view/car/menu',['url' => request()->route()->getName()])
                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" id="step-five-form" method="POST" action="{{route('payment')}}">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="customer_car_id" value="{{$customer_car_id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="pKK" class="payment_type row" style="&quot;padding-left:" 20px&quot;="">
                                    <div class="col-lg-7 col-sm-12">
                                             <div class="col-sm-12">
                                                <div>
                                                    <label for="card_holder">İsim<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="firstname" id="firstname" class="form-control" @if($customer_car) value="{{$customer_car->customer->firstname}}" @endif required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <label for="card_holder">Soyisim <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="lastname" id="lastname" class="form-control"  @if($customer_car) value="{{$customer_car->customer->lastname}}" @endif required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <label for="card_holder">Telefon<span  class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="phone" id="phone" class="form-control"  @if($customer_car) value="{{$customer_car->customer->phone}}" @endif required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <label for="card_holder">Email<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="email" id="email" class="form-control"  @if($customer_car) value="{{$customer_car->customer->email}}" @endif required>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="col-lg-5 m-lg-auto col-sm-12">
                                        <div class="col-sm-12">
                                            <div>
                                                <label for="card_holder">Kart Sahibi İsmi <span  class="text-danger">*</span></label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="CardHolderName" id="card_holder"  class="form-control" placeholder="Kart üzerindeki isim..."  required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div>
                                                <label for="card_number">Kredi Kartı Numarası <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="Pan" id="card_number" class="form-control"  placeholder="0000-0000-0000-0000" required="" maxlength="19">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="col-sm-10">
                                                    <div>
                                                        <label for="card_mo">Ay <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="input-group me-2">
                                                        <select name="ExpiryMo" id="card_mo" class="form-control"
                                                                required>
                                                            <option value="">Ay</option>
                                                            @for($i = 1; $i < 12; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div>
                                                        <label for="card_yr">Yıl <span
                                                                    class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="input-group me-2">
                                                        <select name="ExpiryYr" id="card_yr" class="form-control"
                                                                required>
                                                            <option value="">Yıl</option>
                                                            @for($i = date('Y'); $i < (date('Y') + 20); $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <label for="card_cv2">CVV2 <span
                                                                class="text-danger">*</span></label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" name="Cvv2" id="card_cv2" class="form-control"
                                                           placeholder="000" style="width: 80px" required=""
                                                           maxlength="3">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="pay"
                                                class="d-flex justify-content-between align-items-center">
                                            <div class="left"><i class="fad fa-shield-check fa-2x"></i></div>
                                            <div class="center text-center">
                                                <div class="notranslate" id="amount"><span><del>279 TL</del></span>
                                                    yerine, sadece <span>169 TL</span></div>
                                                <small>Güvenli Ödeme Yap ve Değerlemeye Gönder</small>
                                            </div>
                                            <div class="right"><i class="fas fa-angle-right fa-2x"></i></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style media="screen">
        #pay {
            width: 100%;
            border: none;
            border-radius: 0.31em;
            background-color: #0ab285;
            color: #fff;
        }

        #pay .left {
            padding-top: 18px;
            padding-bottom: 18px;
            padding-left: 18px;
        }

        #pay .right {
            padding-top: 18px;
            padding-bottom: 18px;
            padding-left: 18px;
            padding-right: 18px;
            background-color: #1d9a78;
            border-top-right-radius: 0.31em;
            border-bottom-right-radius: 0.31em;
        }

        #pay .fa-2x {
            font-size: 2em;
        }

        #pay .center .notranslate {
            font-size: 14px;
            line-height: 1
        }

        #pay .center .notranslate span {
            font-size: 17px;
            font-weight: 700
        }

        #pay .center small {
            font-size: 1em !important
        }

    </style>
@endsection