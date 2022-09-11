<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fırsat Arabalar') }}</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fa/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

@yield('css')

<!-- Mainly scripts -->
    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('admin/js/inspinia.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js" charset="utf-8"></script>
    <script src="https://cdn.tiny.cloud/1/oj6zyoqfb6eqi7142vqs78p5k23x3vdo28svzv867z9cd3fu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
</head>

<body ng-app="app">
 <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header" style="padding: 20px 25px !important">
                    <div class="profile-element font-weight-bold text-warning">Yönetim Paneli</div>
                    <div class="logo-element text-warning">YP+</div>
                </li>
                <li><a href="/admin/home"><i class="fa-fw fad fa-chart-network"></i> <span
                                class="nav-label">Göstergeler</span></a></li>
                <!--  {(Request::getSegment(0) == "agents") ? "class='active'":""} -->
                @role('Admin')
                <li>
                    <a href="{{route('admin.expert.index')}}">
                        <i class="fa-fw fad fa-user-tie"></i>
                        <span class="nav-label">Danışmanlar</span>
                        <span class="label label-outline float-right"><?php echo count_menu()['exper']; ?> </span>
                    </a>
                </li>
                @endrole
                @role('Admin')
                <li>
                    <a href="{{route('admin.customer.index')}}">
                        <i class="fa-fw fad fa-users"></i>
                        <span class="nav-label">Müşteriler</span>
                        <span class="label label-success float-right"><?php echo count_menu()['customer']; ?> </span>
                    </a>
                </li>
                @endrole
                @role('Admin')
                <li>
                    <a href="{{route('admin.car.index')}}">
                        <i class="fa-fw fad fa-users"></i>
                        <span class="nav-label">Araçlar</span>
                        <span class="label label-success float-right"><?php echo count_menu()['cars']; ?></span>
                    </a>
                </li>
                @endrole
                <li>
                    <hr style='border-top: 1px solid #3a586f'>
                </li>
                @role('Exper|Admin')
                <li>
                    <a href="{{route('admin.customer_car_valuation.index',['status' => \App\Enums\CustomerCarStatus::STATUS_STRING['WAITING']])}}">
                        <i class="fa-fw fad fa-bullseye-pointer"></i>
                        <span class="nav-label">Yeni Gelenler</span>
                        <span class="label label-info float-right">-</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer_car_valuation.index',['status' =>  \App\Enums\CustomerCarStatus::STATUS_STRING['VALUATION']])}}">
                        <i class="fa-fw fad fa-bullseye-pointer"></i>
                        <span class="nav-label">Değerlemede Olanlar</span>
                        <span class="label label-info float-right">-</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer_car_valuation.index',['status' =>  \App\Enums\CustomerCarStatus::STATUS_STRING['SELL']])}}">
                        <i class="fa-fw fad fa-bullseye-pointer"></i>
                        <span class="nav-label">Satışta Olanlar</span>
                        <span class="label label-info float-right">-</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer_car_valuation.index',['status' => \App\Enums\CustomerCarStatus::STATUS_STRING['COMPLATED']])}}">
                        <i class="fa-fw fad fa-bullseye-pointer"></i>
                        <span class="nav-label">Tamamlananlar</span>
                        <span class="label label-info float-right">-</span>
                    </a>
                </li>

                @endrole
                <li>
                    <hr style='border-top: 1px solid #3a586f'>
                </li>
                @role('Admin')
                <li>
                    <a href="{{route('admin.vehicle_request.index')}}">
                        <i class="fa-fw fad fa-bullseye-pointer"></i>
                        <span class="nav-label">Talepler</span>
                        <span class="label label-info float-right"><?php echo count_menu()['customer_car_request']; ?></span>
                    </a>
                </li>
                @endrole
                @role('Admin')

                <li><a href="/payments"><i class="fa-fw fad fa-money-bill-wave"></i> <span
                                class="nav-label">Ödemeler</span></a></li>

                @endrole
                @role('Admin')
                <li><a href="{{route('admin.reviews.index')}}"><i class="fa-fw fad fa-comments-alt"></i> <span
                                class="nav-label">Kullanıcı Görüşleri</span></a></li>
                @endrole
                @role('Admin')
                <li>
                    <a href="javascript:;"><i class="fa-fw fad fa-question-circle"></i> <span class="nav-label">Yardım Sayfaları</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true" style="">
                        <li><a href="/helps/categories">Kategoriler</a></li>
                        <li><a href="/helps/contents">İçerikler</a></li>
                    </ul>
                </li>
                @endrole
                @role('Admin')
                <li><a href="{{route('admin.page.index')}}"><i class="fa-fw fad fa-file-alt"></i> <span
                                class="nav-label">Sabit Sayfalar</span></a></li>
                @endrole
                 <li>
                    <hr style='border-top: 1px solid #3a586f'>
                </li>
                 @role('Admin')
                <li><a href="/admin/setting/index"><i class="fa-fw fad fa-cog"></i><span
                                class="nav-label">Ayarlar</span></a></li>
                @endrole
                <li><a href="{{route('admin.logout')}}"><i class="fa-fw fad fa-sign-out"></i> <span class="nav-label">Çıkış Yap</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fad fa-bars"></i></a>
                    <form role="search" class="navbar-form-custom" @if(!empty($searchroute)) action="{{route($searchroute)}}" @endif method="get">
                        <div class="form-group d-flex justify-align-start align-items-center">
                            <input type="text" placeholder="Arama..." class="form-control" name="q" id="top-search"
                                   style="width: 300px" size="60">
                            <a href="#" class="btn btn-xs btn-warning"><i class="fad fa-times mr-1"></i> Filtreyi
                                Sıfırla</a>
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><span class="m-r-md text-muted welcome-message">Hoşgeldiniz</span></li>
                    <li><a href="https://www.{{config("app.domain")}}" target="_blank"><i class="fad fa-home"></i>
                            Siteyi Göster</a></li>
                    <li class="m-r-sm"><a href="{{route('admin.logout')}}"><i class="fad fa-sign-out-alt"></i> Çıkış Yap</a></li>
                </ul>
            </nav>
        </div>

        @yield('content')

    </div>

</div>

@yield('js')

</body>
</html>
