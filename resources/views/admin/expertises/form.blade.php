@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Ekpertiz {{(@$expertis) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="/customers">Ekpertiz</a></li>
                <li class="breadcrumb-item active"><strong>Ekpertiz {{(@$expertis->id) ? "Düzenle":"Ekle"}}
                        : {{@$expertis->name}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a href="{{route('admin.expertises.index')}}" class="btn btn-sm btn-secondary"><i
                        class="fad fa-reply mr-1"></i> Geri Dön</a>

        </div>
    </div>
    <div class="wrapper wrapper-content">

        <div class="tabs-container">
            <div class="tab-content">

                <div role="tabpanel" id="general" class="tab-pane active">
                    <div class="panel-heading" style="background: white">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">

                        <form action="@if(!empty($expertis)){{route('admin.expertises.update')}} @else {{route('admin.expertises.store')}} @endif" method="post">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{@$expertis->id}}">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="firstname">Ekpertiz İsmi <span class="text-danger">*</span></label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" value="{{old('firstname', @$expertis->name)}}" placeholder="Ekpertiz ismi yazın..." autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Ekpertiz Telefonu <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone', @$expertis->phone)}}" placeholder="Ekpertiz telefonu yazın..."
                                               autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">Ekpertiz E-Posta <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{old('email', @$expertis->email)}}"
                                               placeholder="Ekpertiz e-posta adresi yazın..." autocomplete="off"
                                               required>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="city">Ekpertiz İl</label>
                                        <select name="city" id="city" class="custom-select">
                                            <option value="">Seçim yapın...</option>
                                            @foreach ($cities as $city)
                                                <option value="{{$city->id}}"   {{($city->id == old('city',@$expertis->city_id))?'selected':''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="state">Ekpertiz İlçe</label>
                                        <select name="state" id="state" class="custom-select">
                                            <option value="">Seçim yapın...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center">
                                <div class="custom-control custom-checkbox mt-3 mr-4">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input"
                                           id="status" {{ ( @$expertis == "" or @$expertis->status == 1 ) ? "checked" : "" }}>
                                    <label class="custom-control-label" for="status">Aktif</label>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="buttons">
                                <button type="submit" class="btn btn-sm btn-primary mr-1"><i
                                            class="fad fa-save mr-1"></i> Kaydet
                                </button>
                                <a href="/customers" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i>
                                    Vazgeç</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <style media="screen">
        .popover-header {
            font-size: 12px;
        }

        .popover-body {
            font-size: 11px;
        }
    </style>

    <script type="text/javascript">
        $(function () {

            $(window).on('hashchange', function () {
                $(".nav-tabs a[href='" + window.location.hash + "']").click();
            });

            $('#CustomerTabs a.nav-link').on('click', function (e) {
                e.preventDefault();
                window.location.hash = $(this).attr("href");
            });

            if (window.location.hash.length > 0) {
                $(".nav-tabs a[href='" + window.location.hash + "']").click();
            }

            $("#AdminCommentsForm").on("submit", function (e) {

                e.preventDefault();

                var customer_id = $("#customer_id").val();
                var comment = $("#comment").val();

                $.post("/customers/comments/save", {customer_id: customer_id, comment: comment}, function (r) {
                    if (r.status == "success") {
                        window.location.reload();
                    }
                }, "json");

            });

            $("a.comment_delete").on("click", function () {

                let parenttr = $(this).parents("tr");
                let comment_id = $(this).data("commentid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu kaydı silmek istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, sil!",
                    closeOnConfirm: false
                }, () => {
                    $.post("/customers/comments/delete", {comment_id: comment_id}, function () {

                        $(parenttr).remove();

                        if (!$("#comments_table tbody tr").length) {
                            $("#comments_table tbody").append('<tr><td colspan="10" class="text-center bg-white" height="80">Henüz hiç not eklenmemiş!</td></tr>');
                        }

                        swal({
                            title: "Silindi!",
                            text: "Kayıt başarıyla silindi.",
                            type: "success",
                            confirmButtonColor: "#1a7bb9",
                            confirmButtonText: "Tamam"
                        });

                    });
                });

            });

            $("#city").on("change", function () {
                loadstates($(this).val());
            });

            @if(@$expertis)
            if ({{old('city',@$expertis->city)}}) {
                loadstates({{old('city',@$expertis->city)}}, {{old('state',@$expertis->state)}});
            }
            @endif
         });

        function loadstates(city_id, state_id="") {

            $.get("/admin/setting/city/" + city_id, function (r) {

                $("#state").html("<option value=''>Seçim yapın...</option>");

                $.each(r, function (i, item) {
                    let selected = (state_id == item.id) ? "selected" : "";
                    $("#state").append("<option value='" + item.id + "' " + selected + ">" + item.name + "</option>");
                });

            }, "json");

        }

    </script>

@endsection
