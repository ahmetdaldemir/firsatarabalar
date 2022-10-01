'use strict';

var changed = false;

// Step One
$(function(){

    $("#step-one-form").on("submit", function(e){
        e.preventDefault();
        var data = $(this).serializeObject();
        $("#step-one-form button[type='submit']").html("Lütfen bekleyin...").prop("disabled", true);
        $.post("/car/save", { step:1, customers_cars_id:customers_cars_id, data:data }, function(r){
            if( r.status == "success" ){
                $("#step-one-form button[type='submit']").html('<i class="fad fa-long-arrow-right me-1"></i> Devam Et').prop("disabled", false);
                customers_cars_id = r.data.customers_car_id;
                $("#dropzone_car_id").val(customers_cars_id);
                $('[data-bs-target="#damage-selection-data"]').attr("data-bs-toggle", "collapse").click();
            }
        }, "json");
    });

    $("#step-two-form").on("submit", function(e){

        e.preventDefault();

        $("#step-two-form button[type='submit']").html("Lütfen bekleyin...").prop("disabled", true);

        let fd = new FormData();

        var damage = {};
        [].slice.call( document.querySelector(".car-parts").children ).forEach((item, i) => { damage[item.classList[0]] = item.classList[1]; });
        $(".islem-table input[type=radio]:checked").each(function( i, item ){ damage[$(item).attr("name")] = $(item).val(); });

        fd.append("step", 2);
        fd.append("customers_cars_id", customers_cars_id);
        fd.append("damage", JSON.stringify(damage));
        fd.append("tramer", $("#tramer").val());
        fd.append("tramerValue", $("#tramerValue").val());
        if( document.querySelector("#tramerPhoto").files[0] ){
            fd.append("tramer_photo", document.querySelector("#tramerPhoto").files[0]);
        }

        $.ajax({
            url : '/car/save',
            type : 'POST',
            data : fd,
            dataType: 'json',
            processData: false,
            contentType: false,
            success : function(r) {
                if( r.status == "success" ){
                    $("#step-two-form button[type='submit']").html('<i class="fad fa-long-arrow-right me-1"></i> Devam Et').prop("disabled", false);
                    $('[data-bs-target="#arac-bilgileri-data"]').attr("data-bs-toggle", "collapse").click().focus();
                }
            }
        });

    });

    $("#step-three-form").on("submit", function(e){

        e.preventDefault();

        $("#step-three-form button[type='submit']").html("Lütfen bekleyin...").prop("disabled", true);

        let fd = new FormData();

        fd.append("step", 3);
        fd.append("customers_cars_id", customers_cars_id);

        fd.append("car_details", $("#car_details").val());
        fd.append("car_notwork", $("#car_notwork").val());
        fd.append("car_exterior_faults", $("#car_exterior_faults").val());
        fd.append("car_interior_faults", $("#car_interior_faults").val());
        fd.append("bakim_gecmisi", $("#bakim_gecmisi").val());
        fd.append("date_inspection", $("#date_inspection").val());
        fd.append("gal_fiyat_1", $("#gal_fiyat_1").val());

        fd.append("durum_sasi", $("input[name='durum_sasi']:checked").val());
        fd.append("durum_direk", $("input[name='durum_direk']:checked").val());
        fd.append("durum_podye", $("input[name='durum_podye']:checked").val());
        fd.append("durum_airbag", $("input[name='durum_airbag']:checked").val());
        fd.append("durum_lastik", $("input[name='durum_lastik']:checked").val());
        fd.append("durum_km", $("input[name='durum_km']:checked").val());
        fd.append("durum_satilamaz", $("input[name='durum_satilamaz']:checked").val());
        fd.append("durum_onArkaBagaj", $("input[name='durum_onArkaBagaj']:checked").val());

        if( document.querySelector("#expert_report_1").files[0] ){ fd.append("expert_report_1", document.querySelector("#expert_report_1").files[0]); }
        if( document.querySelector("#expert_report_2").files[0] ){ fd.append("expert_report_2", document.querySelector("#expert_report_2").files[0]); }
        if( document.querySelector("#expert_report_3").files[0] ){ fd.append("expert_report_3", document.querySelector("#expert_report_3").files[0]); }
        if( document.querySelector("#expert_report_4").files[0] ){ fd.append("expert_report_4", document.querySelector("#expert_report_4").files[0]); }

        $.ajax({
            url : '/car/save',
            type : 'POST',
            data : fd,
            dataType: 'json',
            processData: false,
            contentType: false,
            success : function(r) {
                if( r.status == "success" ){
                    $("#step-three-form button[type='submit']").html('<i class="fad fa-long-arrow-right me-1"></i> Devam Et').prop("disabled", false);
                    $('[data-bs-target="#photos-area"]').attr("data-bs-toggle", "collapse").click().focus();
                }
            }
        });

    });

    $("#step-photo-continue").on("click", function(e){
        $('[data-bs-target="#payment-data"]').attr("data-bs-toggle", "collapse").click().focus();
    });

    $("#step-five-form").on("submit", function(e){

        e.preventDefault();

        var payment_continue = 1;

        if( $("#card_holder").val() == "" ) payment_continue = 0;
        if( $("#card_number").val() == "" ) payment_continue = 0;
        if( $("#card_number").val().length < 16 ) payment_continue = 0;
        if( $("#card_mo").val() == "" ) payment_continue = 0;
        if( $("#card_yr").val() == "" ) payment_continue = 0;
        if( $("#card_cv2").val() == "" ) payment_continue = 0;

        if( !payment_continue ){
            Swal.fire({
                title: 'Dikkat!',
                text: 'Kredi kartı bilgilerinizi kontrol ederek yeniden deneyin.',
                icon: 'warning',
                confirmButtonText: 'Tamam',
            });
            return;
        }

        else {

            $("#step-five-form button[type='submit']").prop("disabled", true);

            changed = false;
            $.post("/car/save", { step:5, customers_cars_id:customers_cars_id, payment_method:"KK" }, function(r){
                if( r.status == "success" ){
                    var pform = $("<form />", { id:"pform", method:"post", action:"/p/odeme-yap" }).appendTo("body");
                    $("<input />", { type:"hidden", name:"payment_id", value:r.data.payment_id }).appendTo("#pform");
                    $("<input />", { type:"hidden", name:"CardHolderName", value:$('#card_holder').val() }).appendTo("#pform");
                    $("<input />", { type:"hidden", name:"Pan", value:$('#card_number').val() }).appendTo("#pform");
                    $("<input />", { type:"hidden", name:"ExpiryMo", value:$('#card_mo').val() }).appendTo("#pform");
                    $("<input />", { type:"hidden", name:"ExpiryYr", value:$('#card_yr').val() }).appendTo("#pform");
                    $("<input />", { type:"hidden", name:"Cvv2", value:$('#card_cv2').val() }).appendTo("#pform");
                    $("#pform").submit();
                }
            }, "json");
        }

    });

    $("button.payHv").on("click", function(e){
        changed = false;
        $.post("/car/save", { step:5, customers_cars_id:customers_cars_id, payment_method:"HV" }, function(r){
            if( r.status == "success" ){
                window.location.href = '/havale-bildirimi';
            }
        }, "json");
    });

    $("input[name='odeme_tipi']").on("change", function(){
        $(".payment_type").prop("hidden", true);
        $("#p" + $(this).val()).prop("hidden", false);
    });

    $("#card_number").mask("0000-0000-0000-0000");
    $("#card_cv2").mask("000");
    $('#km').mask('000.000.000.000.000', {reverse: true});
    $('#tramerValue').mask('000.000.000.000.000', {reverse: true});
    $('#gal_fiyat_1').mask('000.000.000.000.000', {reverse: true});


    // Detect browser back button press and click a elements closets car adder accordion
    $(":input", $("#accordionExample")).change(function(){ changed = true; });

});

window.onbeforeunload = function(e){
    if(changed) {
        return 'Yaptığınız değişiklikleri kaybedeceksiniz! Devam etmek istiyor musunuz?';
    }
};
