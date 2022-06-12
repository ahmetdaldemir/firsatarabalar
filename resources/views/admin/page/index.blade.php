@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Sabit Sayfalar</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Sabit Sayfalar</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">
            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" class="custom-control-input" id="show_deleted" {{ ( Request::get("deleted") == "show" ) ? "checked" : "" }}>
                <label class="custom-control-label" for="show_deleted">Silinen Sayfaları Göster</label>
            </div>
            <a href="{{route('admin.page.create')}}" class="btn btn-xs btn-success mr-2"><i class="fad fa-plus-circle mr-1"></i> Yeni Sabit Sayfa Ekle</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">

        <table class="table table-striped table-bordered table-hover mb-0">
            <thead class="thead-light">
            <tr>
                <th width="50" class="text-center">#</th>
                <th>Başlık</th>
                <th width="350" class="text-left">Slug</th>
                <th width="60" class="text-center"><i class="lni lni-eye"></i></th>
                <th width="130" class="text-center">Kayıt Z.</th>
                <th width="130" class="text-center">Güncelleme Z.</th>
                <th width="70" class="text-center">Durum</th>
                <th width="165" class="text-center">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>
            @if ( empty($pages) )
                <tr>
                    <td colspan="10" class="text-center" height="80">Hiç sayfa yok!</td>
                </tr>
            @else
                @foreach ( $pages as $page )
                    <tr>
                        <td class="text-center"><a href="/staticpages/{{$page->id}}/{{$page->pageslug}}">{{$page->id}}</a></td>
                        <td>{{$page->title}}</td>
                        <td class="text-left">
                            <div class="float-left">../bilgi/{{$page->pageslug}}</div>
                            <div class="float-right"><a href="{{config("app.url")}}/bilgi/{{$page->pageslug}}" target="_blank"><i class="fad fa-external-link"></i></a></div>
                            <div class="clearfix"></div>
                        </td>
                        <td class="text-center">{{$page->views}}</td>
                        <td class="text-center">{{$page->date_created}}</td>
                        <td class="text-center">{{$page->date_updated}}</td>
                        <td class="text-center">{!! ( $page->status ) ? '<span class="label label-primary">Aktif</span>' : '<span class="label label-plain">Pasif</span>' !!}</td>
                        <td class="text-center">
                            @if ( Request::get("deleted") == "show" )
                                <a href="javascript:;" data-pageid='{{$page->id}}' class="undelete btn btn-xs btn-warning"><i class="fad fa-reply mr-1"></i> Geri Al</a>
                            @else
                                <a href="{{route('admin.page.edit',['id'=> $page->id])}}" class="btn btn-xs btn-success"><i class="fad fa-edit mr-1"></i> Düzenle</a>
                                <a href="javascript:;" data-pageid='{{$page->id}}' class="delete btn btn-xs btn-danger"><i class="fad fa-trash-alt mr-1"></i> Sil</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

    <script type="text/javascript">
        $(function(){

            $("#show_deleted").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "/staticpages?deleted=show";
                } else {
                    window.location.href = "/staticpages";
                }
            });

            $("a.delete").on("click", function(){

                let parenttr = $(this).parents("tr");
                let pageid = $(this).data("pageid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu kaydı silmek istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, sil!",
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/staticpages/"+pageid+"/delete", { page_id:pageid }, function(){
                        $(parenttr).remove();
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

            $("a.undelete").on("click", function(){

                let parenttr = $(this).parents("tr");
                let pageid = $(this).data("pageid");

                swal({
                    title: "Emin misiniz?",
                    text: "Bu kaydı geri yüklemek istediğinize emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonColor: "#1a7bb9",
                    confirmButtonText: "Evet, geri yükle!",
                    closeOnConfirm: false
                }, ()=>{
                    $.post("/staticpages/"+pageid+"/undelete", { page_id:pageid }, function(){
                        swal({
                            title: "Tamamlandı.",
                            text: "Kayıt başarıyla geri yüklendi.",
                            type: "success",
                            confirmButtonColor: "#1a7bb9",
                            confirmButtonText: "Tamam"
                        }, ()=>{ window.location.href = '/staticpages'; });
                    });
                });

            });

        });
    </script>

@endsection
