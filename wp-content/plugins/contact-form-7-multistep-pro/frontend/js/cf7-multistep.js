jQuery(document).ready(function($){
    $(".multistep-cf7-next").click(function(e){
        /*
        * Check validates and required
        */
        $(this).closest('form').submit();
        return false;
    })
    $(".multistep-cf7-prev").click(function(e){
        var $form = $(this ).closest('form');
        $(".wpcf7-response-output",$form).addClass("hidden");
        var tab_current = parseInt( $(".wpcf7_check_tab",$form).val() );
        var prev_tab = tab_current - 1;
        $(".cf7-tab",$form).addClass("hidden");
        $(".cf7-tab-"+prev_tab, $form).removeClass("hidden");
        $(".wpcf7_check_tab",$form).val( prev_tab  ).change();
        $(".cf7-display-steps-container li",$form).removeClass("active");
        $(".cf7-display-steps-container li", $form).removeClass("enabled");
        $(".cf7-display-steps-container .cf7-steps-"+prev_tab,$form).addClass("active");
        for(var i=1;i<prev_tab;i++){
            $(".cf7-display-steps-container li.cf7-steps-"+i,$form).addClass("enabled");
        }
        $(".multistep-check input",$form).val("");
        var top = $('.container-multistep-header',$form).offset().top-200;

        $('html, body').animate({scrollTop : top},800);
        return false;
    })
    $(".multistep-cf7-first").click(function(event) {
        var $form = $(this ).closest('form');
        $(".wpcf7-response-output",$form).addClass("hidden");
        var prev_tab =  1;
        $(".cf7-tab",$form).addClass("hidden");
        $(".cf7-tab-"+prev_tab,$form).removeClass("hidden");
        $(".wpcf7_check_tab",$form).val( prev_tab  ).change();
        $(".cf7-display-steps-container li",$form).removeClass("active");
        $(".cf7-display-steps-container li",$form).removeClass("enabled");
        $(".cf7-display-steps-container .cf7-steps-"+prev_tab, $form).addClass("active");
        for(var i=1;i<prev_tab;i++){
            $(".cf7-display-steps-container li.cf7-steps-"+i, $form).addClass("enabled");
        }
        $(".multistep-check input",$form).val("");
        var top = $('.container-multistep-header',$form).offset().top - 200;

        $('html, body').animate({scrollTop : top},800);
        return false;
    });
    function remove_duplicates_ctf7_step(arr) {
        var obj = {};
        var ret_arr = [];
        for (var i = 0; i < arr.length; i++) {
            obj[arr[i]] = true;
        }
        for (var key in obj) {
            if("_wpcf7" == key || "_wpcf7_version" == key  || "_wpcf7_locale" == key  || "_wpcf7_unit_tag" == key || "_wpnonce" == key || "undefined" == key  || "_wpcf7_container_post" == key || "_wpcf7_nonce" == key  ){

            }else {
                ret_arr.push(key +"(?!\\d)");
            }
        }
        return ret_arr;
    }
})