@extends('layouts.view')
@section('content')
    <div class="dlab-bnr-inr overlay-gradient-dark text-center" style="background-image: url(images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ödeme Başarılı</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>

    <section class="content-inner about-wraper-1"  style="padding-top:25px;padding-bottom:0;background-image: url(images/background/bg15.png); background-size: contain; background-position: center right; background-repeat: no-repeat;">
        <div class="container">
            <div class="row align-items-center">
                <div class="card text-center">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                        <i class="checkmark">✓</i>
                    </div>
                    <h1>BAŞARILI</h1>
                    <p>Ödemeniz başarılıdır. Aracınız sisteme eklenmiştir. <br/> Değerlendirme uzmanlarımız en kısa sürede en iyi tekliflerini yönlendirecekler.</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .checkmark{
            font-size: 136px;
            color: #f00;
            text-align: center;
            line-height: 1.3;
        }
    </style>
@endsection