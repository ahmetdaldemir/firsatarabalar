@extends('layouts.view')
@section('content')
    <div class="dlab-bnr-inr overlay-gradient-dark text-center" style="background-image: url(images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Üyelik Sayfası</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <section class="content-inner about-wraper-1"
             style="padding-top:25px;padding-bottom:0;background-image: url(images/background/bg15.png); background-size: contain; background-position: center right; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="border-right: 1px solid #DDD;">
                    @if($errors->login->any())
                        <div class="alert alert-warning"><h6>{{$errors->login->first()}}</h6></div>
                    @endif
                    <div class="row form-group"><h4 style="text-align:center;font-weight: normal;">Giriş Yap</h4></div>
                    <form id="passwordForm" action="{{route('sifremi-degistir')}}" method="post" role="form"
                          style="display: block;">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="text" name="phone" id="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                       class="form-control" placeholder="Telefon Numarası" value="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Email Adresi" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="smscode" id="smscode" class="form-control" placeholder="SMS Kod"
                                       required autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="password" id="password" class="form-control" placeholder="Şifre"
                                       required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group" style="    margin: 20px;">
                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-3 text-center">
                                    <button type="submit" class="form-control btn btn-login" style="width: 50%;">Şifre
                                        Değiştirme Bağlantısı
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <style>
        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        }

        .panel-login > .panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align: center;
        }

        .panel-login > .panel-heading a {
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login > .panel-heading a.active {
            color: #029f5b;
            font-size: 18px;
        }

        .panel-login > .panel-heading hr {
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        }

        .panel-login input[type="text"], .panel-login input[type="email"], .panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login input:hover,
        .panel-login input:focus {
            outline: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }

        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }

        .forgot-password {
            text-decoration: underline;
            color: #888;
        }

        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }

        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }

        #loginForm {
            padding: 10px;
        }

        #loginForm .form-group {
            margin-bottom: 10px;
        }

        #registerForm {
            padding: 10px;
        }

        #registerForm .form-group {
            margin-bottom: 10px;
        }
    </style>
@endsection