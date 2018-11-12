/**
 * Created by mac on 11/11/18.
 */
$(document).ready(function () {
    checkYearTo();

    $('.currently_working').click(function () {

        checkYearTo();
        // console.log($(this).val());
    })

    $('.on_training').click(function () {

        if($(this).val() == 1){
            $('#training-year_to').prop('disabled', true);
            $('.on_training').val(0);
        } else {
            $('#training-year_to').prop('disabled', false);
            $('.on_training').val(1);
        }

    })


    function checkYearTo() {

        if($('.currently_working').hasClass('uncheck')){
            $('#experience-year_to').prop('disabled',true);
            $('.currently_working').removeClass('uncheck');
            $('.currently_working').addClass('check');

        } else if($('.currently_working').hasClass('check')) {
            $('#experience-year_to').prop('disabled',false);
            $('.currently_working').addClass('uncheck');
            $('.currently_working').removeClass('check');
        }

    }
});