'use strict';

document.addEventListener('touchstart', ()=>{}, { passive: true });

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

$(function(){

    let loginpopup = null;
    let registerpopup = null;
    let smscodepopup = null;
    let lostpasspopup = null;
    let reviewpopup = null;
    let vehiclerequest = null;

    if( document.querySelector('#loginpopup') != null ) { loginpopup = new bootstrap.Modal(document.querySelector('#loginpopup')); }
    if( document.querySelector('#registerpopup') != null ) { registerpopup = new bootstrap.Modal(document.querySelector('#registerpopup')); }
    if( document.querySelector('#lostpasspopup') != null ) { lostpasspopup = new bootstrap.Modal(document.querySelector('#lostpasspopup')); }
    if( document.querySelector('#smscodepopup') != null ) { smscodepopup = new bootstrap.Modal(document.querySelector('#smscodepopup')); }
    if( document.querySelector('#reviewpopup') != null ) { reviewpopup = new bootstrap.Modal(document.querySelector('#reviewpopup')); }
    if( document.querySelector('#vehiclerequest') != null ) { vehiclerequest = new bootstrap.Modal(document.querySelector('#vehiclerequest')); }

    // Login popup phone masking;
    $("#login-phone, #register-phone, #lostpw-phone").mask('+90 (000) 000 00 00');
    $("#login-phone, #register-phone, #lostpw-phone").on("focus", function(){
        if( $(this).val() == "" ){ $(this).val('+90 '); }
    });

    // Login form submit
    $("#loginpopup form").on("submit", function(e){

        e.preventDefault();
         var data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            phone : $("#login-phone").val().replace(/[^0-9\\.]+/g, ''),
            password : $("#login-password").val(),
        };

        if( data.phone.length != 12 ){
            Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz cep telefonu numarası hatalı.', icon: 'warning', confirmButtonText: 'Tamam' });
        }

        else {

            $("#loginpopup .wo-btn").html('<i class="fad fa-spinner-third fa-spin me-1"></i> Bekleyin...').prop("disabled", true);

            $.post("/giris-yap", data, function(r){
                console.log(r);
                 if(r.data.smscode && r.data.smscode != "" && r.data.smscode != undefined ){
                    loginpopup.hide();
                    setTimeout(()=>{ smscodepopup.show(); }, 50);
                }
                else if( r.status == "success" ){
                    $("#loginpopup .alerts, #loginpopup .alert-danger").prop("hidden", true);
                    $("#loginpopup .alerts, #loginpopup .alert-success").prop("hidden", false);
                    setTimeout(()=>{
                        window.location.href = "/";
                    }, 1500);
                }
                else if( r.status == "fail" ){
                    $("#loginpopup .alerts, #loginpopup .alert-danger").prop("hidden", false);
                    setTimeout(()=>{
                        $("#loginpopup .alerts, #loginpopup .alert-danger").prop("hidden", true);
                        $("#loginpopup .wo-btn").html('<i class="fad fa-sign-in-alt me-1"></i> Giriş Yap').prop("disabled", false);
                    }, 2000);
                }

            }, "json");

        }

    });

    // Register form submit

    var registerform = document.querySelector("#registerform");

    if( typeof(registerform) != 'undefined' && registerform != null){

        registerform.onsubmit = async (e) => {

            e.preventDefault();

            var regPhone = $("#register-phone").val().replace(/[^0-9\\.]+/g, '');

            console.log(regPhone);
            console.log(regPhone.length);

            if( $("#pwd1").val() != $("#pwd2").val() ){
                Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz parolalar birbiri ile eşleşmiyor.', icon: 'warning', confirmButtonText: 'Tamam' });
            }

            else if( $("#pwd1").val().length <= 3 ){
                Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz parola en az 4 karakter olmalıdır.', icon: 'warning', confirmButtonText: 'Tamam' });
            }

            else if( regPhone.length != 12 ){
                Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz cep telefonu numarası hatalı.', icon: 'warning', confirmButtonText: 'Tamam' });
            }

            else {

                $("#registerpopup .wo-btn").html('<i class="fad fa-spinner-third fa-spin me-1"></i> Bekleyin...').prop("disabled", true);

                let response = await fetch('/kayit-ol', {
                    method: 'POST',
                    body:   new FormData(registerform)
                });

                let r = await response.json();

                if( r.status == "success" ){

                    registerpopup.hide();
                    $("#smscodepopup").modal("show");

                } else {

                    Swal.fire({
                        title: 'Dikkat!',
                        text: r.message,
                        icon: 'warning',
                        confirmButtonText: 'Tamam',
                    });

                    $("#registerpopup .wo-btn").html('<i class="fad fa-sign-in-alt me-1"></i> Giriş Yap').prop("disabled", false);

                }

            }

        };
    }

    // SMS Code input masking
    $("#smscode").mask('000000');

    // SMS Code verification form submit
    $("#smscodepopup form").on("submit", function(e){

        e.preventDefault();

        $("#smscodepopup .wo-btn").html('<i class="fad fa-spinner-third fa-spin me-11"></i> Bekleyin...').prop("disabled", true);

        $.post("/sms-dogrulama", { smscode:$("#smscode").val() }, (r)=>{
            if( r.status == "success" ){

                $("#smscodepopup .alerts").prop("hidden", false);
                $("#smscodepopup .alerts .alert-success").prop("hidden", false);
                $("#smscodepopup .wo-btn").prop("hidden", true);

                setTimeout(()=>{
                    smscodepopup.hide();
                    window.location.reload();
                }, 2000);

            } else {

                Swal.fire({
                    title: 'Dikkat!',
                    text: 'Doğrulama kodunuzu kontrol ederek yeniden deneyin.',
                    icon: 'warning',
                    confirmButtonText: 'Tamam',
                });

            }

            $("#smscodepopup .wo-btn").html('<i class="fad fa-long-arrow-right me-1"></i> Doğrula').prop("disabled", false);

        }, "json");

    });

    // Register link click form in any modals
    $('.register-link').on("click", function(){
        loginpopup.hide();
        setTimeout(()=>{ registerpopup.show(); }, 50);
    });

    $('.vehiclerequest').on("click", function(){
        setTimeout(()=>{ vehiclerequest.show(); }, 50);
    });


    // Login link click form in any modals
    $(document).on("click", '.login-link', function(){
        registerpopup.hide();
        lostpasspopup.hide();
        smscodepopup.hide();
        setTimeout(()=>{ loginpopup.show(); }, 50);
    });

    // Login link click form in any modals
    $('.lostpass-link').on("click", function(){
        loginpopup.hide();
        setTimeout(()=>{ lostpasspopup.show(); }, 50);
    });

    // LostPassword form submit button actions
    $("form#lostpassword").on("submit", function(e){

        $("form#lostpassword button").prop("disabled", true);

        var phone = $("#lostpw-phone").val();

        $.post("/sifremi-unuttum", { phone:phone }, function(r){

            if( r.status == "success" ){
                $("form#lostpassword").before('<div class="alert alert-success text-center mb-0 p-4">Yeni şifrenizi SMS ile gönderdik.<br>Yeni şifreniz ile <a href="javascript:;" class="login-link">buraya</a> tıklayarak giriş yapabilirsiniz.</div>').remove();
            }

            else {
                $("form#lostpassword .alert-danger").prop("hidden", false);
                setTimeout(function(){
                    $("form#lostpassword .alert-danger").prop("hidden", false);
                }, 3000);
                $("form#lostpassword button").prop("disabled", false);
            }

        }, "json");

        e.preventDefault();

    });

    // Remove account button click event
    $(".remove-account-btn").on("click", ()=>{

        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu işlem hesabınızı tamamen kapatacak!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, kaldır!',
            cancelButtonText: 'Hayır, kalsın'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post("/hesabim/sil", function(r){
                    Swal.fire( 'Kaldırıldı!', 'Hesabınız başarıyla kaldırıldı.', 'success');
                    setTimeout(function(){
                        window.location.href = "/";
                    }, 5000);
                });

            }
        })

    });

    // Delete message button click
    $(".delete-message").on("click", function(e){
        var elm = $(this);
        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu işlem seçili mesajı silecek!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Hayır, kalsın'
        }).then((result) => {
            if (result.isConfirmed){
                $.post("/hesabim/mesajlarim/sil", { message_id:e.target.dataset.messageid }, function(r){
                    if( r.status == "success" ){
                        elm.parents("tr").remove();
                        Swal.fire( 'Silindi!', 'Seçtiğiniz mesaj başarıyla silindi.', 'success' );
                    }
                }, "json");
            }
        });
    });

    // Delete all messages button click
    if( document.querySelector(".delete-all-messages") ){

        document.querySelector(".delete-all-messages").addEventListener("click", (e)=>{

            Swal.fire({
                title: 'Emin misiniz?',
                text: 'Bu işlem tüm mesajlarınızı tamamen silecek!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Hayır, kalsın'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("/hesabim/mesajlarim/tumunu-sil");
                    document.querySelector(".messages-table tbody").innerHTML='<tr><td colspan="5" class="text-center" height="70">Hiç mesaj yok!</td></tr>';
                    Swal.fire({
                        title: 'Silindi!',
                        text: 'Tüm mesajlarınız başarıyla silindi.',
                        icon: 'success',
                        confirmButtonText: 'Tamam',
                    });
                }
            })

        });
    }

    // Add review button click
    if( document.querySelector("#add-review") ){
        document.querySelector("#add-review").addEventListener("click", ()=>{
            reviewpopup.show();
        });
    }


});

$( window ).on( "load", function() {
    $(".preloader-outer").delay(100).fadeOut();
    $(".loader").delay(100).fadeOut("fast");
});

// var origTitle = document.title;
//
// $(window).on("blur", function(){
//     // $("#favicon").attr("href", "/Public/web/img/favicon-white.png");
//     document.title = "Bizi Unutma!";
// }).on("focus", function(){
//     // $("#favicon").attr("href", "/Public/web/img/favicon-color.png");
//     document.title = origTitle;
// });


jQuery.fn.serializeObject = function () {
    var formData = {};
    var formArray = this.serializeArray();
    for(var i = 0, n = formArray.length; i < n; ++i)
        formData[formArray[i].name] = formArray[i].value;
    return formData;
};

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
