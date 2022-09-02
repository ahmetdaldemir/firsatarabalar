@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <link rel="stylesheet" href="{{asset('view/css/damage.css')}}">
    <div class="content-inner-2" style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
            @include('view/car/menu',['url' => request()->route()->getName()])

            <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <form class="dlab-form" method="POST" action="{{route('form3')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="customer_id" value="{{auth()->id()}}" >
                    <input type="hidden" class="form-control" name="customer_car_id" value="{{$customer_car_id}}" >
                    <div class="row">
                        <div class="col-sm-12 mb-4">
                            <div class="car-damage-wrapper">
                                <div class="row">
                                    <div class="col-lg-5 text-center">
                                        <div class="damage-area">
                                            <div class="car-parts">
                                                @if($customer_car && !is_null($customer_car->damage))
                                                     <?php $damage = json_decode($customer_car->damage); ?>
                                                    @foreach ($damage as $key => $value)
                                                        @continue( substr($key, 0, 5) == "islem" )
                                                        <div class="{{$key}} {{$value}}"></div>
                                                    @endforeach
                                                @else
                                                <div class="front-bumper original"></div>
                                                <div class="front-hood original"></div>
                                                <div class="roof original"></div>
                                                <div class="front-right-mudguard original"></div>
                                                <div class="front-right-door original"></div>
                                                <div class="rear-right-door original"></div>
                                                <div class="rear-right-mudguard original"></div>
                                                <div class="front-left-mudguard original"></div>
                                                <div class="front-left-door original"></div>
                                                <div class="rear-left-door original"></div>
                                                <div class="rear-left-mudguard original"></div>
                                                <div class="rear-hood original"></div>
                                                <div class="rear-bumper original"></div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="color-desc mt-4">
                                            <div class="form-check form-check-inline original">
                                                <input class="form-check-input" type="radio" name="d1" checked="">
                                                <label class="form-check-label">Orjinal</label>
                                            </div>
                                            <div class="form-check form-check-inline painted">
                                                <input class="form-check-input" type="radio" name="d2" checked="">
                                                <label class="form-check-label">Boyalı</label>
                                            </div>
                                            <div class="form-check form-check-inline paintedlocal">
                                                <input class="form-check-input" type="radio" name="d3" checked="">
                                                <label class="form-check-label">Lokal Boyalı</label>
                                            </div>
                                            <div class="form-check form-check-inline changed">
                                                <input class="form-check-input" type="radio" name="d4" checked="">
                                                <label class="form-check-label">Değişen</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-7">

                                        <div class="damage-selection">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td></td>
                                                    <td width="60" class="text-center original">Orijinal</td>
                                                    <td width="60" class="text-center painted">Boyalı</td>
                                                    <td width="60" class="text-center paintedlocal">Lokal</td>
                                                    <td width="60" class="text-center changed">Değişen</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="front-bumper">
                                                    <td>Ön Tampon</td>
                                                    <td class="text-center original"><input     value="original"       class="form-check-input" type="radio" name="damage[front_bumper]" checked></td>
                                                    <td class="text-center painted"><input      value="painted"        class="form-check-input" type="radio" name="damage[front_bumper]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal"   class="form-check-input" type="radio" name="damage[front_bumper]"></td>
                                                    <td class="text-center changed"><input       value="changed"       class="form-check-input" type="radio" name="damage[front_bumper]"></td>
                                                </tr>
                                                <tr class="front-hood">
                                                    <td>Motor Kaputu</td>
                                                    <td class="text-center original"><input      value="original"      class="form-check-input" type="radio" name="damage[front_hood]" checked></td>
                                                    <td class="text-center painted"><input       value="painted"       class="form-check-input" type="radio" name="damage[front_hood]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal"  class="form-check-input" type="radio" name="damage[front_hood]"></td>
                                                    <td class="text-center changed"><input       value="changed"       class="form-check-input" type="radio" name="damage[front_hood]"></td>
                                                </tr>
                                                <tr class="roof">
                                                    <td>Tavan</td>
                                                    <td class="text-center original"><input      value="original"      class="form-check-input" type="radio" name="damage[roof]" checked></td>
                                                    <td class="text-center painted"><input       value="painted"       class="form-check-input" type="radio" name="damage[roof]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal"  class="form-check-input" type="radio" name="damage[roof]"></td>
                                                    <td class="text-center changed"><input       value="changed"       class="form-check-input" type="radio" name="damage[roof]"></td>
                                                </tr>
                                                <tr class="front-right-mudguard">
                                                    <td>Sağ Ön Çamurluk</td>
                                                    <td class="text-center original"><input     value="original"      class="form-check-input" type="radio" name="damage[front_right_mudguard]" checked=""></td>
                                                    <td class="text-center painted"><input      value="painted"       class="form-check-input" type="radio" name="damage[front_right_mudguard]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal"  class="form-check-input" type="radio" name="damage[front_right_mudguard]"></td>
                                                    <td class="text-center changed"><input      value="changed"       class="form-check-input" type="radio" name="damage[front_right_mudguard]"></td>
                                                </tr>
                                                <tr class="front-right-door">
                                                    <td>Sağ Ön Kapı</td>
                                                    <td class="text-center original"><input     value="original"     class="form-check-input" type="radio" name="damage[front_right_door]" checked=""></td>
                                                    <td class="text-center painted"><input      value="painted"      class="form-check-input" type="radio" name="damage[front_right_door]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal" class="form-check-input" type="radio" name="damage[front_right_door]"></td>
                                                    <td class="text-center changed"><input      value="changed"       class="form-check-input" type="radio" name="damage[front_right_door]"></td>
                                                </tr>
                                                <tr class="rear-right-door">
                                                    <td>Sağ Arka Kapı</td>
                                                    <td class="text-center original"><input     value="original"     class="form-check-input" type="radio" name="damage[rear_right_door]"></td>
                                                    <td class="text-center painted"><input      value="painted"      class="form-check-input" type="radio" name="damage[rear_right_door]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal" class="form-check-input" type="radio" name="damage[rear_right_door]"></td>
                                                    <td class="text-center changed"><input      value="changed"      class="form-check-input" type="radio" name="damage[rear_right_door]"></td>
                                                </tr>
                                                <tr class="rear-right-mudguard">
                                                    <td>Sağ Arka Çamurluk</td>
                                                    <td class="text-center original"><input      value="original"     class="form-check-input" type="radio" name="damage[rear_right_mudguard]" checked=""></td>
                                                    <td class="text-center painted"><input       value="painted"      class="form-check-input" type="radio" name="damage[rear_right_mudguard]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal" class="form-check-input" type="radio" name="damage[rear_right_mudguard]"></td>
                                                    <td class="text-center changed"><input       value="changed"       class="form-check-input" type="radio" name="damage[rear_right_mudguard]"></td>
                                                </tr>
                                                <tr class="front-left-mudguard">
                                                    <td>Sol Ön Çamurluk</td>
                                                    <td class="text-center original"><input      value="original"     class="form-check-input" type="radio" name="damage[front_left_mudguard]" checked=""></td>
                                                    <td class="text-center painted"><input       value="painted"      class="form-check-input" type="radio" name="damage[front_left_mudguard]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal" class="form-check-input" type="radio" name="damage[front_left_mudguard]"></td>
                                                    <td class="text-center changed"><input       value="changed"      class="form-check-input" type="radio" name="damage[front_left_mudguard]"></td>
                                                </tr>
                                                <tr class="front-left-door">
                                                    <td>Sol Ön Kapı</td>
                                                    <td class="text-center original"><input     value="original"      class="form-check-input" type="radio" name="damage[front_left_door]" checked=""></td>
                                                    <td class="text-center painted"><input      value="painted"       class="form-check-input" type="radio" name="damage[front_left_door]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal" class="form-check-input" type="radio" name="damage[front_left_door]"></td>
                                                    <td class="text-center changed"><input      value="changed"      class="form-check-input" type="radio" name="damage[front_left_door]"></td>
                                                </tr>
                                                <tr class="rear-left-door">
                                                    <td>Sol Arka Kapı</td>
                                                    <td class="text-center original"><input  value="original"     class="form-check-input" type="radio" name="damage[rear_left_door]" checked=""></td>
                                                    <td class="text-center painted"><input  value="painted"      class="form-check-input" type="radio" name="damage[rear_left_door]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal" class="form-check-input" type="radio" name="damage[rear_left_door]"></td>
                                                    <td class="text-center changed"><input  value="changed"      class="form-check-input" type="radio" name="damage[rear_left_door]"></td>
                                                </tr>
                                                <tr class="rear-left-mudguard">
                                                    <td>Sol Arka Çamurluk</td>
                                                    <td class="text-center original"><input value="original"      class="form-check-input" type="radio" name="damage[rear_left_mudguard]" checked=""></td>
                                                    <td class="text-center painted"><input value="painted"       class="form-check-input" type="radio" name="damage[rear_left_mudguard]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal"  class="form-check-input" type="radio" name="damage[rear_left_mudguard]"></td>
                                                    <td class="text-center changed"><input value="changed"       class="form-check-input" type="radio" name="damage[rear_left_mudguard]"></td>
                                                </tr>
                                                <tr class="rear-hood">
                                                    <td>Bagaj Kapağı</td>
                                                    <td class="text-center original"><input value="original"     class="form-check-input" type="radio" name="damage[rear_hood]" checked=""></td>
                                                    <td class="text-center painted"><input value="painted"      class="form-check-input" type="radio" name="damage[rear_hood]"></td>
                                                    <td class="text-center paintedlocal"><input value="paintedlocal" class="form-check-input" type="radio" name="damage[rear_hood]"></td>
                                                    <td class="text-center changed"><input value="changed"      class="form-check-input" type="radio" name="damage[rear_hood]"></td>
                                                </tr>
                                                <tr class="rear-bumper">
                                                    <td>Arka Tampon</td>
                                                    <td class="text-center original"><input   value="original"      class="form-check-input" type="radio" name="damage[rear_bumper]" checked=""></td>
                                                    <td class="text-center painted"><input  value="painted"        class="form-check-input" type="radio" name="damage[rear_bumper]"></td>
                                                    <td class="text-center paintedlocal"><input  value="paintedlocal"   class="form-check-input" type="radio" name="damage[rear_bumper]"></td>
                                                    <td class="text-center changed"><input  value="changed"        class="form-check-input" type="radio" name="damage[rear_bumper]"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <select name="tramer" id="tramer" class="form-control" required>
                                    <option value="1" @if($customer_car && $customer_car->tramer == 1)   selected @endif>Tramer Yok</option>
                                    <option value="2" @if($customer_car && $customer_car->tramer == 2)  selected @endif>Tramer Var</option>
                                    <option value="3" @if($customer_car && $customer_car->tramer == 3)  selected @endif>Ağır Hasar Kayıtlı</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input name="tramer_price" id="tramerValue" type="text" class="form-control" value="{{@$customer_car->tramerValue}}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input name="tramer_image" id="tramerPhoto" type="file" class="form-control">
                                @if(@$customer_car && !is_null($customer_car->tramerPhoto))
                                <img style="width: 60px;height: 60px" src="{{asset('storage/cars')}}/{{@$customer_car->tramer_photo}}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button name="submit" type="submit" value="Submit" class="btn btn-primary gradient border-0 rounded-md btn-block">Devam Et</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="{{asset('view/js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->
    <script src="{{asset('view/js/custom.js')}}"></script><!-- CUSTOM JS -->
    <script src="{{asset('view/js/damage.js')}}"></script><!-- CUSTOM JS -->
    <script>
        $(".car-parts .front-bumper").removeClass("original").addClass("original");
        $("tr.front-bumper td.original input").prop("checked", true);

        $(".car-parts .front-hood").removeClass("original").addClass("original");
        $("tr.front-hood td.original input").prop("checked", true);

        $(".car-parts .roof").removeClass("original").addClass("original");
        $("tr.roof td.original input").prop("checked", true);

        $(".car-parts .front-right-mudguard").removeClass("original").addClass("original");
        $("tr.front-right-mudguard td.original input").prop("checked", true);

        $(".car-parts .front-right-door").removeClass("original").addClass("original");
        $("tr.front-right-door td.original input").prop("checked", true);

        $(".car-parts .rear-right-door").removeClass("original").addClass("original");
        $("tr.rear-right-door td.original input").prop("checked", true);

        $(".car-parts .rear-right-mudguard").removeClass("original").addClass("original");
        $("tr.rear-right-mudguard td.original input").prop("checked", true);

        $(".car-parts .front-left-mudguard").removeClass("original").addClass("original");
        $("tr.front-left-mudguard td.original input").prop("checked", true);

        $(".car-parts .rear-left-door").removeClass("original").addClass("original");
        $("tr.rear-left-door td.original input").prop("checked", true);

        $(".car-parts .durum_sasi").removeClass("original").addClass("Var");
        $("tr.durum_sasi td.Var input").prop("checked", true);

        $(".car-parts .durum_direk").removeClass("original").addClass("Yok");
        $("tr.durum_direk td.Yok input").prop("checked", true);

        $(".car-parts .durum_podye").removeClass("original").addClass("Yok");
        $("tr.durum_podye td.Yok input").prop("checked", true);

        $(".car-parts .durum_airbag").removeClass("original").addClass("Yok");
        $("tr.durum_airbag td.Yok input").prop("checked", true);

        $(".car-parts .durum_satilamaz").removeClass("original").addClass("Hayır");
        $("tr.durum_satilamaz td.Hayır input").prop("checked", true);

        $(".car-parts .durum_onArkaBagaj").removeClass("original").addClass("Evet");
        $("tr.durum_onArkaBagaj td.Evet input").prop("checked", true);

        $(".car-parts .durum_km").removeClass("original").addClass("Evet");
        $("tr.durum_km td.Evet input").prop("checked", true);

        $(".car-parts .durum_lastik").removeClass("original").addClass("Orta");
        $("tr.durum_lastik td.Orta input").prop("checked", true);

        $("#tramer").val({{@$customer_car->tramer}});


        $("#tramer").on("change", function(){
            if( $(this).val() == 2 || $(this).val() == 3 ){
                $("#tramerValue").prop("disabled", false).prop("required", true);
                $("#tramerPhoto").prop("disabled", false).prop("required", true);
            } else if($(this).val() == 1) {
                $("#tramerValue").prop("disabled", true).prop("required", false);
                $("#tramerPhoto").prop("disabled", true).prop("required", false);
            }else{
                $("#tramerValue").prop("disabled", true).prop("required", false);
                $("#tramerPhoto").prop("disabled", true).prop("required", false);
            }
        });

    </script>

    <?php
    if($customer_car)
        {
            if ($customer_car->tramer == 2 || $customer_car->tramer == 3)
            {
                ?>
                <script>
                    $("#tramerValue").prop("disabled", false).prop("required", true);
                    $("#tramerPhoto").prop("disabled", false).prop("required", true);
                </script>
                <?php
            }else{ ?>
    <script>
        $("#tramerValue").prop("disabled", true).prop("required", false);
        $("#tramerPhoto").prop("disabled", true).prop("required", false);
    </script>
    <?php }
        }

    ?>



@endsection