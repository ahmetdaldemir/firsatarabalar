@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Sabit Sayfa {{(@$page->id) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.page.index')}}">Sabit Sayfalar</a></li>
                <li class="breadcrumb-item active"><strong>Sabit Sayfa {{(@$page->id) ? "Düzenle":"Ekle"}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a href="{{route('admin.page.index')}}" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i>
                Geri Dön</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title"><h5>Sabit Sayfa Özellikleri</h5></div>
            <div class="ibox-content">

                <form action="{{ route('admin.page.store',['id' => @$page->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="title">Sayfa Başlığı <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{@$page->title}}" placeholder="Sayfa başlığını yazın..."
                                       autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="title">Kategori <span class="text-danger">*</span></label>
                                <select class="form-control" name="categories">
                                    <option @if(@$page->categories == 'terms_of_use') selected
                                            @endif value="terms_of_use">Güvenlik Politikaları
                                    </option>
                                    <option @if(@$page->categories == 'about') selected @endif  value="about">Kurumsal
                                    </option>
                                    <option @if(@$page->categories == 'diger') selected @endif  value="diger">Diğer
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="title">Türü <span class="text-danger">*</span></label>
                                <select class="form-control" name="type">
                                    <option @if(@$page->type == 'page') selected @endif value="page">Sayfa</option>
                                    <option @if(@$page->type == 'blog') selected @endif  value="blog">Blog</option>
                                    <option @if(@$page->type == 'destination') selected @endif  value="destination">
                                        Bölgeler
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="title">Resim <span class="text-danger">*</span></label>
                                <input type="file" name="file">
                            </div>
                        </div>

                    </div>

                    <label for="pageslug">Sayfa İçeriği <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" cols="30" rows="10" class="editor form-control"
                              placeholder="Sayfa içeriğini yazın..." autocomplete="off"
                              required>{{@$page->content}}</textarea>

                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" name="status" class="custom-control-input"
                               id="status" {{ ( @$page == "" or @$page->status ) ? "checked" : "" }}>
                        <label class="custom-control-label" for="status">Aktif</label>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="buttons">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i>
                            Sayfayı Kaydet
                        </button>
                        <a href="/staticpages" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
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
