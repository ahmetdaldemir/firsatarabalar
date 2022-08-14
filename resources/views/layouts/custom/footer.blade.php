<!-- Footer -->

<footer class="site-footer style-1" id="footer"
        style="background-image: url(https://makaanlelo.com/tf_products_007/samar/xhtml/images/background/bg10.png);">
    <div class="footer-top">
        <div class="container">

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="widget widget_about">
                        <h5 class="footer-title">Fırsat Arabalar</h5>
                        <p>Maecenas pellentesque placerat quam, in finibus nisl tincidunt sed. Aliquam magna augue,
                            malesuada ut feugiat eget, cursus eget felis.</p>
                        <div class="dlab-social-icon">
                            <ul>
                                <li><a class="fab fa-facebook-f" href="javascript:void(0);"></a></li>
                                <li><a class="fab fa-instagram" href="javascript:void(0);"></a></li>
                                <li><a class="fab fa-twitter" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Kurumsal</h5>
                        <ul>
                            <?php $about = page('about'); ?>
                            <?php foreach ($about as $item){ ?>
                            <li><a href="{{route('sayfalar',['slug' => $item->slug])}}">{{$item->title}}</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Üyelik</h5>
                        <ul>
                            <?php $account = page('account'); ?>
                            <?php foreach ($account as $item){ ?>
                            <li><a href="{{route('sayfalar',['slug' => $item->slug])}}">{{$item->title}}</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Kullanım Koşulları</h5>
                        <ul>
                            <?php $terms_of_use = page('terms_of_use'); ?>
                            <?php foreach ($terms_of_use as $item){ ?>
                            <li><a href="{{route('sayfalar',['slug' => $item->slug])}}">{{$item->title}}</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="copyright-text">Copyright © 2022 <a href="https://kaffatech.com/" target="_blank">Kaffa Tech</a>. All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<div class="modal" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Üye İşlemleri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="active" id="loginForm-link">Giriş Yap</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" id="registerForm-link">Kayıt Ol</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="loginForm" action="javascript:;" ng-submit="login()" method="post" role="form" style="display: block;">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" tabindex="1"
                                                       class="form-control" placeholder="Telefon Numarası" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2"
                                                       class="form-control" placeholder="Şifre">
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Beni Hatırla</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button type="submit" class="form-control btn btn-login">Giriş Yap  </button>
                                                    </div>
                                                    <div class="col-sm-6 col-sm-offset-3" id="loginMessage"
                                                         style="color: #f00">@{{loginMessage}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="#" tabindex="5"
                                                               class="forgot-password">Şifremi Unuttum?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form id="registerForm" autocomplete="off" action="javascript:;"
                                              ng-submit="register()" method="post" role="form" style="display: none;">
                                            @csrf
                                            <input name="id" value="" type="hidden"/>
                                            <div class="form-group">
                                                <input type="text" name="firstname" id="firstname" tabindex="1"
                                                       class="form-control" placeholder="İsim" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="lastname" id="lastname" tabindex="1"
                                                       class="form-control" placeholder="Soyisim" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1"
                                                       class="form-control" placeholder="Email Adresi" value=""
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" id="phone" tabindex="1"
                                                       class="form-control" placeholder="5xx xxx xx xx" value=""
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2"
                                                       class="form-control" placeholder="Şifre" required>
                                            </div>
                                            @if(env('GOOGLE_RECAPTCHA_KEY'))
                                                <div class="g-recaptcha"  data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                                                </div>
                                            @endif
                                            <script src='https://www.google.com/recaptcha/api.js'></script>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button type="submit" class="form-control btn btn-login">Kayıt
                                                            Ol
                                                        </button>
                                                    </div>
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

            <!--div class="modal-footer">
                <div class="row">
                    <a href="#" class="col-md-6 fb btn">
                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                    </a>

                    <a href="#" class="col-md-6 google btn">
                        <i class="fa fa-google fa-fw"></i> Login with Google+
                    </a>
                </div>
            </div -->
        </div>
    </div>
</div>
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