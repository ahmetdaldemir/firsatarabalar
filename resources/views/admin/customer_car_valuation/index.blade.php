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
                        <input type="checkbox" class="form-check-input" name="dt" value="yes"
                               id="exampleCheck1" {{( ( Request::get("dt") == "yes") ) ? "checked" : ""}}>
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
                        <option value="0" {{( isset($_GET["state"]) && $_GET["state"] == "0" ) ? "selected" : ""}}>Onaya
                            Gelmedi
                        </option>
                        <option value="1" {{( isset($_GET["state"]) && $_GET["state"] == "1" ) ? "selected" : ""}}>Onay
                            Bekliyor
                        </option>
                        <option value="2" {{( isset($_GET["state"]) && $_GET["state"] == "2" ) ? "selected" : ""}}>Rapor
                            Gönderildi
                        </option>
                    </select>
                    @role('Admin')
                    <select name="agent_id" id="agent_id" class="form-control mr-2">
                        <option value="">Danışman Seçiniz</option>
                        @foreach ( $experts as $expert )
                            <option value="{{$expert->id}}" {{( Request::get("agent_id")==$expert->id ) ? "selected" : ""}}>{{$expert->name}}</option>
                        @endforeach
                    </select>
                    @endrole
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fad fa-search"></i></button>
                    @if ( Request::get("agent_id") || strlen(Request::get("state")) > 0 )
                        <a href="/valuations" type="submit" class="btn btn-sm btn-warning ml-1"><i
                                    class="fad fa-sync"></i></a>
                    @endif
                </form>

            </div>
        </div>
    </div>

    <div ng-controller="postController">
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
                            <td class="text-center"><a
                                        href="{{route('admin.customer_car_valuation.edit',['id' => $customer_car_valuation->id])}}">{{$customer_car_valuation->id}}</a>
                            </td>
                            <td class="text-left">{{@$customer_car_valuation->customer->firstname}} {{@$customer_car_valuation->customer->lastname}}</a></td>
                            <td class="text-center">{{$customer_car_valuation->buyer_id}}</td>

                            <td class="text-left">{{@$customer_car_valuation->car->name}}  - {{@$customer_car_valuation->car->brand->name}}</td>
                            <td class="text-center"><a href="{{route('admin.customer_car_valuation.edit',['id' =>$customer_car_valuation->id ])}}">{{@$customer_car_valuation->plate}} </a></td>
                            <td class="text-center">{{\Carbon\Carbon::parse($customer_car_valuation->created_at)->format('d-m-Y')}}</td>
                            <td class="text-left">{{$customer_car_valuation->gal_price_1}} ₺</td>
                            <td class="text-left">{{$customer_car_valuation->exper->name ?? NULL}}</td>

                            <td class="text-center">
                                <select style="background:#{{\App\Enums\CustomerCarStatus::Status[$customer_car_valuation->status]['color']}} " onchange="statuschange(this,{{$customer_car_valuation->id}})"
                                        class="btn btn-xs btn-danger w-50">
                                    <?php foreach ($status as $key => $value){ ?>
                                    <option @if($customer_car_valuation->status == $key) selected @endif value="<?=$key?>"><?=$value['text']?></option>
                                    <?php } ?>
                                </select>
                                <?php $ccv = \App\Models\CustomerCarValuation::where('customer_car_id',$customer_car_valuation->id)->first();  ?>
                                @if($ccv && $ccv->status == 1)
                                 <a target="_blank" href="{{route('pdf',['id' => $customer_car_valuation->id])}}" class="btn btn-xs btn-success"><i class="fa fa-share"></i></a>
                                @endif
                             </td>
                            <td>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            {!!@$paginationLinks!!}

        </div>


        <div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="agentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agentModalLabel">Değerlendirmeci Seçiniz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="submitForm" ng-submit="submitForm()">
                        <input name="customer_car_id" id="customer_car_id" type="hidden">
                        <div class="modal-body">

                            <select name="expert" class="form-control">
                                @foreach($experts as $expert)
                                    <option value="{{$expert->id}}">{{$expert->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Atama Yap</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
        $(document).ready(function () {

            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            $("#show_completed").on("change", function () {
                if ($(this).prop("checked") == true) {
                    window.location.href = "/valuations?completed=show";
                } else {
                    window.location.href = "/valuations";
                }
            });

            $(".valuations a.complete").on("click", function () {

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
                }, () => {
                    $.post("/valuations/" + valuationid + "/complete", function (r) {
                        if (r.status == "success") {
                            window.location.reload();
                        }
                    }, "json");
                });

            });

            $(".valuations a.confirm").on("click", function () {

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
                }, () => {
                    $.post("/valuations/" + valuationid + "/confirm", function (r) {
                        if (r.status == "success") {
                            window.location.reload();
                        }
                    }, "json");
                });

            });

            $(".valuations a.reject").on("click", function () {

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
                }, () => {
                    $.post("/valuations/" + valuationid + "/reject", function (r) {
                        if (r.status == "success") {
                            window.location.reload();
                        }
                    }, "json");
                });

            });

            $(".valuations a.cancel").on("click", function () {

                let valuationid = $(this).data("valuationid");
                let sendsms = $(this).data("sendsms");

                let confirmText = (sendsms) ? "SMS Gönder ve Kaldır" : "Sessiz Kaldır";

                swal({
                    title: "Emin misiniz?",
                    text: "Bu raporu tamamen kaldırmak istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1bc7b2",
                    confirmButtonText: confirmText,
                    closeOnConfirm: false,
                }, () => {
                    $.post("/valuations/" + valuationid + "/cancel", {sendsms: sendsms}, function (r) {
                        if (r.status == "success") {
                            window.location.reload();
                        }
                    }, "json");
                });

            });
        });

        function statuschange(key, id) {
            if (key.value == 2) {
                $("#agentModal").modal('show');
                $("#agentModal").find("#customer_car_id").val(id);
            }
        }
    </script>


    <script>
        var postApp = angular.module('app', []);
        postApp.controller('postController', function ($scope, $http) {
            $scope.user = {};
            $scope.submitForm = function () {

                $http({
                    method: 'POST',
                    url: '/admin/assignmentDo',
                    data: $("#submitForm").serialize(),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(data) {
                    $("#agentModal").modal('hide');
                    swal(data.data);
                }, function errorCallback(response) {
                    $("#agentModal").modal('hide');
                    swal(response.data);
                });
            };
        });
    </script>

@endsection
