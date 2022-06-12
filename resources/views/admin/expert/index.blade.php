@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Danışman Yönetimi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Danışmanlar</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">
            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" class="custom-control-input" id="show_deleted" {{ ( Request::get("deleted") == "show" ) ? "checked" : "" }}>
                <label class="custom-control-label" for="show_deleted">Silinen Danışmanları Göster</label>
            </div>
            <a href="{{route('admin.expert.create')}}" class="btn btn-xs btn-success mr-2"><i class="fad fa-plus-circle mr-1"></i> Yeni Danışman Ekle</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">

        <table class="table table-striped table-bordered table-hover mb-0 bg-white">
            <thead class="thead-light">
            <tr>
                <th width="50" class="text-center">#</th>
                <th width="220">İsim</th>
                <th width="130" class="text-center">Telefon</th>
                <th>E-Posta / Kullanıcı Adı</th>
                <th width="130" class="text-center">Araçlar</th>
                <th width="150" class="text-center">Kazançlar</th>
                <th width="70" class="text-center">Durum</th>
                <th width="165" class="text-center">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>

            @if ( empty($experts) )

                 <tr>
                    <td colspan="10" class="text-center bg-white" height="80">Hiç danışman yok!</td>
                </tr>
            @else
                @foreach ( $experts as $expert )
                    <tr>
                        <td class="text-center"><a href="/experst/{{$expert->id}}/{{$expert->slug}}">{{$expert->id}}</a></td>
                        <td>{{$expert->firstname}} {{$expert->lastname}}</td>
                        <td class="text-center">{{$expert->phone}}</td>
                        <td >{{$expert->email}}</td>
                        <td class="text-center">{{$expert->date_created}}</td>
                        <td class="text-center">{{$expert->expert_earnings_sum()}} <i class="fa-solid fa-square-nfi"></i>/ {{$expert->expert_earnings()->count()}} ₺</td>
                        <td class="text-center">{!! ( $expert->status ) ? '<span class="label label-primary">Aktif</span>' : '<span class="label label-plain">Pasif</span>' !!}</td>
                        <td class="text-center">
                            @if ( Request::get("deleted") == "show" )
                                <a href="javascript:;" data-agentid='{{$expert->id}}' class="undelete btn btn-sm btn-warning"><i class="fad fa-reply mr-1"></i> Geri Al</a>
                            @else
                                <a href="{{route('admin.expert.edit',['id' => $expert->id])}}" class="btn btn-sm btn-success"><i class="fad fa-edit mr-1"></i> Düzenle</a>
                                <a href="javascript:;" data-agentid='{{$expert->id}}' class="delete btn btn-sm btn-danger"><i class="fad fa-trash-alt mr-1"></i> Sil</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

    <style media="screen">
        .table td {
            vertical-align: middle !important;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#show_deleted").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "/experst?deleted=show";
                } else {
                    window.location.href = "/experst";
                }
            });

            $("a.delete").on("click", function(){

                let parenttr = $(this).parents("tr");
                let agentid = $(this).data("agentid");

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
                    $.post("/experst/"+agentid+"/delete", { agentid:agentid }, function(){
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
                let agentid = $(this).data("agentid");

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
                    $.post("/experst/"+agentid+"/undelete", { agentid:agentid }, function(){
                        swal({
                            title: "Tamamlandı.",
                            text: "Kayıt başarıyla geri yüklendi.",
                            type: "success",
                            confirmButtonColor: "#1a7bb9",
                            confirmButtonText: "Tamam"
                        }, ()=>{ window.location.href = '/experst'; });
                    });
                });

            });

        });
    </script>

@endsection
