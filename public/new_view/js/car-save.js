'use strict';

var changed = false;

function carloader( mode ){
    const loader = document.querySelector(".car-adder-loading");
    if( mode == "hide" ){
        loader.classList.remove("d-flex");
        loader.hidden = true;
    } else if( mode == "show" ){
        loader.classList.add("d-flex");
        loader.hidden = false;
    }
}

var sendform = 0;

function buildcardata(){

    if( sendform ){ return; }

    let data = {};
    let fd = new FormData();

    let continueForm = 1;

    carloader("show");

    data.car = {};
    [].slice.call( document.querySelector("#collapseOne form").elements ).forEach((item, i) => {
        if( item.id != "" ){
            if( typeof 'undefined' != item.attributes.required && item.value == "" ){
                item.focus({preventScroll:true});
            } else {
                data.car[item.id] = item.value;
            }
        }
    });

    if( Object.keys(data.car).length == 0 ){

        swal('warning', 'Eksik Alanlar', 'Araç seçimi bölümünde doldurmadığınız alanlar var!', 'Tamam', false);

        carloader("hide");

        let target = $("#headingOne button").data("bsTarget");

        if( !$(target).hasClass("show") ){
            $("#headingOne button").click();
            setTimeout(function(){
                $("#collapseOne form :input:visible:enabled:first").focus();
            }, 200);
        }

        continueForm = 0;

        return;

    }

    data.damage = {};
    [].slice.call( document.querySelector(".car-parts").children ).forEach((item, i) => {
        data.damage[item.classList[0]] = item.classList[1];
    });

    $(".islem-table input[type=radio]:checked").each(function( i, item ){
        data.damage[$(item).attr("name")] = $(item).val();
    });

    data.details = {
        "car_details":         $("#car_details").val(),
        "plate":               $("#plate").val(),
        "sahip":               $("#sahip").val(),
        "car_city":            $("#car_city").val(),
        "car_state":           $("#car_state").val(),
        "car_mahalle":         $("#car_mahalle").val(),
        "tramer":              $("#tramer").val(),
        "tramerValue":         $("#tramerValue").val(),
        "car_notwork":         $("#car_notwork").val(),
        "car_exterior_faults": $("#car_exterior_faults").val(),
        "car_interior_faults": $("#car_interior_faults").val(),
        "date_inspection":     $("#date_inspection").val(),
        "gal_fiyat_1":         $("#gal_fiyat_1").val(),

        "durum_sasi":          $("input[name='durum_sasi']:checked").val(),
        "durum_direk":         $("input[name='durum_direk']:checked").val(),
        "durum_podye":         $("input[name='durum_podye']:checked").val(),
        "durum_airbag":        $("input[name='durum_airbag']:checked").val(),
        "durum_lastik":        $("input[name='durum_lastik']:checked").val(),
        "durum_km":            $("input[name='durum_km']:checked").val(),
        "durum_satilamaz":     $("input[name='durum_satilamaz']:checked").val(),
        "durum_onArkaBagaj":   $("input[name='durum_onArkaBagaj']:checked").val(),

    };

    if( document.querySelector("#expert_report_1").files[0] ){ fd.append("expert_report_1", document.querySelector("#expert_report_1").files[0]); }
    if( document.querySelector("#expert_report_2").files[0] ){ fd.append("expert_report_2", document.querySelector("#expert_report_2").files[0]); }
    if( document.querySelector("#expert_report_3").files[0] ){ fd.append("expert_report_3", document.querySelector("#expert_report_3").files[0]); }
    if( document.querySelector("#expert_report_4").files[0] ){ fd.append("expert_report_4", document.querySelector("#expert_report_4").files[0]); }

    if( document.querySelector("#tramerPhoto").files[0] ){ fd.append("tramer_photo", document.querySelector("#tramerPhoto").files[0]); }

    data.photos = {};
    [].slice.call( document.querySelectorAll("#photo-select input[type=file].file_input") ).forEach((item, i) => {
        if( item.id != "" ){
            data.photos[i] = item.id;
            fd.append( item.id, item.files[0]);
        }
    });
    if( Object.keys(data.photos).length == 0 ){
        swal('warning', 'Eksik Fotoğraf', 'Fotoğraf seçimi bölümünde hiç fotoğraf yok!', 'Tamam', false);
        carloader("hide");
        document.querySelector("#photos button").click();
        continueForm = 0;
    }

    data.payment = {};
    if( $("input[name='odeme_tipi']:checked").val() == "HV" ){
        data.payment["payment_method"] = "HV";
    } else {
        data.payment["payment_method"] = "KK";
        [].slice.call( document.querySelector("#payment-form").elements ).forEach((item, i) => {
            if( item.id != "" )
                data.payment[item.id] = item.value;
        });
    }

    var payment_continue = 1;
    if( data.payment["payment_method"] == "KK" ){
        if( $("#card_holder").val() == "" ) payment_continue = 0;
        if( $("#card_number").val() == "" ) payment_continue = 0;
        if( $("#card_number").val().length < 16 ) payment_continue = 0;
        if( $("#card_mo").val() == "" ) payment_continue = 0;
        if( $("#card_yr").val() == "" ) payment_continue = 0;
        if( $("#card_cv2").val() == "" ) payment_continue = 0;
    }

    if( !payment_continue ){
        carloader("hide");
        Swal.fire({
            title: 'Dikkat!',
            text: 'Kredi kartı bilgilerinizi kontrol ederek yeniden deneyin.',
            icon: 'warning',
            confirmButtonText: 'Tamam',
        });
        return;
    }

    // if( document.querySelector("#video").files[0] ){ fd.append("video", document.querySelector("#video").files[0]); }
    // if( document.querySelector("#video1").files[0] ){ fd.append("video", document.querySelector("#video1").files[0]); }


    for (const [key, value] of Object.entries(data)){
        fd.append(`${key}`, JSON.stringify(value));
    }

    if( continueForm ){

        sendform = 1;

        $.ajax({
            url : '/car-save',
            type : 'POST',
            data : fd,
            dataType: 'json',
            processData: false,
            contentType: false,
            success : function(r) {
                if( r.status == "success" ){

                    changed = false;

                    if( r.data.payment_method == "KK" ){
                        var pform = $("<form />", { id:"pform", method:"post", action:"/p/odeme-yap" }).appendTo("body");
                        $("<input />", { type:"hidden", name:"payment_id", value:r.data.payment_id }).appendTo("#pform");
                        $("<input />", { type:"hidden", name:"CardHolderName", value:$('#card_holder').val() }).appendTo("#pform");
                        $("<input />", { type:"hidden", name:"Pan", value:$('#card_number').val() }).appendTo("#pform");
                        $("<input />", { type:"hidden", name:"ExpiryMo", value:$('#card_mo').val() }).appendTo("#pform");
                        $("<input />", { type:"hidden", name:"ExpiryYr", value:$('#card_yr').val() }).appendTo("#pform");
                        $("<input />", { type:"hidden", name:"Cvv2", value:$('#card_cv2').val() }).appendTo("#pform");
                        $("#pform").submit();
                    }
                    else if( r.data.payment_method == "HV" ){
                        window.location.href = '/havale-bildirimi';
                    }
                }
            }
        });

    } else {
        carloader("hide");
    }

    return "Car data build success.";

}

