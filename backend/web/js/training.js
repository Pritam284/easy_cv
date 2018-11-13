/**
 * Created by mac on 11/11/18.
 */
$(document).ready(function () {
    checkYearTo();

    $('.on_training').click(function () {

        checkYearTo();
        // console.log($(this).val());
    })

    function checkYearTo() {

        if($('.on_training').hasClass('uncheck')){
            $('#training-year_to').prop('disabled',true);
            $('.on_training').removeClass('uncheck');
            $('.on_training').addClass('check');

        } else if($('.on_training').hasClass('check')) {
            $('#training-year_to').prop('disabled',false);
            $('.on_training').addClass('uncheck');
            $('.on_training').removeClass('check');
        }

    }
});/**
 * Created by mac on 11/13/18.
 */
