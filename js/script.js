/**
 * Created by Nika on 7/11/2015.
 */
$(document).ready(function(){
    var deleteEvent = function(){
        $('.delete').click(function(e){
            if(!confirm('დარწმუნებული ხართ თუ არა რომ გსურთ ჩანაწერის წაშლა ?')){
                e.preventDefault();
            }
        });
    };

    var editEvent = function(){
        $('.edit').click(function(e){
            if(!confirm('დარწმუნებული ხართ თუ არა რომ გსურთ ჩანაწერის შესწორება ?')){
                e.preventDefault();
            }
        });
    };

    $('#region').change(function() {
        var region = $(this).val();

        if (region) {
            $('#municipalities').removeClass('display-none');
        } else {
            $('#municipalities').addClass('display-none');
        }

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

    $('.region_search').change(function() {
        var region          = $(this).val()
            , municipality  = $('.municipality_search');

        $.ajax({
            method: "GET",
            url: "/municipalities/" + region
        }).done(function(data){
            var checkbox = $('.municipalities-checkbox-place');
            checkbox.html('');
            checkbox.append('<div class="checkbox municipality_search">'+
            '<label class="all_m all_regions">'+
            '<input class="" name="municipalities[]" type="checkbox" value='+ 0 +'> ნებისმიერი'+
            '</label>'+
            '</div>');
            $(data).each(function(){
                var    id   =  $(this)[0].id
                    ,  name =  $(this)[0].name;
                checkbox.append('<div class="checkbox municipality_search">'+
                                        '<label class="all_m">'+
                                        '<input class="" name="municipalities[]" type="checkbox" value='+ id +'>'+name +
                                        '</label>'+
                                '</div>');
            });

            $('.all_regions').find('input').change(function() {
                var inputs    = $(this).parents('.municipalities-checkbox-place').find('input')
                    , checked = $(this).prop('checked');

                $(inputs).each(function(){
                    $(this).prop('checked', checked);
                });
            });
        }).fail(function(){
            var checkbox = $('.municipalities-checkbox-place');
            checkbox.html('');
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

    $('#filter-form').on('submit',function(event){
        var existsMonth = false;
        var formArray = $(this).serializeArray();
        for(var element in formArray){
            if(formArray[element].name == 'month[]' ){
                existsMonth = true;
            }
        }
        if(!existsMonth){
            alert('გთხოვთ შეიყვანოთ პერიოდი');
            event.preventDefault();
        }
        $.ajax({
            method: "POST",
            url: "/announcements",
            data: formArray
        }).done(function(data){
            var div = $('#search-result');
            div.html('');
        $(data).each(function(){


            var     id          =   this.id
                ,   name        =   this.header
                ,   description =   this.description
                ,   file        =   this.file.slice(0, -4)
                ,   link        =   'http://' + this.link
                ,   field       =   this.field
                ,   terms       =   this.terms
                ,   months      =   this.months
                ,   municipality=   this.municipality;

            if(this.isAdmin){
                div.append(' <div id = '+ id +'>' +
                '<h3>' + name +
                '<a class="delete" onClick ="confirm("Press a button!")"  href="/delete/'+id+'" style="padding-right: 15px; padding-left: 15px"><span  class="glyphicon glyphicon-trash"></span></a>'+
                '<a class="edit" onClick ="confirmEdit("Press a button!")"  href="/announcement/edit/'+id+'"><span class="glyphicon glyphicon-pencil"></span></a>'+
                '</h3><div class="description">'+description+'</div>' +
                '<div class="row"><div class="col-sm-3"><strong>სწავლების სფერო: </strong></div><div class="col-sm-9">'+field+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>სწავლების ფორმა: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>ჩატარების ადგილი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>პერიოდი: </strong></div><div class="col-sm-9">'+months+'</div></div>'+
                '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                '</div><hr class="margin-bottom-40">');
            }else{
                div.append(' <div id = '+ id +'>' +
                '<h3>' + name + '</h3>' +
                '<div class="description">'+description+'</div>' +
                '<div class="row"><div class ="col-sm-3"><strong>სწავლების სფერო: </strong></div><div class="col-sm-9">'+field+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>სწავლების ფორმა: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>ჩატარების ადგილი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                '<div class="row"><div class="col-sm-3"><strong>პერიოდი: </strong></div><div class="col-sm-9">'+months+'</div></div>'+
                '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                '</div><hr class="margin-bottom-40">');
            }
            });
            deleteEvent(); editEvent();
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center; font-weight: bold; font-size: 16px;">თქვენ მიერ მითითებული პარამეტრებით არ იძებნება არცერთი პროგრამა!</div> ');
        });
        event.preventDefault();
    });

    $('#filter-seek-form').on('submit',function(event){
        var formArray = $(this).serializeArray();
        $.ajax({
            method: "POST",
            url: "/seek/announcements",
            data: formArray
        }).done(function(data){
            var div = $('#search-result');
            div.html('');
            $(data).each(function(){


                var     id          =   this.id
                    ,   name        =   this.header
                    ,   description =   this.description
		    ,   per         =   this.per
                    ,   quantity    =   this.quantity
                    ,   file        =   this.file.slice(0, -4)
                    ,   link        =   'http://' + this.link
                    ,   field       =   this.field
                    ,   terms       =   this.terms
                    ,   contact     =   this.contact
                    ,   municipality=   this.municipality;
                if(this.isAdmin){
                    div.append(' <div id = '+ id +'>' +
                    '<h4><strong>სწავლების სფერო:</strong> ' + field + 
					'<a class="delete" onClick ="confirm("Press a button!")"  href="/delete_seek/'+id+'" style="padding-right: 15px; padding-left: 15px"><span  class="glyphicon glyphicon-trash"></span></a>'+
                    '<a class="edit" onClick ="confirmEdit("Press a button!")"  href="/seek_announcement/edit/'+id+'"><span class="glyphicon glyphicon-pencil"></span></a>'+
                    '</h4>' +
                    '<div class="row"><div class="col-sm-3"><strong>ტრენინგის დასახელება: </strong></div><div class="col-sm-9">'+name+'</div></div>'+
		    '<div class="row"><div class="col-sm-3"><strong>შესასწავლი საკითხები:</strong></div><div class="col-sm-9">'+description+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>&#4321;&#4332;&#4304;&#4309;&#4314;&#4308;&#4305;&#4312;&#4321; &#4324;&#4317;&#4320;&#4315;&#4304;: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
		    '<div class="row"><div class="col-sm-3"><strong>პერიოდი:</strong></div><div class="col-sm-9">'+per+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>მოხელეთა რაოდენობა: </strong></div><div class="col-sm-9">'+quantity+'</div></div>'+
		    '<div class="row"><div class="col-sm-3"><strong>მუნიციპალიტეტი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>საკონტაქტო პირი: </strong></div><div class="col-sm-9">'+contact+'</div></div>'+
                    '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                }else {
                    div.append(' <div id = ' + id + '>' +
                    '<h4><strong>სწავლების სფერო:</strong> ' + field + '</h4>' +
                   
                    '<div class="row"><div class="col-sm-3"><strong>ტრენინგის დასახელება: </strong></div><div class="col-sm-9">' + name + '</div></div>' +
		    '<div class="row"><div class="col-sm-3"><strong>შესასწავლი საკითხები:</strong></div><div class="col-sm-9">' + description + '</div></div>' +
                    '<div class="row"><div class="col-sm-3"><strong>&#4321;&#4332;&#4304;&#4309;&#4314;&#4308;&#4305;&#4312;&#4321; &#4324;&#4317;&#4320;&#4315;&#4304;: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>პერიოდი:</strong></div><div class="col-sm-9">'+per+'</div></div>'+
		    '<div class="row"><div class="col-sm-3"><strong>მოხელეთა რაოდენობა: </strong></div><div class="col-sm-9">' + quantity + '</div></div>' +
                    '<div class="row"><div class="col-sm-3"><strong>მუნიციპალიტეტი: </strong></div><div class="col-sm-9">' + municipality + '</div></div>' +
                    '<div class="row"><div class="col-sm-3"><strong>საკონტაქტო პირი: </strong></div><div class="col-sm-9">' + contact + '</div></div>' +
                    '<div class="inline-block margin-right-10"><a href="' + link + '">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/' + file + '">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                }
            });
            deleteEvent(); editEvent();
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center; font-weight: bold; font-size: 16px;">თქვენ მიერ მითითებული პარამეტრებით არ იძებნება არცერთი პროგრამა!</div> ');
        });
        event.preventDefault();
    });
    $('#keyword-search-button-seek').on('click',function(event){
        var search_value = $('#keyword-search').val();
        $.ajax({
            method: "get",
            url: "/search/seek",
            data: {
                'search_text': search_value
            }
        }).done(function(data){
            var div = $('#search-result');
            div.html('');
            $(data).each(function(){


                var     id          =   this.id
                    ,   name        =   this.header
                    ,   quantity    =   this.quantity
                    ,   description =   this.description
					,   per         =   this.per
                    ,   file        =   this.file.slice(0, -4)
                    ,   link        =   'http://' + this.link
                    ,   field       =   this.field
                    ,   contact     =   this.contact
                    ,   municipality=   this.municipality;
                if(this.isAdmin){
                    div.append(' <div id = '+ id +'>' +
                    '<h4><strong>სწავლების სფერო:</strong> ' + field + 
					'<a class="delete" onClick ="confirm("Press a button!")"  href="/delete_seek/'+id+'" style="padding-right: 15px; padding-left: 15px"><span  class="glyphicon glyphicon-trash"></span></a>'+
                    '<a class="edit" onClick ="confirmEdit("Press a button!")"  href="/seek_announcement/edit/'+id+'"><span class="glyphicon glyphicon-pencil"></span></a>'+
                    '</h4>' +
                    '<div class="row"><div class="col-sm-3"><strong>ტრენინგის დასახელება: </strong></div><div class="col-sm-9">'+name+'</div></div>'+
					'<div class="row"><div class="col-sm-3"><strong>შესასწავლი საკითხები:</strong></div><div class="col-sm-9">'+description+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>პერიოდი:</strong></div><div class="col-sm-9">'+per+'</div></div>'+
					'<div class="row"><div class="col-sm-3"><strong>მოხელეთა რაოდენობა: </strong></div><div class="col-sm-9">'+quantity+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>მუნიციპალიტეტი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>საკონტაქტო პირი: </strong></div><div class="col-sm-9">'+contact+'</div></div>'+
                    '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                } else {
                    div.append(' <div id = '+ id +'>' +
                    '<h4><strong>სწავლების სფერო:</strong> ' + field + '</h4>' +
                  
                    '<div class="row"><div class="col-sm-3"><strong>ტრენინგის დასახელება: </strong></div><div class="col-sm-9">'+name+'</div></div>'+
					'<div class="row"><div class="col-sm-3"><strong>შესასწავლი საკითხები:</strong></div><div class="col-sm-9">'+description+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>პერიოდი:</strong></div><div class="col-sm-9">'+per+'</div></div>'+
					'<div class="row"><div class="col-sm-3"><strong>მოხელეთა რაოდენობა: </strong></div><div class="col-sm-9">'+quantity+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>მუნიციპალიტეტი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>საკონტაქტო პირი: </strong></div><div class="col-sm-9">'+contact+'</div></div>'+
                    '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                }

            });
            deleteEvent(); editEvent();
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center; font-weight: bold; font-size: 16px;">თქვენ მიერ მითითებული პარამეტრებით არ იძებნება არცერთი პროგრამა!</div> ');
        });
        event.preventDefault();
    });
    $('#keyword-search-button').on('click',function(event){
        var search_value = $('#keyword-search').val();
        $.ajax({
            method: "get",
            url: "/search/trainings",
            data: {
                'search_text': search_value
            }
        }).done(function(data){
            var div = $('#search-result');
            div.html('');
            $(data).each(function(){


                var     id          =   this.id
                    ,   name        =   this.header
                    ,   description =   this.description
                    ,   file        =   this.file.slice(0, -4)
                    ,   link        =   'http://' + this.link
                    ,   field       =   this.field
                    ,   terms       =   this.terms
                    ,   months      =   this.months
                    ,   municipality=   this.municipality;
                if(this.isAdmin){
                    div.append(' <div id = '+ id +'>' +
                    '<h3>' + name +
                    '<a class="delete" onClick ="confirm("Press a button!")"  href="/delete/'+id+'" style="padding-right: 15px; padding-left: 15px"><span  class="glyphicon glyphicon-trash"></span></a>'+
                    '<a class="edit" onClick ="confirmEdit("Press a button!")"  href="/announcement/edit/'+id+'"><span class="glyphicon glyphicon-pencil"></span></a>'+
                    '</h3><div class="description">'+description+'</div>' +
                    '<div class="row"><div class="col-sm-3"><strong>სწავლების სფერო: </strong></div><div class="col-sm-9">'+field+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>სწავლების ფორმა: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>ჩატარების ადგილი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>პერიოდი: </strong></div><div class="col-sm-9">'+months+'</div></div>'+
                    '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                }else{
                    div.append(' <div id = '+ id +'>' +
                    '<h3>' + name + '</h3>' +
                    '<div class="description">'+description+'</div>' +
                    '<div class="row"><div class="col-sm-3"><strong>სწავლების სფერო: </strong></div><div class="col-sm-9">'+field+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>სწავლების ფორმა: </strong></div><div class="col-sm-9">'+terms+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>ჩატარების ადგილი: </strong></div><div class="col-sm-9">'+municipality+'</div></div>'+
                    '<div class="row"><div class="col-sm-3"><strong>პერიოდი: </strong></div><div class="col-sm-9">'+months+'</div></div>'+
                    '<div class="inline-block margin-right-10"><a href="'+link+'">ვებ ბმული</a></div>' +
                    '<div class="inline-block"><a href="/download/'+file+'">მიმაგრებული ფაილი</a></div>' +
                    '</div><hr class="margin-bottom-40">');
                }
            });
            deleteEvent(); editEvent();
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center; font-weight: bold; font-size: 16px;">თქვენ მიერ მითითებული პარამეტრებით არ იძებნება არცერთი პროგრამა!</div> ');
        });
        event.preventDefault();
    });

    $('.all-period').change(function() {
        var inputs    = $(this).parents('.month').find('input')
            , checked = $(this).prop('checked');

        $(inputs).each(function(){
            $(this).prop('checked', checked);
        });
    });

    $('.registration-form').find('input').floatlabel({labelEndTop:0});

    $('.glyphicon-remove').click(function () {
        if(!confirm("გსურთ განაცხადის წაშლა?")){
            return false;
        }
    })

    $('.user-form').find('.panel-body').find('.field').change(function () {
        if ($(this).val()) {
            $(this).css({color: 'black'});
        } else {
            $(this).css({color: 'gray'});
        }
    });
});

function showPassword() {

    var key_attr = $('#zoro').find('#password').prop('type');

    if(key_attr == 'password') {

        $('.checkbox').addClass('show');
        $('#zoro').find('#password').prop('type', 'text');

    } else {

        $('.checkbox').removeClass('show');
        $('#zoro').find('#password').prop('type', 'password');

    }

}
