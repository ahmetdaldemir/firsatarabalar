@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Müşteri Yönetimi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>Müşteriler</strong></li>
            </ol>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="padding-top: 52px">

            <div class="d-flex justify-content-end align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_deleted"  {{$show}}/>
                    <label class="custom-control-label" for="show_deleted">Silinen Müşterileri Göster</label>
                </div>
                @if (!old('q') )
                    <a href="{{route('admin.customer.index')}}" class="btn btn-xs btn-warning ml-3"><i class="fad fa-trash-alt mr-1"></i> Arama Filtresini Kaldır</a>
                @endif
                <a href="{{route('admin.customer.create')}}" class="btn btn-xs btn-success mr-2"><i class="fad fa-plus-circle mr-1"></i> Yeni Müşteri Ekle</a>
            </div>

        </div>
    </div>
    <div class="wrapper wrapper-content">

        <table id="Users" class="table table-striped table-bordered table-hover mb-0 bg-white">
            <thead class="thead-light">
            <tr>
                <th width="60" class="text-center">#</th>
                <th width="230">İsim</th>
                <th width="110" class="text-center">Telefon</th>
                <th>E-Posta</th>
                <th width="180" class="text-center">İl / İlçe</th>
                <th width="130" class="text-center">Kayıt Zamanı</th>
                <th width="70" class="text-center">Durum</th>
                <th width="180" class="text-center">İşlem(ler)</th>
            </tr>
            </thead>
            <tbody>
            @if ( empty($customers) )
                <tr>
                    <td colspan="10" class="text-center bg-white" height="80">Hiç kullanıcı yok!</td>
                </tr>
            @else
                @foreach ( $customers as $customer )
                    <tr id="customerRow-{{$customer->id}}">
                        <td class="text-center"><a href="{{route('admin.customer.edit',['id' => $customer->id])}}">{{$customer->id}}</a></td>
                        <td>{{$customer->firstname}} {{$customer->lastname}}</td>
                        <td class="text-center">{{$customer->phone}}</td>
                        <td >{{$customer->email}}</td>
                        <td class="text-center">{{$customer->il}} / {{$customer->ilce}}</td>
                        <td class="text-center">{{$customer->date_created}}</td>
                        <td class="text-center">{!! ( $customer->status ) ? '<span class="label label-primary">Aktif</span>' : '<span class="label label-plain">Pasif</span>' !!}</td>
                        <td class="text-center">
                            @if ( Request::get("deleted") == "show" )
                                <a href="javascript:;" onclick="undeleteCustomer({{$customer->id}});" class="btn btn-xs btn-warning"><i class="fad fa-reply mr-1"></i> Geri Al</a>
                            @else
                                <a href="javascript:;" data-toggle="modal" data-target="#SendSms" data-customernumber='{{$customer->phone}}' class="sendsms btn btn-xs btn-primary"><i class="far fa-envelope"></i></a>
                                <a href="{{route('admin.customer.edit',['id' => $customer->id])}}" class="btn btn-xs btn-success"><i class="fad fa-edit mr-1"></i> Düzenle</a>
                                <a href="javascript:;" onclick="deleteCustomer({{$customer->id}});" class="delete btn btn-xs btn-danger"><i class="fad fa-trash-alt mr-1"></i> Sil</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>

    <div class="modal fade" id="SendSms" tabindex="-1" aria-labelledby="SendSmsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SendSmsLabel">SMS Mesajı Gönder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="#" id="send-sms-form">
                        <input type="hidden" name="customer_number" id="customer_number" value="">
                        <div class="form-group mb-0">
                            <label>Mesajınızı Yazın</label>
                            <textarea name="sms-content" id="sms-content" cols="30" rows="5" class="form-control rounded"></textarea>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Gönder</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function deleteCustomer( customer_id ){
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
                $.post("/customers/delete", { customer_id:customer_id }, function(r){
                    if( r.status == "success" ){ swal.close(); $("#customerRow-" + customer_id).remove(); }
                }, "json");
            });
        }

        function undeleteCustomer( customer_id ){
            swal({
                title: "Emin misiniz?",
                text: "Bu kaydı geri yüklemek istediğinize emin misiniz?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Hayır",
                confirmButtonColor: "#1a7bb9",
                confirmButtonText: "Evet, geri al!",
                closeOnConfirm: false
            }, ()=>{
                $.post("/customers/undelete", { customer_id:customer_id }, function(r){
                    if( r.status == "success" ){ window.location.href = '/customers'; }
                }, "json");
            });
        }

        $(document).ready(function(){

            $("#show_deleted").on("change", function(){
                if( $(this).prop("checked") == true ){
                    window.location.href = "{{route('admin.customer.deleted')}}";
                } else {
                    window.location.href = "{{route('admin.customer.index')}}";
                }
            });

            $('#SendSms').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body label').append(" -> "+button.data('customernumber'));
                modal.find('.modal-body input[name=customer_number]').val(button.data('customernumber'));
            })

            $("#send-sms-form").on("submit", function(e){
                e.preventDefault();
                $.post("/customers/sendsms", { phone:$("#customer_number").val(), message:$("#sms-content").val() },function(){
                    $("#send-sms-form")[0].reset();
                    $('#SendSms').modal("hide");
                });
            });

        });
    </script>

@endsection
