<!-- Header -->
<header class="site-header header header-transparent text-black mo-left">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container clearfix">
                <!-- Website Logo -->
                <div class="logo-header  logo-dark">
                    <a href="/"><img src="{{asset('storage/app/files/'.setting('logo'))}}" alt=""></a>
                </div>
                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- Extra Nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <a href="{{route('form1')}}"  class="btn btn-primary">Aracımı Satmak İstiyorum<i class="fa fa-angle-right m-l10"></i></a>
                        <a href="javascript:;" ng-click="CustomerLogin()" class="btn btn-primary">Giriş Yap<i class="fa fa-angle-right m-l10"></i></a>
                    </div>
                </div>
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header">
                        <a href="/"><img src="{{asset('storage/app/files/'.setting('logo'))}}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav navbar">
                        <li class="active"><a href="/"><span>Anasayfa</span></a></li>
                        <li class=""><a href="javascript:void(0);"><span>Kurumsal</span></a></li>
                        <li class=""><a href="{{route('nasil_calisir')}}"><span>Nasıl Çalışır</span></a></li>
                        <li class=""><a href="{{route('kullanici_gorusleri')}}"><span>Kullanıcı Görüşleri</span></a></li>
                        <li class=""><a href="/iletisim"><span>İletişim</span></a></li>

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
