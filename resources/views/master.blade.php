<!DOCTYPE html>
<html>
<head>
    {!! Html::style('css/bootstrap.css'); !!}
    {!! Html::style('css/bootstrap.min.css'); !!}
    {!! Html::style('css/bootstrap-theme.css'); !!}
    {!! Html::style('css/bootstrap-theme.min.css'); !!}
    {!! Html::style('css/style.css'); !!}

    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); !!}
    {!! Html::script('js/bootstrap.js'); !!}
    {!! Html::script('js/bootstrap.min.js'); !!}
    {!! Html::script('js/script.js'); !!}
</head>
<body>
    <div class="container">
        <ul class="menu list-inline">
            <li><a href="{{ url('/') }}">მთავარი</a></li>
            <li><a href="{{ url('/') }}">ადმინი</a></li>
            <li><a href="{{ url('/user/login') }}">ავტორიზაცია</a></li>
        </ul>
        @yield('body')
    </div>
</body>
</html>