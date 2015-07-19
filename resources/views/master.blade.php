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
    {!! Html::script('js/statistic.js'); !!}
    {!! Html::script('js/script.js'); !!}
</head>
<body>
    <div class="site-header">
        <div class="container">
            <a href="{{ url('/') }}"><img src="/images/logo.png"></a>
            <img src="/images/slogan_1.png">
        </div>
    </div>
    <div class="menu-line">
        <div class="container">
            <ul class="menu list-inline">
                <a href="{{ url('/') }}" @if(isset($home_active)) class="active" @endif>
                    <li>მთავარი</li>
                </a>
                <a href="{{ url('/site/about_project') }}" @if(isset($about_active)) class="active" @endif>
                    <li>პროექტის შესახებ</li>
                </a>
                <a href="{{ url('/site/site_map') }}" @if(isset($site_map_active)) class="active" @endif>
                    <li>გზამკვლევი</li>
                </a>
                <a href="{{ url('/site/contact') }}" @if(isset($contact_active)) class="active" @endif>
                    <li>კონტაქტი</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="container">
        @yield('body')
    </div>
</body>
</html>