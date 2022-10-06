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
            <div class="row align-items-center">
                @include('new_view/car/menu',['url' => request()->route()->getName()])

                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" method="POST" action="{{route('form3')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="customer_id" value="{{auth()->id()}}">
                        <input type="hidden" class="form-control" name="customer_car_id" value="{{$customer_car_id}}">
                        <div class="row">
                            <div class="col-sm-12 mb-4">

                                <div class="car-damage-wrapper">

                                    <div class="row">
                                        <div class="col-lg-5 text-center">

                                            <div class="damage-area">
                                                <div class="car-parts">
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
                                                </div>
                                            </div>

                                            <div class="color-desc mt-4">
                                                <div class="form-check form-check-inline original">
                                                    <input class="form-check-input" type="radio" name="d1" checked>
                                                    <label class="form-check-label">Orjinal</label>
                                                </div>
                                                <div class="form-check form-check-inline painted">
                                                    <input class="form-check-input" type="radio" name="d2" checked>
                                                    <label class="form-check-label">Boyalı</label>
                                                </div>
                                                <div class="form-check form-check-inline paintedlocal">
                                                    <input class="form-check-input" type="radio" name="d3" checked>
                                                    <label class="form-check-label">Lokal Boyalı</label>
                                                </div>
                                                <div class="form-check form-check-inline changed">
                                                    <input class="form-check-input" type="radio" name="d4" checked>
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
                                                        <td class="text-center original"><input class="form-check-input"
                                                                                                type="radio" value="original"
                                                                                                name="damage[front-bumper]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input"
                                                                                               type="radio" value="painted"
                                                                                               name="damage[front-bumper]"></td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[front-bumper]"></td>
                                                        <td class="text-center changed"><input class="form-check-input"
                                                                                               type="radio" value="changed"
                                                                                               name="damage[front-bumper]"></td>
                                                    </tr>
                                                    <tr class="front-hood">
                                                        <td>Motor Kaputu</td>
                                                        <td class="text-center original"><input class="form-check-input"
                                                                                                type="radio" value="original"
                                                                                                name="damage[front-hood]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input"
                                                                                               type="radio" value="painted"
                                                                                               name="damage[front-hood]"></td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[front-hood]"></td>
                                                        <td class="text-center changed"><input class="form-check-input"
                                                                                               type="radio" value="changed"
                                                                                               name="damage[front-hood]"></td>
                                                    </tr>
                                                    <tr class="roof">
                                                        <td>Tavan</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio" name="damage[roof]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio" name="damage[roof]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio" name="damage[roof]">
                                                        </td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio" name="damage[roof]">
                                                        </td>
                                                    </tr>
                                                    <tr class="front-right-mudguard">
                                                        <td>Sağ Ön Çamurluk</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[front-right-mudguard]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="damage[form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[front-right-mudguard]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[front-right-mudguard]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[front-right-mudguard]">
                                                        </td>
                                                    </tr>
                                                    <tr class="front-right-door">
                                                        <td>Sağ Ön Kapı</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[front-right-door]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[front-right-door]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[front-right-door]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[front-right-door]">
                                                        </td>
                                                    </tr>
                                                    <tr class="rear-right-door">
                                                        <td>Sağ Arka Kapı</td>
                                                        <td class="text-center original"><input class="form-check-input"
                                                                                                type="radio" value="original"
                                                                                                name="damage[rear-right-door]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-right-door]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[rear-right-door]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[rear-right-door]">
                                                        </td>
                                                    </tr>
                                                    <tr class="rear-right-mudguard">
                                                        <td>Sağ Arka Çamurluk</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[rear-right-mudguard]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-right-mudguard]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[rear-right-mudguard]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[rear-right-mudguard]">
                                                        </td>
                                                    </tr>
                                                    <tr class="front-left-mudguard">
                                                        <td>Sol Ön Çamurluk</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[front-left-mudguard]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[front-left-mudguard]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[front-left-mudguard]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[front-left-mudguard]">
                                                        </td>
                                                    </tr>
                                                    <tr class="front-left-door">
                                                        <td>Sol Ön Kapı</td>
                                                        <td class="text-center original"><input class="form-check-input"value="original"
                                                                                                type="radio"
                                                                                                name="damage[front-left-door]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[front-left-door]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[front-left-door]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[front-left-door]">
                                                        </td>
                                                    </tr>
                                                    <tr class="rear-left-door">
                                                        <td>Sol Arka Kapı</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[rear-left-door]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-left-door]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[rear-left-door]"></td>
                                                        <td class="text-center changed"><input class="form-check-input"
                                                                                               type="radio" value="changed"
                                                                                               name="damage[rear-left-door]">
                                                        </td>
                                                    </tr>
                                                    <tr class="rear-left-mudguard">
                                                        <td>Sol Arka Çamurluk</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[rear-left-mudguard]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-left-mudguard]">
                                                        </td>
                                                        <td class="text-center paintedlocal"><input value="paintedlocal"
                                                                    class="form-check-input" type="radio"
                                                                    name="damage[rear-left-mudguard]"></td>
                                                        <td class="text-center changed"><input class="form-check-input"
                                                                                               type="radio" value="changed"
                                                                                               name="damage[rear-left-mudguard]">
                                                        </td>
                                                    </tr>
                                                    <tr class="rear-hood">
                                                        <td>Bagaj Kapağı</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[rear-hood]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-hood]"></td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[rear-hood]"></td>
                                                        <td class="text-center changed"><input class="form-check-input" value="changed"
                                                                                               type="radio"
                                                                                               name="damage[rear-hood]"></td>
                                                    </tr>
                                                    <tr class="rear-bumper">
                                                        <td>Arka Tampon</td>
                                                        <td class="text-center original"><input class="form-check-input" value="original"
                                                                                                type="radio"
                                                                                                name="damage[rear-bumper]"
                                                                                                checked></td>
                                                        <td class="text-center painted"><input class="form-check-input" value="painted"
                                                                                               type="radio"
                                                                                               name="damage[rear-bumper]"></td>
                                                        <td class="text-center paintedlocal"><input
                                                                    class="form-check-input" type="radio" value="paintedlocal"
                                                                    name="damage[rear-bumper]"></td>
                                                        <td class="text-center changed"><input class="form-check-input"
                                                                                               type="radio" value="changed"
                                                                                               name="damage[rear-bumper]"></td>
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
                                        <option value="1" selected>Tramer Yok</option>
                                        <option value="2">Tramer Var</option>
                                        <option value="3">Ağır Hasar Kayıtlı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input name="tramer_price" id="tramerValue" type="text" class="form-control"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input name="tramer_image" id="tramerPhoto" type="file" class="form-control"
                                           disabled>

                                </div>
                            </div>
                            <div class="col-sm-12" style="    margin: 20px 0;">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fad fa-long-arrow-right me-1"></i> Devam Et
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('before-css')
    <link rel="stylesheet" href="{{asset('new_view/css/car-damage.css')}}">
@endsection
@section('body-before-js')
    <script src="{{asset('new_view/js/car-damage.js')}}"></script>




    <!-- script src="asset('view/js/dz.ajax.js')}}"></--script>
    <script src="asset('view/js/custom.js')}}"></script>  -->
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

       // $("#tramer").val(1);
        //$("#tramer").val({{@$customer_car->tramer}});


        $("#tramer").on("change", function () {
            var value = $(this).val();
            if(value === '2') {
                $("#tramerValue").prop("disabled", false).prop("required", true);
                $("#tramerPhoto").prop("disabled", false).prop("required", true);
                return false;
            } else if (value == 1) {
                $("#tramerValue").prop("disabled", true).prop("required", false);
                $("#tramerPhoto").prop("disabled", true).prop("required", false);
                return false;
            } else if (value == 3) {
                $("#tramerValue").prop("disabled", false).prop("required", true);
                $("#tramerPhoto").prop("disabled", false).prop("required", true);
                return false;
            }
        });

    </script>

@endsection
