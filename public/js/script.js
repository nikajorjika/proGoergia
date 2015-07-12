/**
 * Created by Nika on 7/11/2015.
 */
$(document).ready(function(){
    $('#region').change(function() {
        var m          = $('#municipalities')
            , region   = $(this).val()
            , all_m    = m.find('.all_m')
            , all_muni = $('.all_muni');

        if (region == 1 || !region) {
            all_muni.css('display', 'block');
        } else {
            all_muni.css('display', 'none');
        }

        $(all_m).each(function() {
            if ($(this).attr('data_region') == region) {
                $(this).parent('.checkbox').css('display', 'block');
            } else {
                $(this).parent('.checkbox').css('display', 'none');
            }
        });
    });

    $('#time').change(function() {
        var time       = $(this).val()
            , any_time = $('.any-period')
            , quarter  = $('.quarter')
            , month    = $('.month');

        if (time == 1) {
            any_time.css('display', 'block');
            quarter.css('display', 'none');
            month.css('display', 'none');
        } else if (time == 2) {
            any_time.css('display', 'none');
            quarter.css('display', 'block');
            month.css('display', 'none');
        } else if (time == 3) {
            any_time.css('display', 'none');
            quarter.css('display', 'none');
            month.css('display', 'block');
        }
    });
});