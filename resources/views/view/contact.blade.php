@extends('layouts.view')
@section('content')

    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                 <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">İletişim</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <div class="section-head style-1">
                        <h6 class="sub-title">İletişim</h6>
                        <h2 class="title">Bize Ulaşın</h2>
                    </div>
                    <form class="dlab-form dzForm" method="POST" action="{{route('mailsend')}}">
                        <div class="dzFormMsg"></div>
                        <input type="hidden" class="form-control" name="reCaptchaEnable" value="0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input name="dzName" type="text" required="" class="form-control" placeholder="İsim">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input name="dzOther[last_name]" type="text" class="form-control" required="" placeholder="Soyisim">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-envelope"></i></span>
                                    </div>
                                    <input name="dzEmail" type="text" required="" class="form-control" placeholder="Email Adresi">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-phone"></i></span>
                                    </div>
                                    <input name="dzPhoneNumber" type="text" required="" class="form-control" placeholder="Telefon">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-file-alt"></i></span>
                                    </div>
                                    <input name="dzOther[project_title]" type="text" class="form-control" required="" placeholder="Konu">
                                </div>
                            </div>
                            <div class="col-sm-12 m-b20">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-sms"></i></span>
                                    </div>
                                    <textarea name="dzMessage" required="" class="form-control" placeholder="Mesaj"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button name="submit" type="submit" value="Submit" class="btn btn-primary">Gönder<i class="fa fa-angle-right m-l10"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 col-lg-5 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="row m-t30">
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9 m-md-b60">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-phone-volume"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Şimdi Ara</h4>
                                     <p>{{setting('phone')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9 m-md-b60  m-sm-t30">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-map-marker"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Adres</h4>
                                    <p>{{setting('address')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9  m-md-t30">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-envelope-open"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Email</h4>
                                    <p>{{setting('email')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection