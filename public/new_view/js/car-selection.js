// For years
$("#brand").on("change", function(){

    $("#year, #model, #body, #fuel, #gear").val('');
    $("#version").html('');

    var token = $('meta[name="csrf-token"]').attr('content');
    $.post("/car-selection", {_token: token,m:"build.years", brand_id:$("#brand").val() }, function(r){
        if( r.status == "success" ){
            $("#year").html('<option value="">Model Yılı seçiniz...</option>');
            $.each( r.data, function( i, item ){
                $("<option />", { value: item, html:item }).appendTo("#year");
            });
        }
    }, "json");
});

// For models
$("#year").on("change", function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post("/car-selection", { _token: token,m:"build.models", brand_id:$("#brand").val(), year:$("#year").val() }, function(r){
        if( r.status == "success" ){
            $("#model").html('<option value="">Model seçiniz...</option>');
            $.each( r.data, function( i, item ){
                var itemValue = ( item == "Modeli Bulamadım" ) ? "nomodel" : item;
                $("<option />", { value: itemValue, html:item }).appendTo("#model");
            });
        }
    }, "json");
});

// For body
$("#model").on("change", function(){

    if( $(this).val() == "nomodel" ){

        $("#version").html('').prop("hidden", true).prop("required", false);

        $(".custom-version-group").prop("hidden", false);
        $("#custom-version").html('').prop("hidden", false).prop("required", true);
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post("/car-selection", {_token:token, m:"build.body-fuel-gear" }, function(r){

            $("#body").html('<option value="">Gövde Tipi seçiniz...</option>');
            $.each( r.data.bodys, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#body");
            });

            $("#fuel").html('<option value="">Yakıt Tipi seçiniz...</option>');
            $.each( r.data.fuels, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#fuel");
            });

            $("#gear").html('<option value="">Şanzuman Tipi seçiniz...</option>');
            $.each( r.data.gears, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#gear");
            });

        }, "json");

    } else {

        $("#version").html('').prop("hidden", false).prop("required", true);

        $(".custom-version-group").prop("hidden", true);
        $("#custom-version").html('').prop("hidden", true).prop("required", false);;
        var token = $('meta[name="csrf-token"]').attr('content');

        $.post("/car-selection", { _token:token,m:"build.body", brand_id:$("#brand").val(), year:$("#year").val(), model:$("#model").val() }, function(r){
            if( r.status == "success" ){
                $("#body").html('<option value="">Gövde Tipi seçiniz...</option>');
                $.each( r.data, function( i, item ){
                    $("<option />", { value: item.id, html:item.text }).appendTo("#body");
                });
            }
        }, "json");
    }

});

// For fuel
$("#body").on("change", function(){
    if( $("#model").val() == "nomodel" ){ return; }
    var token = $('meta[name="csrf-token"]').attr('content');

    $.post("/car-selection", {_token:token, m:"build.fuel", brand_id:$("#brand").val(), year:$("#year").val(), model:$("#model").val(), bodytype:$("#body").val() }, function(r){
        if( r.status == "success" ){
            $("#fuel").html('<option value="">Yakıt Tipi seçiniz...</option>');
            $.each( r.data, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#fuel");
            });
        }
    }, "json");
});

// For gear
$("#fuel").on("change", function(){
    if( $("#model").val() == "nomodel" ){ return; }
    var token = $('meta[name="csrf-token"]').attr('content');

    $.post("/car-selection", { _token:token,m:"build.gear", brand_id:$("#brand").val(), year:$("#year").val(), model:$("#model").val(), bodytype:$("#body").val(), fuel:$("#fuel").val() }, function(r){
        if( r.status == "success" ){
            $("#gear").html('<option value="">Şanzuman Tipi seçiniz...</option>');
            $.each( r.data, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#gear");
            });
        }
    }, "json");
});

// For version
$("#gear").on("change", function(){
    if( $("#model").val() == "nomodel" ){ return; }
    var token = $('meta[name="csrf-token"]').attr('content');

    $.post("/car-selection", { _token:token,m:"build.version", brand_id:$("#brand").val(), year:$("#year").val(), model:$("#model").val(), bodytype:$("#body").val(), fuel:$("#fuel").val(), gear:$("#gear").val() }, function(r){
        if( r.status == "success" ){
            $("#version").html('');
            $.each( r.data, function( i, item ){
                $("<option />", { value: item.id, html:item.text }).appendTo("#version");
            });
        }
    }, "json");
});

$("#car_city").on("change", function(){
    var token = $('meta[name="csrf-token"]').attr('content');

$.post("/states", { _token:token,city:$("#car_city").val() }, function(r){
    if( r.status == "success" ){
        $("#car_state").html('<option value="">İlçe seçiniz...</option>');
        $.each( r.data, function( i, item ){
            $("<option />", { value: item.id, html:item.name }).appendTo("#car_state");
        });
        if( car_state != '' ){
            $("#car_state").val(car_state);
        }
    }
}, "json");



});