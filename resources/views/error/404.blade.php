@extends('layouts.view')
@section('content')
    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1>404</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">404</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <div class="section-full" style="background-image: url({{asset('view/images/background/bg1.png')}});">
        <div class="container">
            <div class="error-page text-center">
                <div class="dlab_error">404</div>
                <h2 class="error-head">Üzgünüz ! Aradığınız Sayfa Bulunamadı.</h2>
                <a href="/" class="btn btn-primary radius-no"><span class="p-lr15">Anasayfaya Dön</span></a>
            </div>
        </div>
    </div>

@endsection