/**
 * Created by Nika on 7/11/2015.
 */
$(document).ready(function(){
    $('#region').change(function() {
        var region   = $(this).val();

        $.ajax({
                method: "GET",
                url: "/municipalities/"+region
        }).done(function(data){
            var select = $('#municipalities-select');
            select.html('');
            $(data).each(function(){
               var    id   =  $(this)[0].id
                   ,  name =  $(this)[0].name;
                select.append('<option value='+id+'>'+name+'</option>');
            });
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