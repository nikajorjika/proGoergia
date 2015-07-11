/**
 * Created by Nika on 7/11/2015.
 */
$(document).ready(function(){
   $('#region').change(function(){
       var m      = $('#municipalities')
         , region = $(this).val()
         , all_m  = m.find(' .all_m');

       $(all_m).each(function() {
           if ($(this).attr('data_region') == region) {
               $(this).css('display', 'block');
           } else {
               $(this).css('display', 'none');
           }
       });
   });
});