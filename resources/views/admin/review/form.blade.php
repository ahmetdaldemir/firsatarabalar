@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Sabit Sayfa {{(@$review->id) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.reviews.index')}}">Kullanıcı Görüşleri</a></li>
                <li class="breadcrumb-item active"><strong>Sabit Sayfa {{(@$page->id) ? "Düzenle":"Ekle"}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a href="{{route('admin.reviews.index')}}" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i>
                Geri Dön</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title"><h5>Sabit Sayfa Özellikleri</h5></div>
            <div class="ibox-content">

                <form action="{{ (!empty($review->id)) ? "/reviews/".@$review->id."/save" : "/reviews/add" }}" method="post">

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="firstname">İsim <span class="text-danger">*</span></label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{@$Review->firstname}}" placeholder="Gönderen ismi yazın..." autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="lastname">Soyisim <span class="text-danger">*</span></label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{@$Review->lastname}}" placeholder="Gönderen soyismi yazın..." autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="date_created">Zaman <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date_created" id="date_created" class="form-control" value="{{@$Review->date_created}}" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="pageslug">Görüş Metni <span class="text-danger">*</span></label>
                            <textarea name="content" id="content" cols="30" rows="5" class="editor form-control"placeholder="Görüş metni yazın..." autocomplete="off" required>{{@$Review->content}}</textarea>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" name="status" class="custom-control-input" id="status" {{ ( @$Review == "" or @$Review->status ) ? "checked" : "" }}>
                        <label class="custom-control-label" for="status">Aktif</label>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="buttons">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i> Görüşü Kaydet</button>
                        <a href="/reviews" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var editor = new Jodit('.editor', {
                toolbarButtonSize: "small",
                height: 500,
                statusbar: false,
            });
        });
    </script>

@endsection
