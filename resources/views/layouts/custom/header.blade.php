<!-- Header -->
<header class="site-header header header-transparent text-black mo-left">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container clearfix">
                <!-- Website Logo -->
                <div class="logo-header  logo-dark">
                    <a href="/"><img src="{{asset('storage/files/'.setting('logo'))}}" alt=""></a>
                </div>
               <!--
                @if ($agent->isMobile())

                    <a href="{{route('confirm')}}" class="btn btn-warning"
                       style="    margin: 20px 22px;  padding: 5px;">
                        Araç Ekle
                    </a>
            @endif
                            -->
            <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- Extra Nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <a href="{{route('confirm')}}" class="btn btn-primary">Aracımı Satmak İstiyorum<i class="fa fa-angle-right m-l10"></i></a>
                    @if(!\Illuminate\Support\Facades\Auth::guard('customer')->check())
                        <!-- a href="javascript:;" ng-click="CustomerLoginForm()" class="btn btn-info">Giriş Yap<i class="fa fa-angle-right m-l10"></i></a -->
                            <a href="{{route('authpage')}}" class="btn btn-info">Giriş Yap<i class="fa fa-angle-right m-l10"></i></a>
                        @else
                            <a href="{{route('profil')}}" style="color: #fff" class="btn btn-warning">Hesabım<i  class="fa fa-angle-right m-l10"></i></a>
                        @endif
                    </div>
                </div>
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header">
                        <a href="/"><img src="{{asset('storage/files/'.setting('logo'))}}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav navbar">
                        <li class="active"><a href="/"><span>Anasayfa</span></a></li>
                        <li class=""><a href="{{route('kurumsal',['slug' => 'kurumsal'])}}"><span>Kurumsal</span></a></li>
                        <li class=""><a href="{{route('nasil_calisir')}}"><span>Nasıl Çalışır</span></a></li>
                        <li class=""><a href="{{route('kullanici_gorusleri')}}"><span>Kullanıcı Görüşleri</span></a></li>
                        <li class=""><a href="/iletisim"><span>İletişim</span></a></li>
                        @if(!\Illuminate\Support\Facades\Auth::guard('customer')->check())
                            <li class="d-sm-none" style="padding: 0;"><a href="{{route('authpage')}}" style="padding: 10px 20px;" class="btn-info">Giriş Yap<i class="fa fa-angle-right m-l10"></i></a></li>
                        @else
                            <li class="d-sm-none" style="padding: 0;"><a href="{{route('profil')}}" style="padding: 10px 20px;" class="btn-warning">Hesabım<i class="fa fa-angle-right m-l10"></i></a></li>
                        @endif
                    </ul>
                    <div class="dlab-social-icon">
                        <ul>
                            <li><a class="fab fa-facebook-f" href="javascript:void(0);"></a></li>
                            <li><a class="fab fa-twitter" href="javascript:void(0);"></a></li>
                            <li><a class="fab fa-linkedin-in" href="javascript:void(0);"></a></li>
                            <li><a class="fab fa-instagram" href="javascript:void(0);"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
</header>
<!-- Header End -->
