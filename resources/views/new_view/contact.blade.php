@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>İletişim</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">İletişim</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="contact-banner d-flex justify-content-center align-items-center">
                        <div class="contact-inner">
                            <h2>
                                <span>Türkiye'nin en hızlı araç alım-satım platformu</span><br>
                                Bize ulaşmak için mesajınızı bırakın.
                            </h2>
                            <p>
                                Tüm soru, görüş ve önerileriniz için sizi dinliyoruz. Mümkün olan en kısa sürede size geri döneceğiz.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="wo-contactformwrap">
                        <div class="wo-replywrap">
                            <div class="wo-replytitle mb-4">
                                <h3>Bize Ulaşın</h3>
                            </div>
                            <form id="contactform" class="wo-themeform wo-replyform" action="{{route('mailsend')}}" method="post">
                                @csrf
                                <div class="hstack gap-2 mb-3">
                                    <input class="form-control" name="firstname" type="text" placeholder="İsminiz" required>
                                    <input class="form-control" name="lastname" type="text" placeholder="Soyisminiz" required>
                                </div>
                                <div class="hstack gap-2 mb-3">
                                    <input class="form-control" name="email" type="email" placeholder="E-Posta Adresiniz" required>
                                    <input class="form-control" name="phone" id="phone" type="text" placeholder="Telefon No: +90(XXX) XXX XX XX" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                                </div>
                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="İletmek istedikileriniz..." required></textarea>

                                <div class="alerts">
                                    <div class="alert alert-success mt-3 mb-0" hidden><i class="fad fa-check me-2"></i> İletişim formunuzu aldık. En kısa sürede size geri döneceğiz.</div>
                                    <div class="alert alert-danger mt-3 mb-0" hidden><i class="fad fa-times me-2"></i> İletişim formunuz gönderilemedi. Lütfen bilgilerinizi kontrol ederek yeniden deneyin.</div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center">
                                    <button type="submit" class="btn wo-btn mt-4"><i class="fad fa-long-arrow-right me-1"></i> Gönder</button>
                                    <div class="loading ms-3 pt-4" hidden>
                                        <i class="fad fa-spinner fa-spin me-2"></i> Lütfen bekleyin...
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 ps-5">
                    <div class="wo-ouravailability">
                        <div class="wo-ouravailability__title">
                            <h3>Diğer İletişim Detayları</h3>
                        </div>
                        <ul class="wo-ouravailability__info">
                            <li class="d-flex justify-content-start align-items-center">
                                <i class="fad fa-phone-volume fa-fw fa-2x" style="color:#fdc500"></i>
                                <div class="wo-contactinfo ms-4">
                                    <span>Telefon için Numaralarımız</span>
                                    <h4><a href="tel:+908503083509"> 0850 308 35 09</a></h4>
                                </div>
                            </li>
                            <li class="d-flex justify-content-start align-items-center">
                                <i class="fad fa-envelope-open-text fa-fw fa-2x" style="color:#fdc500"></i>
                                <div class="wo-contactinfo ms-4">
                                    <span>Sizin İçin Kolaysa Bize E-posta Gönderin</span>
                                    <h4><a href="mailto:info@firsatarabalar.com"> info@firsatarabalar.com</a></h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
