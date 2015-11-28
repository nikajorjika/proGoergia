$(function () {
    $('.field').change(function () {
        var field = $(this).val();

        if (field) {
            $.ajax({
                method: "GET",
                url: "/search_statistic/"+field
            }).done(function(data){
                data = JSON.parse(data);
                var regions_body          = $('.statistic-regions').find('table').find('tbody')
                    , municipalities_body = $('.statistic-municipalities').find('table').find('tbody')
                    , country_body        = $('.statistic-country').find('table').find('tbody');

                country_body.html('');
                regions_body.html('');
                municipalities_body.html('');

                country_body.append(
                    '<tr>' +
                    '<td>' + 'საქართველო'     + '</td>' +
                    '<td>' + data.country.quantity + '</td>' +
                    '</tr>'
                );

                $.each(data.regions, function(key, value) {
                    regions_body.append(
                        '<tr>' +
                        '<td>' + value.name     + '</td>' +
                        '<td>' + value.quantity + '</td>' +
                        '</tr>'
                    );
                });

                $.each(data.municipalities, function(key, value) {
                    municipalities_body.append(
                        '<tr>' +
                        '<td>' + value.name     + '</td>' +
                        '<td>' + value.quantity + '</td>' +
                        '</tr>'
                    );
                });
            });
        }
    });
});