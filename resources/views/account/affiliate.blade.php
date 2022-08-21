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
                        <li class="breadcrumb-item active" aria-current="page">Arkadaşına Öner</li>
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
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form class="dzSubscribe" ng-submit="AffiliateSave()" id="Affiliate" action="#" method="post">
                                    <div class="dzSubscribeMsg"></div>
                                    <div class="form-group">
                                        <div class="input-group shadow">
                                            <input  required="required" type="text" class="form-control" name="fullname"  placeholder="İsim Soyisim">
                                            <input   required="required" type="tel" class="form-control" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  placeholder="Telefon Numarası">
                                            <div class="input-group-addon">
                                                <button name="submit" type="submit" class="btn btn-primary gradient">
                                                    <i class="las la-paper-plane scale4"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" ng-init="Affiliate()">
                                    <div ng-repeat="item in affiliates" class="col-xl-12 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeInUp;">
                                        <div class="dlab-team style-1 m-b30 m-t10">
                                            <div class="dlab-content">
                                                <div class="clearfix">
                                                    <h4 class="dlab-name"><a href="javascript:void(0);">@{{ item.fullname }}</a></h4>
                                                    <span class="dlab-position">@{{ item.phone }}</span>
                                                </div>
                                                <div class="clearfix">
                                                    <i  ng-if="item.status == 1" class="fa-solid fas fa-user-check" style="font-size: 35px"></i>
                                                </div>
                                                <!-- ul class="dlab-social-icon primary-light">
                                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                                </ul -->
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .icon-bx-wraper.style-7 .icon-content .dlab-title {
                margin-bottom: 15px;
                width: 350px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
@endsection