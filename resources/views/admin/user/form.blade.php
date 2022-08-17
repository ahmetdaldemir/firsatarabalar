@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>Kullanıcı {{(@$expert) ? "Düzenle":"Ekle"}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.expert.index')}}">Kullanıcılar</a></li>
                <li class="breadcrumb-item active"><strong>Kullanıcı {{(@$expert) ? "Düzenle":"Ekle"}}</strong></li>
            </ol>
        </div>
        <div class="col-4 text-right" style="padding-top: 52px">
            <a  href="{{route('admin.expert.index')}}" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Geri Dön</a>
        </div>
    </div>
    <div class="wrapper wrapper-content">

        <div class="tabs-container">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="SettingsTabs nav nav-tabs" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#general"><i class="fad fa-cog"></i>Genel Bilgiler</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#earnings"><i class="fad fa-badge-dollar"></i>Kazançları</a></a></li>
                </ul>
            </div>
            <div class="tab-content">

                <div role="tabpanel" id="general" class="tab-pane active">
                    <div class="panel-body p-4">
                        <form action="{{route('admin.expert.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{@$user->id}}">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="firstname">Rol {{$user->role ?? NULL}} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="role">
                                            <?php foreach ($roles as $role){ ?>
                                              <option value="<?=$role->id?>" ><?=$role->name?></option>
                                            <?php } ?>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="firstname">Kullanıcı İsim Soyisim<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{@$user->name}}" placeholder="Kullanıcı ismi yazın..." autocomplete="off" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">Kullanıcı E-Posta <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{@$user->email}}" placeholder="Kullanıcı e-posta adresi yazın..." autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Kullanıcı Telefonu <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{@$user->phone}}" placeholder="Kullanıcı telefonu yazın..." autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="password">Kullanıcı Şifresi <span class="text-danger">*</span></label>
                                        <input type="text" name="password" id="password" class="form-control" placeholder="Kullanıcı şifresi yazın..." autocomplete="off" {{( @$user->id == "" ) ? "required" : ""}}>
                                        <small id="passwordHelp" class="form-text text-muted">Yalnızca değiştirmek için doldurun!</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="earn">Rapor Başı Kazanç <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" name="earn" id="earn" class="form-control text-right" value="{{@$user->earn}}" placeholder="0.00" min="0.00" max="10000.00" step="0.01" style="max-width: 100px" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" class="custom-control-input" value="1" id="status" {{ ( @$user == "" or @$user->status ) ? "checked" : "" }}>
                                <label class="custom-control-label" for="status">Aktif</label>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="buttons">
                                <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fad fa-save mr-1"></i> Kullanıcı Kaydet</button>
                                <a href="/agents" class="btn btn-sm btn-secondary"><i class="fad fa-reply mr-1"></i> Vazgeç</a>
                            </div>

                        </form>
                    </div>
                </div>

                <div role="tabpanel" id="earnings" class="tab-pane">
                    <div class="panel-body p-4">
                        @if(@$user)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h3 class="p-0 m-0 d-inline-block">Aylık Kazançlar</h3>  ({{$dateBegin}} ile {{$dateEnd}} Arası)
                            </div>
                            <div>
                                <form action="#earnings" method="get" class="custom d-flex justify-content-end align-items-center">
                                    <div class="pr-2">Tarih Seçimi : </div>
                                    <select name="m" id="m" class="icon-duotone form-control mr-2">
                                        @for ($i=1; $i < 13; $i++)
                                            @php
                                                $i = ( $i < 10 ) ? "0".$i : $i;
                                            @endphp
                                            <option value="{{$i}}" {{( (old('m') == $i) ) ? "selected" : ""}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <select name="y" id="y" class="icon-duotone form-control mr-2">
                                        @foreach ($years as $year)
                                            <option value="{{$year}}" {{( (old('y') ==$year) ) ? "selected" : ""}}>{{$year}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fad fa-search"></i></button>
                                    @if ( Request::get("m") )
                                        <a href="/agents/{{$user->id}}/{{$user->slug}}#earnings" class="btn btn-sm btn-warning ml-1"><i class="fad fa-sync"></i></a>
                                    @endif
                                    <a href="javascript:;" class="btn btn-sm btn-success ml-4" data-toggle="modal" data-target="#DataAdd"><i class="fad fa-plus-circle mr-1"></i> Veri Ekle</a>
                                </form>
                            </div>
                        </div>

                        <div id="morris-line-chart"></div>

                        <table class="table table-striped table-bordered table-hover mb-0 bg-white" id="Earnings">
                            <thead class="thead-light">
                            <tr>
                                <th width="200">Müşteri</th>
                                <th>Araç</th>
                                <th width="200" class="text-center">Açıklama</th>
                                <th width="100" class="text-right">Tutar</th>
                                <th width="100" class="text-center">Kayıt Z.</th>
                                <th width="135" class="text-center">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ( empty($earnings) )
                                <tr>
                                    <td colspan="10" class="text-center bg-white" height="80">Henüz hiç kayıt yok!</td>
                                </tr>
                            @else
                                @foreach ( $earnings->expert_earnings as $expert_earning )
                                    <tr id="earn-{{$expert_earning->id}}">
                                        <td>{{$expert_earning->Customer->firstname}} {{$expert_earning->Customer->lastname}}</td>
                                        <td class="text-left">(<span style="font-family: monospace">{{$expert_earning->CustomerCar->plate}}</span>) - {{$expert_earning->Brand->brand_name}} - {{$expert_earning->Brand->name}}</td>
                                        <td class="text-center">{{$expert_earning->comments}}</td>
                                        <td class="earn-price text-right {{( $expert_earning->earning < 0 ) ? "text-danger" : "text-info"}}">{{( $expert_earning->earning < 0 ) ? "" : "+"}}{{$expert_earning->earning}} ₺</td>
                                        <td class="text-center">{{$expert_earning->date_created}}</td>
                                        <td class="text-center">
                                            <a href="javascript:;" data-earnid='{{$expert_earning->id}}' class="reset btn btn-xs btn-dark"><i class="fab fa-creative-commons-zero mr-1"></i> Sıfırla</a>
                                            <a href="javascript:;" data-earnid='{{$expert_earning->id}}' class="delete btn btn-xs btn-danger"><i class="fad fa-trash mr-1"></i> Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Aylık Toplam :</td>
                                <td class="text-right text-success">{{$user->expert_earnings()->count()}} </td>
                                <td>{{$user->expert_earnings_sum()}} ₺</td>
                            </tr>
                            </tfoot>
                        </table>
                        @endif
                    </div>
                </div>


            </div>
        </div>

    </div>

    <style media="screen">
        form.custom select.form-control {
            display: inline-block !important;
            border-radius: 3px !important;
            font-family: Arial;
            font-size: 12px;
            padding: 6px;
            height: auto !important;
            width: auto
        }

        #morris-line-chart {
            background: #fff;
            margin-bottom: 15px;
            height: 200px;
            border: 1px solid #ddd
        }

    </style>

    <link href="{{asset('admin/js/plugins/selectize/css/selectize.css')}}" rel="stylesheet">

    <script src="{{asset('admin/js/plugins/selectize/js/standalone/selectize.min.js')}}"></script>

    <link href="{{asset('admin/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/morris/morris.js')}}"></script>

    @if(@$chart)
    <script type="text/javascript">

        var chart_is_set = false;

        $(function(){

            $(".nav-tabs a[href='"+ window.location.hash +"']").click();

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e){
                window.location.hash = e.currentTarget.hash;
                if( e.currentTarget.hash == "#earnings" ){ chartInit(); }
            });

            if( window.location.hash == "#earnings" ){ chartInit(); }

            $("#earn-data-car").selectize({
                "placeholder" : "Seçiniz..."
            });

            $("#earn-data-form").on("submit", function(e){
                e.preventDefault();
                let data = $(this).serializeObject();
                $.post("/agents/earndata", data, function(r){
                    if( r.status == "success" ){ window.location.reload(); }
                }, "json");
            });

            $("#Earnings a.reset").on("click", function(){
                let earn_id = $(this).data("earnid");
                $.post("/agents/earnreset", { earn_id:earn_id }, function(){
                    window.location.reload();
                });
            });

            $("#Earnings a.delete").on("click", function(){
                let earn_id = $(this).data("earnid");
                $.post("/agents/earndelete", { earn_id:earn_id }, function(){
                    window.location.reload();
                });
            });

        });

        function chartInit(){
            if( !chart_is_set ){
                Morris.Line({
                    element: 'morris-line-chart',
                    data: [
                            @foreach ( $chart as $day => $earn )
                        { zaman: '{{$day}}', earn:{{$earn}} },
                        @endforeach
                    ],
                    xkey: 'zaman',
                    xLabels: 'day',
                    xLabelAngle: 45,
                    ykeys: ['earn'],
                    yLabelFormat: function (y) { return y.toString() + ' ₺'; },
                    resize: true,
                    lineWidth:2,
                    labels: ['Kazanç'],
                    lineColors: ['#1ab394'],
                    pointSize:5,
                });
                chart_is_set = true;
            }
        }

    </script>
    @endif
@endsection
