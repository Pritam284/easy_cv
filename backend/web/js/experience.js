/**
 * Created by mac on 11/11/18.
 */
$(document).ready(function () {
    $('.currently_working').click(function () {

        if($(this).val() == 1){
            $('#experience-year_to').prop('disabled',true);
            $('.currently_working').val(0);
        } else {
            $('#experience-year_to').prop('disabled',false);
            $('.currently_working').val(1);
        }
        console.log($(this).val());
    })
});