@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Müşteri {{(@$customer) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="/customers">Müşteriler</a></li>
                <li class="breadcrumb-item active"><strong>Müşteri {{(@$customer->id) ? "Düzenle":"Ekle"}}
                        : {{@$customer->firstname}} {{@$customer->lastname}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a href="{{route('admin.customer.index')}}" class="btn btn-sm btn-secondary"><i
                        class="fad fa-reply mr-1"></i> Geri Dön</a>

        </div>
    </div>
    <div class="wrapper wrapper-content">

        <div class="tabs-container">
            <ul id="CustomerTabs" class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#general"><i class="fad fa-user"></i> Genel
                        Bilgiler</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#cars"><i class="fad fa-cars"></i> Araçları <span
                                class="label label-plain ml-2">{{($cars != NULL) ? count($cars) : 0}}</span></a></a>
                </li>
                <li><a class="nav-link" data-toggle="tab" href="#notes"><i class="fad fa-comment-alt-dots"></i> Müşteri
                        Notları <span class="label label-plain ml-2"></span></a></a>
                </li>
            </ul>
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

                        <form action="{{route('admin.customer.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{@$customer->id}}">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="firstname">Müşteri İsmi <span class="text-danger">*</span></label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname', @$customer->firstname)}}" placeholder="Müşteri ismi yazın..." autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="lastname">Müşteri Soysmi <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname', @$customer->lastname)}}"  placeholder="Müşteri soyismi yazın..."
                                               autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Müşteri Telefonu <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone', @$customer->phone)}}" placeholder="Müşteri telefonu yazın..."
                                               autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">Müşteri E-Posta <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{old('email', @$customer->email)}}"
                                               placeholder="Müşteri e-posta adresi yazın..." autocomplete="off"
                                               required>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="city">Müşteri İl</label>
                                        <select name="city" id="city" class="custom-select">
                                            <option value="">Seçim yapın...</option>
                                            @foreach ($cities as $city)
                                                <option value="{{$city->id}}"   {{($city->id == old('city',@$customer->city))?'selected':''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="state">Müşteri İlçe</label>
                                        <select name="state" id="state" class="custom-select">
                                            <option value="">Seçim yapın...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Müşteri Şifresi</label>
                                        <input type="text" name="password" id="password" class="form-control"
                                               placeholder="Müşteri şifresi yazın..." autocomplete="off">
                                        <small id="passwordHelp" class="form-text text-muted">Yalnızca değiştirmek için
                                            doldurun!</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="smscode">Müşteri SMS Kodu</label>
                                        <input type="text" name="smscode" id="smscode" class="form-control"
                                               placeholder="Müşteri sms kodu..." autocomplete="off"
                                               value="{{@$customer->smscode}}">
                                    </div>
                                </div>
                                <div class="col-8"></div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center">
                                <div class="custom-control custom-checkbox mt-3 mr-4">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input"
                                           id="status" {{ ( @$customer == "" or @$customer->status == 1 ) ? "checked" : "" }}>
                                    <label class="custom-control-label" for="status">Aktif</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input type="checkbox" name="freecar" class="custom-control-input"
                                           id="freecar" {{ ( @$customer == "" or @$customer->freecar ) ? "checked" : "" }}>
                                    <label class="custom-control-label" for="freecar">Ücretsiz Araç Ekleyebilir</label>
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

                <div role="tabpanel" id="cars" class="tab-pane">
                    <div class="panel-body">

                        <table id="Cars" class="cars table table-striped table-bordered table-hover mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th width="40" class="text-center">#</th>
                                <th width="80" class="text-center">Plaka</th>
                                <th class="text-left">Araç Marka / İsim</th>
                                <th width="100" class="text-center">Yakıt</th>
                                <th width="120" class="text-center">Kasa</th>
                                <th width="120" class="text-center">Kayıt Zamanı</th>
                                <th width="200" class="text-center">Atanan</th>
                                <th width="160" class="text-center">İşlem(ler)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ( empty(@$customer->customer_cars) )
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç araç yok!</td>
                                </tr>
                            @else
                                @foreach ( @$customer->customer_cars as $car )
                                    <tr id="carRow-1">
                                        <td class="text-center">{{$car->id}}</td>
                                        <td class="text-center">{{$car->plate}}</td>
                                        <td class="text-left">{{$car->brand->name}}</td>
                                        <td class="text-center">{{$car->fuel}}</td>
                                        <td class="text-center">{{$car->body}}</td>
                                        <td class="text-center">{{$car->date_created}}</td>
                                        <td class="text-center">{{$car->agent}}</td>
                                        <td class="text-center">

                                            @if ( @$car->payment->status == 0 )
                                                <span class="text-danger">Ödeme Bekleniyor</span>
                                            @else
                                                @if(!$car->user_id )
                                                    <a href="javascript:;" data-carid="{{$car->id}}"
                                                       class="confirm btn btn-xs btn-primary"><i
                                                                class="fad fa-check mr-1"></i> Onayla ve Ata</a>
                                                @else
                                                    <a href="javascript:;" class="btn btn-xs btn-warning"><i
                                                                class="fad fa-hourglass-half mr-1"></i> Değerleme
                                                        Bekleniyor</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>


                <div role="tabpanel" id="notes" class="tab-pane">
                    <div class="panel-body">

                        <form action="#" id="AdminCommentsForm" method="post">
                            <input type="hidden" name="customer_id" id="customer_id" value="{{@$customer->id}}">
                            <div class="input-group mb-3">
                                <input id="comment" name="comment" type="text" class="form-control"
                                       placeholder="Yöneticiler için notunuzu yazın..."
                                       aria-label="Yöneticiler için notunuzu yazın..." aria-describedby="addNote"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                                class="fad fa-plus-circle mr-1"></i> Notu Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>

                        <table id="comments_table" class="table table-striped table-hover table-bordered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Not</th>
                                <th width="220" class="text-center">Ekleyen</th>
                                <th width="150" class="text-center">Eklenme Zamanı</th>
                                <th width="80" class="text-center">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (@$customer->comments)
                                @foreach (@$customer->comments as $comment )
                                    <tr>
                                        <td class="text-center">{{$comment->id}}</td>
                                        <td>{{$comment->message}}</td>
                                        <td class="text-center">{{$comment->user->firstname}} {{$comment->user->lastname}} </td>
                                        <td class="text-center">{{$comment->date_created}}</td>
                                        <td class="text-center"><a href="javascript:;"
                                                                   class="comment_delete btn btn-sm btn-danger"
                                                                   data-commentid='{{$comment->id}}'><i
                                                        class="fad fa-trash-alt"></i> Sil</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç not
                                        eklenmemiş!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

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

            @if(@$customer)
            if ({{old('city',@$customer->city)}}) {
                loadstates({{old('city',@$customer->city)}}, {{old('state',@$customer->state)}});
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
