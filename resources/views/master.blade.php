<!DOCTYPE html>
<html>
<head>
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-theme.css') !!}
    {!! Html::style('css/bootstrap-theme.min.css') !!}
    {!! Html::style('css/style.css') !!}

    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('http://www.clubdesign.at/floatlabels.js') !!}
    {!! Html::script('js/statistic.js') !!}
    {!! Html::script('js/script.js') !!}
</head>
<body>
    <div class="site-header">
        <div class="container">
            <a href="http://www.lsg.gov.ge"><img src="/images/logo.png"></a>
            <a href="http://www.lsg.gov.ge"><img src="/images/slogan_1.jpg"></a>
        </div>
    </div>
    <div class="menu-line">
        <div class="container">
            <ul class="menu list-inline">
                <a href="{{ url('/') }}" class="col-sm-2" @if(isset($home_active)) style="background-color: #298FD3;" @endif>
                    <li>მთავარი</li>
                </a>
                <a href="{{ url('/site/about_project') }}" class="col-sm-2" @if(isset($about_active)) style="background-color: #298FD3;" @endif>
                    <li>პროექტის შესახებ</li>
                </a>
                <a href="{{ url('/site/site_map') }}" class="col-sm-2" @if(isset($site_map_active)) style="background-color: #298FD3;" @endif>
                    <li>გზამკვლევი</li>
                </a>
                <a href="{{ url('/site/contact') }}" class="col-sm-2" @if(isset($contact_active)) style="background-color: #298FD3;" @endif>
                    <li>კონტაქტი</li>
                </a>
                <a href="{{ url('/statistic') }}" class="col-sm-2" @if(isset($statistic_active)) style="background-color: #298FD3;" @endif>
                    <li>სტატისტიკა</li>
                </a>
                @if(Auth::user())
                    <a href="{{ url('/admin') }}" class="col-sm-1" @if(isset($admin_active)) style="background-color: #298FD3;" @endif>
                        <li>ადმინი</li>
                    </a>
                @endif
            </ul>
        </div>
    </div>
    <div class="container body">
        @yield('body')
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer-text">
                სასწავლო პროგრამებისა და სწავლების საჭიროებების  რეესტრი
                  <div>Copyright © 2015</div>
            </div>
        </div>
    </div>
</body>
</html>