@extends('layouts.view')
@section('content')


    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
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
                                <form class="dlab-form" method="POST" action="{{route('account.customer.update')}}">
                                    @csrf
                                    <input type="hidden" class="form-control" name="customer_id"
                                           value="{{$profil->id}}">
                                    <input type="hidden" class="form-control" name="reCaptchaEnable" value="0">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-user"></i></span>
                                                </div>
                                                <input name="firstname" type="text" required="" class="form-control"
                                                       value="{{$profil->firstname}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-user"></i></span>
                                                </div>
                                                <input name="lastname" type="text" class="form-control" required=""
                                                       value="{{$profil->lastname}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-envelope"></i></span>
                                                </div>
                                                <input name="email" type="text" required="" class="form-control"
                                                       value="{{$profil->email}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-phone"></i></span>
                                                </div>
                                                <input name="phone" type="text" required="" class="form-control"
                                                       pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="{{$profil->phone}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="btn btn-primary">
                                                Kaydet <i
                                                        class="fa fa-angle-right m-l10"></i></button>
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
                                      action="{{route('account.customer.password.update')}}">
                                    @csrf
                                    <input type="hidden" class="form-control" name="customer_id"
                                           value="{{$profil->id}}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Şifre</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-key"></i></span>
                                                </div>
                                                <input name="password" type="password" required="" class="form-control"
                                                       required
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Şifre Tekrar</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="la la-lock"></i></span>
                                                </div>
                                                <input id="password" type="password" class="form-control"
                                                       name="password_confirmation" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="btn btn-primary">
                                                Kaydet <i
                                                        class="fa fa-angle-right m-l10"></i></button>
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

@endsection