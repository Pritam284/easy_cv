/**
 * Created by mac on 11/11/18.
 */
$(document).ready(function () {
    checkYearTo();

    $('.currently_working').click(function () {

        checkYearTo();
        // console.log($(this).val());
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