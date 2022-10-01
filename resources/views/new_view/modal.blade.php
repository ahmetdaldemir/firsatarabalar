<div class="modal fade wo-loginpopup" tabindex="-1" role="dialog" id="loginpopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="wo-modalcontent modal-content">
            <div class="wo-popuptitle d-flex justify-content-between align-items-center">
                <h4><i class="fad fa-sign-in-alt me-1"></i> Giriş Yap</h4>
                <a href="javascript:void(0);" class="close"><i class="fal fa-times" data-bs-dismiss="modal"></i></a>
            </div>
            <div class="modal-body">
                <form class="wo-themeform wo-formlogin" action="#" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="alerts mb-3" style="font-size: 14px;" hidden>
                                <div class="alert alert-success mb-0" hidden><i class="fad fa-check me-1"></i> Giriş başarılı, lütfen bekleyin...</div>
                                <div class="alert alert-danger mb-0" hidden><i class="fal fa-times me-1"></i> Giriş başarısız, lütfen yeniden deneyin...</div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-3">Cep Telefonu:</label>
                            <div class="col-9">
                                <input id="login-phone" type="text" class="form-control" name="phone" value="+90" placeholder="+90 (XXX) XXX XX XX" required>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-3">Parolanız:</label>
                            <div class="col-9">
                                <input type="password" id="login-password" class="form-control" name="password" placeholder="Parolanızı yazın" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="wo-checkbox">
                                <input id="remember" type="checkbox">
                                <label for="remember"><span> &nbsp;Giriş için bu cihaza güven.</span></label>
                            </div>
                            <button type="submit" class="btn wo-btn"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yap</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer wo-loginfooterinfo">
                <a href="javascript:;" class="register-link"><i class="fad fa-edit me-1"></i> Hemen Kayıt Ol</a>
                <a href="javascript:;" class="lostpass-link"><i class="fad fa-lock-open-alt me-1"></i> Şifremi Unuttum</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade wo-loginpopup wo-registerpopup" tabindex="-1" role="dialog" id="registerpopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="wo-modalcontent modal-content">
            <div class="wo-popuptitle d-flex justify-content-between align-items-center">
                <h4><i class="fad fa-edit me-1"></i> Hemen Kayıt Ol</h4>
                <a href="javascript:void(0);" class="close"><i class="fal fa-times" data-bs-dismiss="modal"></i></a>
            </div>
            <div class="modal-body">
                <form id="registerform" class="wo-themeform wo-formlogin" action="#" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="alerts mb-3" style="font-size: 14px;" hidden>
                                <div class="alert alert-success mb-0" hidden><i class="fad fa-check me-1"></i> Kayıt işlemi başarılı, lütfen bekleyin...</div>
                                <div class="alert alert-danger mb-0" hidden><i class="fal fa-times me-1"></i> Kayıt işlemi başarısız, lütfen yeniden deneyin...</div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-md-12 col-lg-3">İsminiz :</label>
                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-lg-6 col-6 pe-1">
                                        <input type="text" class="form-control" name="firstname" placeholder="İsminiz" autocomplete="off" required>
                                    </div>
                                    <div class="col-lg-6 col-6 ps-1">
                                        <input type="text" class="form-control" name="lastname" placeholder="Soysminiz" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">

                            </div>
                            <div class="col-lg-6 col-sm-12"></div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-md-12 col-lg-3">Cep Telefonu:</label>
                            <div class="col-md-12 col-lg-9">
                                <input id="register-phone" type="text" class="form-control" name="phone" placeholder="+90 (XXX) XXX XX XX" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-md-12 col-lg-3">E-Posta Adresiniz :</label>
                            <div class="col-md-12 col-lg-9">
                                <input type="email" class="form-control" name="email" placeholder="eposta@adresiniz.com" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-md-12 col-lg-3">Parolanız :</label>
                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-lg-6 col-6 pe-1">
                                        <input id="pwd1" type="password" class="form-control" name="password" placeholder="Parolanız" autocomplete="off" required>
                                    </div>
                                    <div class="col-lg-6 col-6 ps-1">
                                        <input id="pwd2" type="password" class="form-control" name="password2" placeholder="Parola (Tekrar)" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row">
                            <div class="col-md-12 col-lg-6 wo-checkbox d-flex justify-content-between align-items-start">
                                <input id="register-check" type="checkbox" style="margin-top:5px; margin-right: 10px" name="register-check" required>
                                <label for="register-check"><span>Kayıt olarak <a href="{{route('sayfalar',['slug' =>'kisisel-verilerin-korunmasi-kanunu'])}}" target="_blank">KVKK</a> ve
                                        <a href="{{route('sayfalar',['slug' =>'kurallar-kosullar'])}}" target="_blank">Kurallar &amp; Koşullarımızı</a> kabul etmiş olursunuz</span></label>
                            </div>

                            <button type="submit" class="btn wo-btn col-md-12 col-lg-6"><i class="fad fa-long-arrow-right me-1"></i> Devam Et</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer wo-loginfooterinfo d-flex justif-content-center align-items-center">
                <div>Zaten bir hesabınız var mı? O zaman hemen</div>
                <a href="javascript:;" class="login-link"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yapın</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade wo-loginpopup wo-lospasspopup" tabindex="-1" role="dialog" id="lostpasspopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="wo-modalcontent modal-content">
            <div class="wo-popuptitle d-flex justify-content-between align-items-center">
                <h4><i class="fad fa-lock-open-alt me-1"></i> Şifremi Unuttum</h4>
                <a href="javascript:void(0);" class="close"><i class="fal fa-times" data-bs-dismiss="modal"></i></a>
            </div>
            <div class="modal-body">
                <form id="lostpassword" class="wo-themeform wo-formlogin" action="#" method="post">
                    @csrf
                    <div class="container">
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-3">Cep Telefonu:</label>
                            <div class="col-9">
                                <input id="lostpw-phone" type="text" class="form-control" name="phone" placeholder="+90 (XXX) XXX XX XX" required>
                            </div>
                        </div>
                        <div class="alert alert-danger" hidden><i class="fad fa-times me-2"></i> Bu cep telefonu kayıtlı değil! Lütfen yeniden deneyin.</div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn wo-btn"><i class="fad fa-long-arrow-right me-1"></i> Gönder</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer wo-loginfooterinfo d-flex justif-content-center align-items-center">
                <div>Zaten bir hesabınız var mı? O zaman hemen</div>
                <a href="javascript:;" class="login-link"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yapın</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade wo-loginpopup wo-smscodepopup" tabindex="-1" role="dialog" id="smscodepopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 420px">
        <div class="wo-modalcontent modal-content">
            <div class="wo-popuptitle d-flex justify-content-between align-items-center">
                <h4><i class="fad fa-comment-alt-lines me-1"></i> SMS Doğrulama</h4>
                <a href="javascript:void(0);" class="close"><i class="fal fa-times" data-bs-dismiss="modal"></i></a>
            </div>
            <div class="modal-body">
                <form id="smscodeform" class="wo-themeform wo-formlogin" action="#" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="alerts mb-3" style="font-size: 14px;" hidden>
                                <div class="alert alert-success mb-0" hidden><i class="fad fa-check me-1"></i> SMS Doğrulama başarılı, lütfen bekleyin...</div>
                                <div class="alert alert-danger mb-0" hidden><i class="fal fa-times me-1"></i> SMS Doğrulama başarısız, lütfen yeniden deneyin...</div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-start align-items-center mb-3">
                            <label class="col-4">Doğrulama Kodu:</label>
                            <div class="col-8">
                                <input id="smscode" type="text" class="form-control" name="smscode" placeholder="XXXXXX" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn wo-btn"><i class="fad fa-long-arrow-right me-1"></i> Doğrula</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer wo-loginfooterinfo d-flex justif-content-center align-items-center">
                <div>Zaten bir hesabınız var mı? O zaman hemen</div>
                <a href="javascript:;" class="login-link" style="width: auto"><i class="fad fa-sign-in-alt me-1"></i> Giriş Yapın</a>
            </div>
        </div>
    </div>
</div>
