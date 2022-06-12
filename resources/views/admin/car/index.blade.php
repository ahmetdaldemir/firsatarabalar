@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç Yönetimi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Araçlar</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">
            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" class="custom-control-input" id="show_all" {{ ( Request::get("show") == "all" ) ? "checked" : "" }}>
                <label class="custom-control-label" for="show_all" style="padding-top: 2px">Tüm Araçları Göster</label>
            </div>

            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" class="custom-control-input" id="deleted" {{ ( Request::get("deleted") == "show" ) ? "checked" : "" }}>
                <label class="custom-control-label" for="deleted" style="padding-top: 2px">Silinen Araçları Göster</label>
            </div>

        </div>
    </div>

    <div class="wrapper wrapper-content">

        <table id="Cars" class="cars table table-striped table-bordered table-hover mb-0">
            <thead class="thead-light">
            <tr>
                <th width="40" class="text-center">#</th>
               <th class="text-left">Marka / İsim</th>
                <th width="100" class="text-center">Model</th>
                <th width="100" class="text-center">Yakıt</th>
                <th width="110" class="text-center">Kasa</th>
                <th width="120" class="text-center">Vites</th>
                <th width="140" class="text-center">Beygir</th>
                <th colspan="3" class="text-center">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>
            @if ( empty($cars) )
                <tr>
                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç araç yok!</td>
                </tr>
            @else
                @foreach ( $cars as $car )
                    <tr id="carRow-{{$car->id}}">
                        <td class="text-center">{{$car->id}}</td>
                        <td class="text-left">{{@$car->brand_name}} / {{$car->name}}</td>
                        <td class="text-center">{{$car->model}}</td>
                        <td class="text-center">{{$car->fuel()}}</td>
                        <td class="text-center">{{$car->body()}}</td>
                        <td class="text-center">{{$car->transmission()}}</td>
                        <td class="text-center">{{$car->horse}} KW</td>
                        <td width="45">
                            <a href="javascript:;" class="btn btn-xs btn-dark" onclick="deleteCar({{$car->id}});"><i class="fad fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>


    <style media="screen">

        .item {
            border: 4px solid #e2e2e2;
            border-radius: 8px
        }

        .item img {
            border-radius: 4px !important;
        }

        .item.active {
            border-color: #65e8b0;
        }

        .btn-sec {
            background: #b6b8c6;
            border-color: #b6b8c6
        }

        .dropdown-toggle {
            box-shadow: none !important
        }

        .dropdown-menu {
            padding: 6px 0;
            min-width: 6rem;
        }

        .dropdown-menu .dropdown-item {
            padding: 6px 16px;
        }

        .dropdown-menu .dropdown-divider {
            margin: 0.2rem 0;
        }

    </style>

    <script type="text/javascript">

        function deleteCar( car_id ){
            swal({
                title: "Emin misiniz?",
                text: "Bu kaydı kaldırmak istediğinize emin misiniz?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Hayır",
                confirmButtonColor: "#1a7bb9",
                confirmButtonText: "Evet, kaldır!",
                closeOnConfirm: false
            }, ()=>{
                $.get("/admin/car/deleted",{
                   "_token": "{{ csrf_token() }}",
                   "id": car_id,
            },
                function(r){
                    if(r.status == "success" ){ swal.close(); }
                }, "json");
            });
        }


        $(document).ready(function(){

            $("#show_all").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "/cars?show=all";
                } else {
                    window.location.href = "/cars";
                }
            });

            $("#deleted").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "/cars?deleted=show";
                } else {
                    window.location.href = "/cars";
                }
            });

            $('#chance_price, #sold_price').mask('000.000.000.000.000', {reverse: true});

            $("#Cars a.confirm").on("click", function(){

                let carid = $(this).data("carid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu kaydı onaylamak istediğinize emin misiniz?",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, onayla!",
                    closeOnConfirm: false
                }, ()=>{
                    swal.close();
                    $("#atamaModal").modal("show").on("shown.bs.modal", function(e){
                        $("#car_id").val(carid);
                    });
                });

            });

            $("#atamaModal .save").on("click", function(){

                var car_id = $("#car_id").val();
                var agent = $("#agent").val();

                $.post("/cars/assign", { car_id:car_id, agent_id:agent }, function(r){
                    $("#AgentSelection")[0].reset();
                    $("#atamaModal").modal("hide");
                    window.location.reload();
                }, "json");

            });

            $('#ShowCase').on('show.bs.modal', function(e){
                $('#ShowCase .car-photos').html('');
                $('#ShowCase #chance_price').val('');
                var carid = $(e.relatedTarget).data("carid");
                $.post("/cars/"+carid+"/photos", function(photos){
                    photos.forEach(( group, i) => {
                        var row = $("<div />", { class:'row px-1 mb-4' }).appendTo("#ShowCase .car-photos");
                        group.forEach(( photo, i) => {
                            var item  = "<div class='col-2 px-2'>";
                            item += "   <div class='item' data-carid='"+carid+"' data-photoid='"+photo.id+"'>";
                            item += "       <img src='/Uploads/Cars/Photos/"+photo.photo+"' alt='' class='img-fluid'>";
                            item += "   </div>";
                            item += "</div>";

                            $(row).append(item);
                        });
                    });
                }, "json");

            }).on('hidden.bs.modal', function(e){
                setTimeout(function(){ $('[data-tooltip="tooltip"]').tooltip('hide'); }, 1);
            });

            $(document).on("click", "#ShowCase .car-photos .item", function(){
                $("#ShowCase .car-photos .item").removeClass("active");
                $(this).addClass("active");
            });

            $(document).on("click", "#SoldModal .car-photos .item", function(){
                $("#SoldModal .car-photos .item").removeClass("active");
                $(this).addClass("active");
            });

            $(".sold-btn-add").on("click", function(e){

                $("#SoldModal input[name='car_id']").val('');
                $("#SoldModal input[name='car_id']").val(e.currentTarget.dataset.carid);

                $.post("/cars/"+e.currentTarget.dataset.carid+"/photos", function(photos){
                    photos.forEach(( group, i) => {
                        var row = $("<div />", { class:'row px-1 mb-4' }).appendTo("#SoldModal .car-photos");
                        group.forEach(( photo, i) => {
                            var item  = "<div class='col-2 px-2'>";
                            item += "   <div class='item' data-carid='"+e.currentTarget.dataset.carid+"' data-photoid='"+photo.id+"'>";
                            item += "       <img src='/Uploads/Cars/Photos/"+photo.photo+"' alt='' class='img-fluid'>";
                            item += "   </div>";
                            item += "</div>";

                            $(row).append(item);
                        });
                    });
                }, "json");

                var myModal = new bootstrap.Modal(document.querySelector('#SoldModal'));
                myModal.show();

            });

            $(".sold-btn-remove").on("click", function(){

                let carid = $(this).data("carid");

                swal({
                    title: "Emin misiniz?",
                    text: "Satılan araçlardan kaldırmak istediğinize emin misiniz?",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, kaldır!",
                    closeOnConfirm: false
                }, ()=>{
                    swal.close();
                    window.location.reload();
                });

            });

            $("#car_add_showcase").on("submit", function(e){

                e.preventDefault();

                var photo_id = 0;
                var car_id = 0;

                $("#ShowCase .car-photos .item").each(function( i, item ){
                    if( $(item).hasClass("active") ){
                        photo_id = $(item).data("photoid");
                        car_id = $(item).data("carid");
                    }
                });

                if( photo_id == 0 && car_id == 0 ){
                    alert("Fotoğraf Seçimi yapmadınız!");
                } else {

                    var data = {
                        photo_id:     photo_id,
                        car_id:       car_id,
                        // city_from:    $("#city_from").val(),
                        // city_where:   $("#city_where").val(),
                        chance_price: $("#chance_price").val(),
                        status:       $("#status").val(),
                    };

                    $.post("/cars/showcase/save", data, function(r){
                        if( r.status == "success" ){

                            $("#ShowCase").modal("hide");

                            swal({
                                title: "Başarılı",
                                text: "Seçilen araç vitrine başarıyla eklendi?",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#1a7bb9",
                                confirmButtonText: "Tamam!",
                                closeOnConfirm: true
                            }, ()=>{
                                swal.close();
                                window.location.href = '/settings#slider';
                            });

                        } else {

                            swal({
                                title: "Dikkat!",
                                text: r.message,
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#1a7bb9",
                                confirmButtonText: "Tamam!",
                                closeOnConfirm: true
                            });

                        }
                    }, "json");

                }

            });

            $("#car_add_sold").on("submit", function(e){

                e.preventDefault();

                var form = $(this).serializeObject();

                var photo_id = 0;
                var car_id = 0;

                $("#SoldModal .car-photos .item").each(function( i, item ){
                    if( $(item).hasClass("active") ){
                        photo_id = $(item).data("photoid");
                        car_id   = $(item).data("carid");
                    }
                });

                if( photo_id == 0 && car_id == 0 ){
                    alert("Fotoğraf Seçimi yapmadınız!");
                } else {

                    var data = {
                        car_id:     form.car_id,
                        photo_id:   photo_id,
                        city_from:  form.city_from,
                        city_where: form.city_where,
                        sold_time:  form.sold_time,
                        sold_price: form.sold_price,
                        status:     form.status,
                    };

                    $.post("/cars/solds/save", data, function(r){
                        if( r.status == "success" ){

                            $("#SoldModal").modal("hide");

                            swal({
                                title: "Başarılı",
                                text: "Seçilen araç satılanlara başarıyla eklendi?",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#1a7bb9",
                                confirmButtonText: "Tamam!",
                                closeOnConfirm: true
                            }, ()=>{
                                swal.close();
                                window.location.reload();
                            });

                        } else {

                            swal({
                                title: "Dikkat!",
                                text: r.message,
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#1a7bb9",
                                confirmButtonText: "Tamam!",
                                closeOnConfirm: true
                            });

                        }
                    }, "json");
                }

            });

            $(".showcase-btn-remove").on("click", function(e){
                swal({
                    title: "Emin misiniz?",
                    text: "Bu aracı vitrinden kaldırmak istediğinize emin misiniz?",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, kaldır!",
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/cars/showcase/delete", {car_id:e.currentTarget.dataset.carid}, function(r){
                        if( r.status == "success" ){
                            swal.close();
                            window.location.reload();
                        }
                    }, "json");
                });
            });

            $("#show_deleted").on("change", function(){
                window.location.href = ( $(this).prop("checked") == true ) ? "/cars?deleted=show" : "/cars";
            });

            $(window).on('hashchange', function(){
                $(".nav-tabs a[href='"+ window.location.hash +"']").click();
            });

            $('#CarsTabs a.nav-link').on('click', function (e) {
                e.preventDefault();
                window.location.hash = $(this).attr("href");
            });

            if( window.location.hash.length > 0 ){
                $(".nav-tabs a[href='"+ window.location.hash +"']").click();
            }

        });
    </script>

@endsection
