$(function(){

    $(".car-parts div").on({
        mouseenter: function () {
            var part = $(this)[0].classList[0];
            $(".damage-selection tr."+part).addClass("hover");
        },
        mouseleave: function () {
            $(".damage-selection tr").removeClass("hover");
        }
    });

    $(".damage-selection tr").on({
        mouseenter: function () {
            var part = $(this)[0].classList[0];
            $(".car-parts div."+part).addClass("hover");
        },
        mouseleave: function () {
            $(".car-parts div").removeClass("hover");
        }
    });

    $(".damage-selection tbody input.form-check-input").on("change", ( e )=>{
        var part      = e.target.name;
        var className = e.target.parentNode.classList[1];
        $(".car-parts div."+part).attr("class", part+" "+className);
    });

    $(".car-parts div").on("click", (e)=>{

        var part = e.target.classList[0];
        var current = e.target.classList[1];

        var selected_part_tr = $(".damage-selection tr."+part);

        if( current == "original" ){
            $(".car-parts div."+part).attr("class", part+" painted");
            $(selected_part_tr).find("td.painted input.form-check-input").prop("checked", true);
        }

        else if( current == "painted" ){
            $(".car-parts div."+part).attr("class", part+" paintedlocal");
            $(selected_part_tr).find("td.paintedlocal input.form-check-input").prop("checked", true);
        }

        else if( current == "paintedlocal" ){
            $(".car-parts div."+part).attr("class", part+" changed");
            $(selected_part_tr).find("td.changed input.form-check-input").prop("checked", true);
        }

        else if( current == "changed" ){
            $(".car-parts div."+part).attr("class", part+" original");
            $(selected_part_tr).find("td.original input.form-check-input").prop("checked", true);
        }

    });

    $("#tramerValue").prop("disabled", true).prop("required", false).val('');
    $("#tramerPhoto").prop("disabled", true).prop("required", false).val('');

    $("#tramer").on("change", function(){
        if( $(this).val() == 0 || $(this).val() == 3 ){
            $("#tramerValue").prop("disabled", false).prop("required", true);
            $("#tramerPhoto").prop("disabled", false).prop("required", true);
        } else if($(this).val() == 1 || $(this).val() == " ") {
            $("#tramerValue").prop("disabled", true).prop("required", false).val('');
            $("#tramerPhoto").prop("disabled", true).prop("required", false).val('');
        }else{
            $("#tramerValue").prop("disabled", true).prop("required", false).val('');
            $("#tramerPhoto").prop("disabled", true).prop("required", false).val('');
        }
    });

});
