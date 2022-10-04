<!DOCTYPE html>
<html lang="en">
<head>
    <meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Ahmet DALDEMİR">

    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{@$Title}}</title>
    @if (@$Keywords)
        <meta name="keywords" content="{{$Keywords}}">@endif

    @if (@$Description)
        <meta name="description" content="{{$Description}}">
        <meta property="og:url" content="http://www.firsatarabalar.com/"/>
        <meta property="og:title" content="{{$Title}}"/>
        <meta property="og:description" content="{{$Description}}"/>
        <meta property="og:image" content="http://www.firsatarabalar.com/Public/img/og-splash.jpg"/>
    @endif

    <link id="favicon" rel="icon" type="image/png" href="{{asset('new_view/img/favicon-color.png')}}">
    <link rel="stylesheet" href="{{asset('new_view/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('new_view/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('new_view/css/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fa/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('new_view/css/main.css')}}">

    @yield('before-css')
    <link rel="stylesheet" href="{{asset('new_view/css/main.css') }}">
    @yield('after-css')

    @yield('head-after-js')

    @if ( !empty($Settings["scriptsHead"]) )
        @php echo htmlspecialchars_decode($Settings["scriptsHead"]); @endphp
    @endif

    @if (auth()->guard("customer")->check()) @endif

</head>
<body ng-app="app" ng-controller="MainController">

@if(!$agent->isMobile())
    <header class="text-white sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="me-4 logo"><img src="{{asset('new_view/img/firsat-arabalar-logo.png')}}"
                                                   alt="Fırsat Arabalar"></a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link {{(request()->segment(0) == "" ) ? "active" : ""}}">Ana Sayfa</a>
                    </li>
                    <li><a href="{{route('sayfalar',['slug' => 'nasil-calisir'])}}"
                           class="nav-link {{(request()->segment(1) == "nasil-calisir" ) ? "active" : ""}}">Nasıl
                            Çalışır</a></li>
                    <li><a href="{{route('kullanici_gorusleri')}}"
                           class="nav-link {{(request()->segment(0) == "kullanici-gorusleri" ) ? "active" : ""}}">Kullanıcı
                            Görüşleri</a></li>
                    <li><a href="/iletisim"
                           class="nav-link {{( request()->segment(0) == "iletisim" ) ? "active" : ""}}">İletişim</a>
                    </li>
                </ul>

                <div class="text-end hstack gap-2">
                    @if(!auth()->guard("customer")->check())
                        <!-- a href="javascript:;" class="btn wo-btn wo-btn-white me-2 d-block" data-bs-toggle="modal"
                           data-bs-target="#loginpopup"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yap</a -->
                        <a href="{{route('authpage')}}" class="btn wo-btn wo-btn-white me-2 d-block"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yap</a>
                        <a href="javascript:;" class="btn wo-btn d-block" data-bs-toggle="modal"
                           data-bs-target="#loginpopup"><i class="fal fa-usd-circle me-1"></i> Aracını Hemen Sat</a>
                    @else
                        <a href="/arac-ekle" class="btn wo-btn d-block"><i class="fal fa-usd-circle me-1"></i> Aracını
                            Hemen Sat</a>
                    @endif
                </div>

                @if(auth()->guard("customer")->check())
                    <div class="header-user-menu dropdown text-end ms-3">
                        <a href="#"
                           class="d-block link-dark text-decoration-none dropdown-toggle btn wo-btn wo-btn-white"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fad fa-user me-1"></i> {{auth()->guard('customer')->user()->firstname}} {{auth()->guard('customer')->user()->lastname}}
                        </a>
                        @if ( @$unread > 0 )
                            <div class="notification-badge"></div>@endif
                        <ul class="customer-dropdown-menu dropdown-menu dropdown-menu-end"
                            aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="{{route('profil')}}"><i
                                            class="fa-fw fad fa-user me-2"></i> Profilim</a></li>
                            <li><a class="dropdown-item" href="{{route('account.customer.car')}}"><i
                                            class="fa-fw fad fa-cars me-2"></i> Araçlarım</a></li>
                            <li><a class="dropdown-item" href="{{route('account.customer.car')}}"><i
                                            class="fa-fw fad fa-sack-dollar me-2"></i> Ödemelerim</a></li>
                            <li><a class="dropdown-item" href="{{route('account.customer.logout')}}"><i
                                            class="fa-fw fad fa-sign-out me-2"></i> Çıkış Yap</a></li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </header>
