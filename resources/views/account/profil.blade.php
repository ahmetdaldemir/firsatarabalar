@extends('layouts.view_new')
@section('content')


    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Profil</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);padding-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 m-b30">
                  @include('account.leftmenu')
                </div>
                <div class="col-xl-9 col-lg-9 m-b30">
                    <div class="card">
                        <div class="container m-t10 m-b15">
                            <h3>Hesap Bilgisi</h3>
                            <div class="row align-items-center">
                                <form class="dlab-form" method="POST" action="{{route('account.customer.update')}}"  style="margin-bottom: 10px">
                                    @csrf
                                    <input type="hidden" class="form-control" name="customer_id"
                                           value="{{$profil->id}}">
                                    <input type="hidden" class="form-control" name="reCaptchaEnable" value="0">
                                    <div class="row">
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input name="firstname" type="text" required="" class="form-control" value="{{$profil->firstname}}"  style="padding-bottom: 0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input name="lastname" type="text" class="form-control" required="" value="{{$profil->lastname}}"  style="padding-bottom: 0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                </div>
                                                <input name="email" type="text" required="" class="form-control"   value="{{$profil->email}}"  style="padding-bottom: 0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input name="phone" type="text" required="" class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="{{$profil->phone}}"  style="padding-bottom: 0">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="btn btn-primary" style="padding: 5px 15px;">  Kaydet <i class="fa fa-angle-right m-l10"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="container m-t10  m-b15">
                            <h3>Şifre Güncelleme</h3>
                            <div class="row align-items-center">
                                <form class="dlab-form" method="POST"
                                      action="{{route('account.customer.password.update')}}" style="margin-bottom: 10px">
                                    @csrf
                                    <input type="hidden" class="form-control" name="customer_id"
                                           value="{{$profil->id}}">
                                    <div class="row">
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <label>Şifre</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input name="password" type="password" required="" class="form-control"  required autocomplete="off" style="padding-bottom: 0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <label>Şifre Tekrar</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input id="password" type="password" class="form-control"  name="password_confirmation" required autocomplete="off" style="padding-bottom: 0">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="btn btn-primary" style="padding: 5px 15px;"> Kaydet <i class="fa fa-angle-right m-l10"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .form-control {
        font-size: 1rem;
        font-weight: 400;
        font-family: "Source Sans Pro", sans-serif;
        padding: 0px 12px;
        color: #586b89;
        border: 1px solid #ced7da;
        border-radius: 4px;
        background-clip: unset;
        caret-color: #586b89;
        box-shadow: none !important;
        outline: none !important;
    }
</style>
@endsection