$(document).ready(function () {

    $(".dynamicform_wrapper .on_training").each(function () {
        checkYearTo($(this));
    });
    // checkYearTo();



    $(".dynamicform_wrapper").on('change', '.on_training', function() {
        checkYearTo($(this))
    });

    function checkYearTo(onTraining) {
        var ischecked = onTraining.hasClass('uncheck');
        var item = onTraining.closest(".item");
        if(ischecked){
            $(".year-to", item).prop('disabled',true);
            $(".year-to", item).prop('value',"");
            onTraining.removeClass('uncheck');
            onTraining.addClass('check');
        }else{
            $(".year-to", item).prop('disabled',false);
            onTraining.addClass('uncheck');
            onTraining.removeClass('check');
        }

    }
});