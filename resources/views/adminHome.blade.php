@extends('layouts.app')
@section('content')

    <div class="dashboard">
        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-2">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-success">
                            <h5>Kullanıcılar</h5>
                            <i class="fad fa-users"></i>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col text-center">
                                    <small class="stats-label">Bugün</small>
                                    <h4 class="text-success">0</h4>
                                </div>
                                <div class="col text-center">
                                    <small class="stats-label">Tümü</small>
                                    <h4 class="text-success">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-warning">
                            <h5>Araçlar</h5>
                            <i class="i fad fa-cars"></i>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <small class="stats-label">Bekleyenler</small>
                                    <h4 class="text-warning">0</h4>
                                </div>

                                <div class="col-3 text-center">
                                    <small class="stats-label">Değerlemede</small>
                                    <h4 class="text-warning">0</h4>
                                </div>
                                <div class="col-3 text-center">
                                    <small class="stats-label">Tamamlanan</small>
                                    <h4 class="text-warning">0</h4>
                                </div>
                                <div class="col-3 text-center">
                                    <small class="stats-label">Toplam</small>
                                    <h4 class="text-warning">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-navy">
                            <h5>Ödemeler</h5>
                            <i class="fad fa-sack-dollar"></i>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col text-center">
                                    <small class="stats-label">Tamamlanan Ödemeler</small>
                                    <h4 class="text-navy">0 ₺</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-danger">
                            <h5>Danışmanlar</h5>
                            <i class="fad fa-user-tie"></i>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col text-center">
                                    <small class="stats-label">Aktif Danışman</small>
                                    <h4 class="text-danger">0 Kişi</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-info">
                            <h5>Yöneticiler</h5>
                            <i class="fad fa-user-shield"></i>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col text-center">
                                    <small class="stats-label">Aktif Yönetici</small>
                                    <h4 class="text-info">0 Kişi</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center text-success">
                            <div><h5>Kullanıcı Grafikleri</h5> (0 ile 0 Arası)</div>
                            <div class="ibox-tools">
                                <a class="collapse-link"><i class="fal fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="ibox-content px-0 pt-0">
                            <div id="area-customers"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="ibox">
                        <div class="ibox-title d-flex justify-content-between align-items-center">
                            <div style="color: #1ab394"><h5>Satış Grafikleri</h5> (0 ile 0 Arası)</div>
                            <div class="ibox-tools">
                                <a class="collapse-link"><i class="fal fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="ibox-content px-0 pt-0">
                            <div id="area-payments"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style media="screen">
        .dashboard .ibox-title i.fad {
            font-size: 18px
        }
        .dashboard .ibox-content h4 {
            font-size: 18px
        }

        #area-customers,
        #area-payments {
            height: 200px
        }

    </style>

    <link href="{{asset('admin/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/morris/morris.js')}}"></script>

    <script type="text/javascript">
        $(function(){

            Morris.Area({
                element: 'area-customers',
                data: [
                    @if(isset($chart))
                        @foreach ( $chart as $key => $item )
                    { date: '{{$item["date"]}}', customer:{{$item["customer"]}} },
                    @endforeach
                    @endif
                ],
                xkey: 'date',
                xLabels: 'day',
                xLabelAngle: 60,
                ykeys: ['customer'],
                labels: ['Kişi'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true,
                lineColors: ['#0084f0'],
                lineWidth:2,
                pointSize:4,
            });

            Morris.Area({
                element: 'area-payments',
                data: [
                        @if(isset($chart))
                        @foreach ( $chart as $key => $item )
                    { date: '{{$item["date"]}}', payment:{{$item["payment"]}} },
                    @endforeach
                    @endif
                ],
                xkey: 'date',
                xLabels: 'day',
                xLabelAngle: 60,
                ykeys: ['payment'],
                labels: ['Kazanç'],
                yLabelFormat: function (y) { return y.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' }); },
                pointSize: 2,
                hideHover: 'auto',
                resize: true,
                lineColors: ['#1ab394'],
                lineWidth:2,
                pointSize:4,
            });

        });
    </script>

@endsection
