@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Değerlemeler</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Değerlemeler</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">
            <div class="d-flex justify-content-end align-items-center">

                <form action="/valuations" method="get" class="custom d-flex justify-content-end align-items-center">

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="dt" value="yes" id="exampleCheck1" {{( ( Request::get("dt") == "yes") ) ? "checked" : ""}}>
                    </div>

                    <select name="m" id="m" class="icon-duotone form-control mr-2">
                        <option value="">Ay</option>
                        @for ($i=1; $i < 13; $i++)
                            @php
                                $i = ( $i < 10 ) ? "0".$i : $i;
                            @endphp
                            <option value="{{$i}}" {{( ($mounth == $i) ) ? "selected" : ""}}>{{$i}}</option>
                        @endfor
                    </select>
                    <select name="y" id="y" class="icon-duotone form-control mr-4">
                        @foreach ($years as $year)
                            <option value="{{$year}}" {{( ($this_year == $year) ) ? "selected" : ""}}>{{$year}}</option>
                        @endforeach
                    </select>

                    <select name="state" id="state" class="form-control mr-2">
                        <option value="">Tüm Durumlar</option>
                        <option value="0" {{( isset($_GET["state"]) && $_GET["state"] == "0" ) ? "selected" : ""}}>Onaya Gelmedi</option>
                        <option value="1" {{( isset($_GET["state"]) && $_GET["state"] == "1" ) ? "selected" : ""}}>Onay Bekliyor</option>
                        <option value="2" {{( isset($_GET["state"]) && $_GET["state"] == "2" ) ? "selected" : ""}}>Rapor Gönderildi</option>
                    </select>
                    <select name="agent_id" id="agent_id" class="form-control mr-2">
                        <option value="">Danışman Seçiniz</option>
                        @foreach ( $experts as $expert )
                            <option value="{{$expert->id}}" {{( Request::get("agent_id")==$expert->id ) ? "selected" : ""}}>{{$expert->firstname}} {{$expert->lastname}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fad fa-search"></i></button>
                    @if ( Request::get("agent_id") || strlen(Request::get("state")) > 0 )
                        <a href="/valuations" type="submit" class="btn btn-sm btn-warning ml-1"><i class="fad fa-sync"></i></a>
                    @endif
                </form>

            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <table class="valuations table table-striped table-bordered table-hover mb-0">
            <thead class="thead-light">
            <tr>
                <th width="40" class="text-center">#</th>
                <th width="150" class="text-left">Sahibi</th>
                <th width="150" class="text-left">Alıcı</th>
                <th class="text-left">Marka / İsim</th>
                <th width="100" class="text-center">Plaka</th>
                <th width="100" class="text-center">Kayıt Zamanı</th>
                <th width="80" class="text-center">Enb İyi Fiyat</th>
                <th width="115" class="text-center">Değerlemeci</th>
                <th width="110" class="text-center">Durum</th>
                <th width="160" class="text-center" colspan="2">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>
            @if ( empty($customer_car_valuations))
                <tr>
                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç kayıt yok!</td>
                </tr>
            @else
                @foreach($customer_car_valuations  as $customer_car_valuation)
                    <tr id="carRow-1">
                        <td class="text-center">{{$customer_car_valuation->id}}</td>
                        <td class="text-left">{{@$customer_car_valuation->customer->firstname}} {{@$customer_car_valuation->customer->lastname}}</a></td>
                        <td class="text-center">{{$customer_car_valuation->buyer_id}}</td>

                        <td class="text-left">{{@$customer_car_valuation->car->name}} - {{@$customer_car_valuation->car->brand->name}}</td>
                        <td class="text-center">{{@$customer_car_valuation->plate}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($customer_car_valuation->created_at)->format('d-m-Y')}}</td>
                        <td class="text-left">{{$customer_car_valuation->gal_price_1}} ₺</td>
                        <td class="text-left">{{$customer_car_valuation->expert->firstname}} {{$customer_car_valuation->expert->lastname}}</td>
                        <td class="text-center">
                            @if ( $customer_car_valuation->status == 0 )
                                <span class="text-danger">Onaya Gelmedi</span>
                            @elseif ( $customer_car_valuation->status == 1 )
                                <span class="text-warning">Onay Bekliyor</span>
                            @elseif ( $customer_car_valuation->status == 2 )
                                <span class="text-info">Rapor Gönderildi</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ( $customer_car_valuation->status == 0 )
                                <span class="btn btn-xs btn-danger w-100"><i class="fad fa-times mr-1"></i> İşlem Yapılamaz</span>
                            @else
                                @if ( $customer_car_valuation->status == 1 )
                                    <a href="javascript:;" data-valuationid="{{$customer_car_valuation->id}}" class="confirm btn btn-xs btn-primary"><i class="fad fa-check mr-1"></i> Onayla</a>
                                    <a href="javascript:;" data-valuationid="{{$customer_car_valuation->id}}" class="reject btn btn-xs btn-warning"><i class="fad fa-reply mr-1"></i> Tekrarla</a>
                                @elseif ( $customer_car_valuation->status == 2 )
                                    <a href="javascript:;" data-valuationid="{{$customer_car_valuation->id}}" class="reject btn btn-xs btn-warning w-100"><i class="fad fa-reply mr-1"></i> Tekrarla</a>
                                @endif
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-xs btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fad fa-times mr-1"></i> İptal </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="0">Detay</a>
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="0">Resimler</a>
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="1">SMS ile Kaldır</a>
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="0">Sessiz Kaldır</a>
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="0">Mesajlaşma</a>
                                    <a class="dropdown-item cancel" href="#"  data-valuationid="{{$customer_car_valuation->id}}" data-sendsms="0">Değerlendirme Raporu</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        {!!@$paginationLinks!!}

    </div>

    <style media="screen">

        .valuations td {
            padding: 4px !important;
            font-size: 12px !important
        }

        form.custom select.form-control {
            display: inline-block !important;
            border-radius: 3px !important;
            font-family: Arial;
            font-size: 12px;
            padding: 6px;
            height: auto !important;
            width: auto
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){

            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            $("#show_completed").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "/valuations?completed=show";
                } else {
                    window.location.href = "/valuations";
                }
            });

            $(".valuations a.complete").on("click", function(){

                let valuationid = $(this).data("valuationid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu raporu kapatmak istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1bc7b2",
                    confirmButtonText: 'Evet, kapat!',
                    confirmButtonAriaLabel: '',
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/valuations/"+valuationid+"/complete", function(r){
                        if( r.status == "success" ){
                            window.location.reload();
                        }
                    }, "json");
                });

            });

            $(".valuations a.confirm").on("click", function(){

                let valuationid = $(this).data("valuationid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu raporu onaylamak istediğinize emin misiniz?\nBu rapor'un linki, kullanıcıya sms olarak gönderilecek.",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1bc7b2",
                    confirmButtonText: 'Evet, onayla!',
                    confirmButtonAriaLabel: '',
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/valuations/"+valuationid+"/confirm", function(r){
                        if( r.status == "success" ){
                            window.location.reload();
                        }
                    }, "json");
                });

            });

            $(".valuations a.reject").on("click", function(){

                let valuationid = $(this).data("valuationid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu raporu geri göndermek istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, gönder!",
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/valuations/"+valuationid+"/reject", function(r){
                        if( r.status == "success" ){
                            window.location.reload();
                        }
                    }, "json");
                });

            });


            $(".valuations a.cancel").on("click", function(){

                let valuationid = $(this).data("valuationid");
                let sendsms = $(this).data("sendsms");

                let confirmText = ( sendsms ) ? "SMS Gönder ve Kaldır" : "Sessiz Kaldır";

                swal({
                    title: "Emin misiniz?",
                    text: "Bu raporu tamamen kaldırmak istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1bc7b2",
                    confirmButtonText: confirmText,
                    closeOnConfirm: false,
                }, ()=>{
                    $.post("/valuations/"+valuationid+"/cancel", { sendsms:sendsms }, function(r){
                        if( r.status == "success" ){
                            window.location.reload();
                        }
                    }, "json");
                });

            });

        });
    </script>

@endsection
