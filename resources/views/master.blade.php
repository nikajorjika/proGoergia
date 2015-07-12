<!DOCTYPE html>
<html>
<head>
    {!! Html::style('css/bootstrap.css'); !!}
    {!! Html::style('css/bootstrap.min.css'); !!}
    {!! Html::style('css/bootstrap-theme.css'); !!}
    {!! Html::style('css/bootstrap-theme.min.css'); !!}

    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); !!}
    {!! Html::script('js/bootstrap.js'); !!}
    {!! Html::script('js/bootstrap.min.js'); !!}
    {!! Html::script('js/script.js'); !!}
</head>
<body>
    @yield('body')
</body>
</html>