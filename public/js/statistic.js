$(function () {
    $('.field').change(function () {
        var field = $(this).val();

        $.ajax('/statistic', {field: field}, function(data) {
            console.log(data);
        });
    });
});