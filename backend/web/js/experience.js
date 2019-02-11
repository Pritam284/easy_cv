/**
 * Created by mac on 11/11/18.
 */
$(document).ready(function () {

    $(".dynamicform_wrapper .currently_working").each(function () {
        checkYearTo($(this));
    });
    // checkYearTo();



    $(".dynamicform_wrapper").on('change', '.currently_working', function() {
        checkYearTo($(this))
    });

    function checkYearTo(currentlyWorking) {
        var ischecked = currentlyWorking.hasClass('uncheck');
        var item = currentlyWorking.closest(".item");
        if(ischecked){
            $(".year-to", item).prop('disabled',true);
            $(".year-to", item).prop('value',"");
            currentlyWorking.removeClass('uncheck');
            currentlyWorking.addClass('check');
        }else{
            $(".year-to", item).prop('disabled',false);
            currentlyWorking.addClass('uncheck');
            currentlyWorking.removeClass('check');
        }

    }
});