function swal( type, title, text, confirm, cancel = false ){

    let canc = ( cancel.length > 0 ) ? true : false;

    Swal.fire({
        icon: type,
        title: title,
        text: text,
        showCancelButton: canc,
        confirmButtonText: confirm,
        cancelButtonText: cancel,
    });

    return true;

}

function scrollWin(){
    setTimeout(function(){
        let top = 90;
        if( $(window).width() < 600 ){ top = 140; }
        let wp = $(".accordion-button[aria-expanded='true']").offset().top - top;
        $("html, body").animate({scrollTop:wp}, 250);
    }, 200);
}

$(function(){

    scrollWin();

    if( document.getElementById('ConfirmModal') ){
        var ConfirmModal = new bootstrap.Modal(document.getElementById('ConfirmModal'), {
            keyboard: false,
            backdrop: "static"
        });
        ConfirmModal.show();
    }

    $("input[name='odeme_tipi']").on("change", function(){
        $(".payment_type").prop("hidden", true);
        $("#p" + $(this).val()).prop("hidden", false);
    });

    $("#card_number").mask("0000-0000-0000-0000");
    $("#card_cv2").mask("000");

    $("#car_add_smscode").mask('000000');

    $('#km').mask('000.000.000.000.000', {reverse: true});
    $('#tramerValue').mask('000.000.000.000.000', {reverse: true});

    $('#gal_fiyat_1').mask('000.000.000.000.000', {reverse: true});
    $('#gal_fiyat_2').mask('000.000.000.000.000', {reverse: true});
    $('#gal_fiyat_3').mask('000.000.000.000.000', {reverse: true});

    // Login popup phone masking;
    $("#car-register-phone").mask('+90 (000) 000 00 00');
    $("#car-register-phone").on("focus", function(){
        if( $(this).val() == "" ){ $(this).val('+90 '); }
    });

    $("#payment-form").on("submit", function(e){
        e.preventDefault();
        buildcardata();
    });

    $(".accordion-body form").not('#payment-form, #car-register-form, #car-smscodeform').on("submit", function(e){

        e.preventDefault();

        if( e.target.id == "photo-select" ){
            let photos = {};
            [].slice.call( document.querySelectorAll("#photo-select input[type=file].file_input") ).forEach((item, i) => {
                if( item.id != "" ){ photos[i] = item.id; }
            });
            if( Object.keys(photos).length == 0 ){
                swal('warning', 'Eksik Fotoğraf', 'Fotoğraf seçimi bölümünde hiç fotoğraf yok!', 'Tamam', false);
                return;
            }
        }

        $(".accordion-button").addClass("collapsed");

        var parent = $(this).parents(".accordion-item");
        let btn = $(parent).next(".accordion-item").find(".accordion-button");

        $(btn).attr("data-bs-toggle", "collapse");
        $(btn).click();

        scrollWin();

    });

    $("button.next").on("click", function( e ){
        var parent = $( e.target ).parents(".accordion-item");
        let btn = $(parent).next(".accordion-item").find(".accordion-button");
        scrollWin();
    });

    $("button.prev").on("click", (e)=>{
        $(".accordion-button").addClass("collapsed");
        var parent = $(e.target).parents(".accordion-item");
        let btn = $(parent).prev(".accordion-item").find(".accordion-button");
        $(btn).attr("data-bs-toggle", "collapse");
        $(btn).click();
        scrollWin();
    });


    // Customer Register
    $("#car-register-form").on("submit", function(e){

        e.preventDefault();

        if( $("#car-pwd1").val() != $("#car-pwd2").val() ){
            Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz parolalar birbiri ile eşleşmiyor.', icon: 'warning', confirmButtonText: 'Tamam' });
        }

        else if( $("#car-pwd1").val().length <= 3 ){
            Swal.fire({ title: 'Dikkat!', text: 'Girdiğiniz parola en az 4 karakter olmalıdır.', icon: 'warning', confirmButtonText: 'Tamam' });
        }

        else {

            $("#car-register-form button[type='submit']").html('<i class="fad fa-spinner-third fa-spin me-1"></i> Bekleyin...').prop("disabled", true);

            var registerform = document.querySelector("#car-register-form");
            var formData = new FormData(registerform);

            $.ajax({
                 url: "/kayit-ol",
                 type: "post",
                 cache: false,
                 data: formData,
                 dataType: 'json',
                 processData: false,
                 contentType: false,
                 success: function(r){
                     if( r.status == "success" ){
                         $("#car-register-form").prop("hidden", true);
                         $("#car-smscodeform").prop("hidden", false);
                     } else {
                         Swal.fire({
                             title: 'Dikkat!',
                             text: r.message,
                             icon: 'warning',
                             confirmButtonText: 'Tamam',
                         });
                         $("#car-register-form button[type='submit']").html('<i class="fad fa-long-arrow-right me-1"></i> Devam Et').prop("disabled", false);
                     }
                 }
             });

        }

    });

    $(".sms-code-back").on("click", function(){
        $("#car-register-form").prop("hidden", false);
        $("#car-smscodeform").prop("hidden", true);
    });


    // SMS Confirmation
    $("#car-smscodeform").on("submit", function(e){

        e.preventDefault();

        $("#car-smscodeform button[type='submit']").html('<i class="fad fa-spinner-third fa-spin me-1"></i> Bekleyin...').prop("disabled", true);

        $.post("/sms-dogrulama", { smscode:$("#car_add_smscode").val() }, function(r){
            if( r.status == "success" ){
                $("#car-smscodeform .alerts").prop("hidden", false);
                $("#car-smscodeform .alerts .alert-success").prop("hidden", false);
                $("#car-smscodeform button[type='submit']").prop("hidden", true);
                $(".smscode-inputs").prop("hidden", true);
                $(".smscode-continue").prop("hidden", false);
            } else {
                Swal.fire({
                    title: 'Dikkat!',
                    text: 'Doğrulama kodunuzu kontrol ederek yeniden deneyin.',
                    icon: 'warning',
                    confirmButtonText: 'Tamam',
                });
            }
            $("#car-smscodeform button[type='submit']").html('<i class="fad fa-long-arrow-right me-1"></i> Doğrula').prop("disabled", false);
        }, "json");

    });


    // Card animatons;
    $("#card_number").on("input", function(){
        $(".ill-card-number").html( $(this).val() );
    });

    $("#card_holder").on("input", function(){
        $(".ill-card-holder").html( $(this).val() );
    });

    $("#card_mo").on("change", function(){
        $(".ill-card-yr .mo").html( $(this).val() );
    });

    $("#card_yr").on("change", function(){
        $(".ill-card-yr .yr").html( $(this).val().substr(2,2) );
    });

    // Detect browser back button press and click a elements closets car adder accordion
    $(":input", $("#accordionExample")).change(function(){ changed = true; });


});

window.onbeforeunload = function(e) {
    if(changed) {
        return 'You have unsaved content, would you really like to leave the page? All your changes will be lost.';
    }
};