@else
    <header class="text-white sticky-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <a href="/" class="logo"><img src="{{asset("new_view/img/firsat-arabalar-logo.png")}}"
                                                      alt="Fırsat Arabalar"></a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fad fa-bars"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="/">Ana Sayfa</a></li>
                                <li><a class="dropdown-item" href="/bilgi/nasil-calisir">Nasıl Çalışır</a></li>
                                <li><a class="dropdown-item" href="/kullanici-gorusleri">Kullanıcı Görüşleri</a></li>
                                <li><a class="dropdown-item" href="/yardim">Yardım</a></li>
                                <li><a class="dropdown-item" href="/iletisim">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    @if (!auth()->guard("customer")->check())
                        <div class="row">
                            <div class="col-5 pe-1">
                                <a href="javascript:;" class="btn wo-btn wo-btn-white me-2 d-block"
                                   data-bs-toggle="modal" data-bs-target="#loginpopup"><i
                                            class="fad fa-sign-in-alt me-1"></i> Giriş Yap</a>
                            </div>
                            <div class="col-7 ps-1">
                                <a href="javascript:;" class="btn wo-btn d-block" data-bs-toggle="modal"
                                   data-bs-target="#loginpopup"><i class="fal fa-usd-circle me-1"></i> Aracını Hemen Sat</a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-7 pe-1">
                                <a href="/arac-ekle" class="btn wo-btn d-block"><i class="fal fa-usd-circle me-1"></i>
                                    Aracını Hemen Sat</a>
                            </div>
                            <div class="col-5 ps-1">
                                @if (auth()->guard("customer")->check() )
                                    <div class="header-user-menu dropdown text-end">
                                        <a href="#"
                                           class="d-block link-dark text-decoration-none dropdown-toggle btn wo-btn wo-btn-white"
                                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fad fa-user me-1"></i> Hesabım
                                        </a>
                                        @if (@$unread > 0 )
                                            <div class="notification-badge"></div>@endif
                                        <ul class="customer-dropdown-menu dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownUser1">
                                            <li><a class="dropdown-item" href="{{route('profil')}}"><i
                                                            class="fa-fw fad fa-user me-2"></i> Profilim</a></li>
                                            <li><a class="dropdown-item" href="{{route('account.customer.car')}}"><i
                                                            class="fa-fw fad fa-cars me-2"></i> Araçlarım</a></li>
                                            <li><a class="dropdown-item" href="{{route('account.customer.car')}}"><i
                                                            class="fa-fw fad fa-sack-dollar me-2"></i> Ödemelerim</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{route('account.customer.logout')}}"><i
                                                            class="fa-fw fad fa-sign-out me-2"></i> Çıkış Yap</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
@endif

@yield("content")


<footer class="wo-footer-wrap">
    <img src="{{asset("new_view/img/footer-shape.png")}}" class="wo-footershape" alt="img description">
    <div class="wo-footer">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="wo-fpostwrap">
                        <div class="wo-fpostwrap__title text-center mb-4">
                            <h4>Aracınızı satmayı mı planlıyorsunuz?</h4>
                            <h4>Sizin için hızlı ve kolayca <span>araç değerleme ve pazarlama</span> hizmeti sunuyoruz.
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="wo-fpost">
                                    <i class="fad fa-shield-check fa-3x"></i><br>
                                    <h4>Güvenilir</h4>
                                    <span>Kendimize güveniyoruz. Aracınızı değerinde ve hedefine uygun olarak değerliyor ve pazarlıyoruz.</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="wo-fpost">
                                    <i class="fad fa-medal fa-3x"></i><br>
                                    <h4>Kaliteli Değerleme</h4>
                                    <span>Doğrudan danışmanlarımız tarafından en iyi ve en odaklı gerçek araç değerlemesi ile tanışın.</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="wo-fpost">
                                    <i class="fad fa-hands-usd fa-3x"></i><br>
                                    <h4>Parasının Karşılığı</h4>
                                    <span>Ödediğiniz ücretin tam anlamı ile karşılığını alırsınız. Hedefli ve Hızlı pazarlama sayesinde kesin sonuçlar.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wo-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <p class="wo-copyrights">© 2021 - <a href="/">Fırsat Arabalar</a> - Tüm Hakları Saklıdır.</p>
                        <nav class="wo-footernav">
                            <ul class="nav">
                                <?php $terms_of_use = page('terms_of_use'); ?>
                                <?php foreach ($terms_of_use as $item){ ?>
                                <li class="nav-item"><a  class="nav-link" href="{{route('sayfalar',['slug' => $item->slug])}}">{{$item->title}}</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>


@if(!auth()->guard("customer")->check())
    @include('new_view/modal')
@endif

<script src="{{ asset('new_view/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('new_view/js/jquery-3.6.0.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('new_view/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('new_view/js/jquery.colorbox.js') }}"></script>
<script src="{{ asset('new_view/js/sweetalert2.min.js') }}"></script>
@yield('body-before-js')
<script src="{{ asset('new_view/js/main.js', 'v=2.2.4') }}" charset="utf-8"></script>
@yield('body-after-js')

</body>
</html>
