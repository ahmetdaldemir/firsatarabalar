@extends('layouts.view')
@section('content')

    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                 <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nasıl Çalışır</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);">
        <div class="container">
            <div class="text-center time-line-start">
                <img src="{{asset('view/images/icon/axletree.png')}}" alt="" class="fa faa-horizontal animated">
            </div>
            <div class="time-line clearfix">
                <div class="line-left clearfix">
                    <div class="line-left-box">
                        <div class="line-content-box wow fadeInLeft" data-wow-duration="1.80s" data-wow-delay="0.25s">
                            <h6 class="title">Firsatarabalar.com Türkiye'nin ilk ve tek güvene dayalı otomobil alım satım platformudur</h6>
                            <ul class="list-check primary m-b0">
                                <li>SADECE 1 SAAT içinde satış prensibiyle çalışır</li>
                                <li>Alıcı Ve satıcının Optimum seviyede kazanç elde etmesi hedeflenir</li>
                            </ul>
                        </div>
                        <div class="line-num gradient">1</div>
                    </div>
                </div>
                <div class="line-right clearfix">
                    <div class="line-right-box">
                        <div class="line-content-box wow fadeInRight" data-wow-duration="1.80s" data-wow-delay="0.50s">
                            <h5 class="title">Sistemden aracımı nasıl satarım</h5>
                            <p>Acil satıcı aracına ait bilgi ve özellikleri hemen sat bölümünden kolay ve hızlı bir şekilde adım adım kaydeder. Ve 169TL olan araç analiz raporu ücretini öder.
                            </p>
                            <p class="m-b0">Tüm bilgiler eksiksiz ve doğru olarak giriş yapılır.</p>
                        </div>
                        <div class="line-num gradient">2</div>
                    </div>
                </div>
                <div class="line-left clearfix">
                    <div class="line-left-box">
                        <div class="line-content-box wow fadeInRight" data-wow-duration="1.80s" data-wow-delay="1s">
                            <h5 class="title">Değerlendirme</h5>
                            <p>Fırsatarabalar uzman ekibi aracın araştırmasını ve piyasa analizini hazırlar. Araç sahibine aracı hakkında detaylı satış ve pazarlama bilgisi sunar.
                            </p>

                        </div>
                        <div class="line-num gradient">3</div>
                    </div>
                </div>
                <div class="line-right clearfix">
                    <div class="line-right-box">
                        <div class="line-content-box wow fadeInLeft" data-wow-duration="1.80s" data-wow-delay="0.50s">
                            <h5 class="title">Fırsat Fiyatlandırılması Ve Teklifi</h5>
                            <p class="m-b30">Uzman ekip aracın detaylı raporuna ek olarak araç sahibine en iyi tekliflerin üzerinde 1 günde firsatarabalar.com da satılacak önerilen fiyat bilgisini sunar. .</p>
                        </div>
                        <div class="line-num gradient">4</div>
                    </div>
                </div>
                <div class="line-left clearfix">
                    <div class="line-left-box">
                        <div class="line-content-box wow fadeInLeft" data-wow-duration="1.80s" data-wow-delay="1s">
                            <h5 class="title">-Onay Süreci</h5>
                            <p>Araç sahibi verilen fırsat fiyatını onaylar fırsat aracı tanıtım ile duyurulur belirlenen saat ve tarih yayınlanır ve satışa çıkar.
                        </div>
                        <div class="line-num gradient">5</div>
                    </div>
                </div>

             </div>
            <div class="text-center time-line-end">
                <img src="{{asset('view/images/icon/finish.png')}}" alt="">
            </div>
        </div>
    </div>
@endsection