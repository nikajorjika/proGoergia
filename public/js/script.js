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

    $('.region_search').change(function() {
        var region       = $(this).val()
            , municipality  = $('.municipality_search');

        $.ajax({
            method: "GET",
            url: "/municipalities/"+region
        }).done(function(data){
            var checkbox = $('.municipalities-checkbox-place');
            checkbox.html('');
            checkbox.append('<div class="checkbox municipality_search">'+
            '<label class="all_m">'+
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
                ,   link        =   this.link
                ,   field       =   this.field
                ,   terms       =   this.terms
                ,   months      =   this.months
                ,   municipality=   this.municipality;

            div.append(' <div id = '+ id +'>' +
                            '<h3>დასახელება: ' + name + '</h3>' +
                            '<div>სწავლების სფერო: '+field+'</div>'+
                            '<div>სწავლების ფორმა: '+terms+'</div>'+
                            '<div>ჩატარების ადგილი: '+municipality+'</div>'+
                            '<div>მოკლე აღწერა: '+description+'</div>' +
                            '<div>პერიოდი: '+months+'</div>'+
                            '<div><a href="'+link+'">ვებ ბმული</a></div>' +
                            '<div><a href="download/'+file+'">მიმაგრებული ფაილი</a></div>'+
                        '</div><hr>');
            });
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center">თქვენს მიერ მოთხოვნილი კურსი ვერ მოიძებნა მოიძებნა!</div> ');
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
                    ,   quantity    =   this.quantity
                    ,   file        =   this.file.slice(0, -4)
                    ,   link        =   this.link
                    ,   field       =   this.field
                    ,   contact     =   this.contact
                    ,   municipality=   this.municipality;

                div.append(' <div id = '+ id +'>' +
                '<h3>დასახელება: ' + name + '</h3>' +
                '<div>სწავლების სფერო: '+field+'</div>'+
                '<div>მონაწილეთა რაოდენობა: '+quantity+'</div>'+
                '<div>ჩატარების ადგილი: '+municipality+'</div>'+
                '<div>საკონტაქტო ინფორმაცია: '+contact+'</div>'+
                '<div><a href="'+link+'">ვებ ბმული</a></div>' +
                '<div><a href="download/'+file+'">მიმაგრებული ფაილი</a></div>'+
                '</div><hr>');
            });
        }).fail(function(){
            var div = $('#search-result');
            div.html('');
            div.append('<div style="text-align: center">თქვენს მიერ მოთხოვნილი კურსი ვერ მოიძებნა მოიძებნა!</div> ');
        });
        event.preventDefault();
    });
});