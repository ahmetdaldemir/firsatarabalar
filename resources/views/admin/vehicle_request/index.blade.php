@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Araç Talepleri</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Araç Talepleri</strong></li>
            </ol>
        </div>

    </div>
    <div class="wrapper wrapper-content">

        <table class="table table-striped table-bordered table-hover mb-0">
            <thead class="thead-light">
            <tr>
                <th width="50" class="text-center">#</th>
                <th>Müşteri</th>
                <th>Marka</th>
                <th width="350" class="text-left">Araç</th>
                <th width="350" class="text-left">Fiyat Aralığı</th>
                <th width="70" class="text-center">Mesaj</th>
                <th width="165" class="text-center">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>
            @if ( empty($vehicle_requests) )
                <tr>
                    <td colspan="10" class="text-center" height="80">Hiç sayfa yok!</td>
                </tr>
            @else
                @foreach ($vehicle_requests as $vehicle_request )
                    <?php $x = \App\Models\Customer::find($vehicle_request->customer_id); ?>
                    <tr>
                        <td>#</td>
                        <td class="text-center">@if(!$x) Müşteri Bulunamadı @else {{$x->firstname}} {{$x->lastname}} @endif</td>
                        <td>{{\App\Models\Brand::find($vehicle_request->brand_id)->name??"Bulunamadı"}}</td>
                        <td>{{$vehicle_request->version}}</td>

                        <td class="text-center">{{$vehicle_request->price_min}} / {{$vehicle_request->price_max}}</td>
                        <td class="text-center">{{$vehicle_request->message}}</td>
                        <td class="text-center">
                            {{$vehicle_request->created_at}}
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
