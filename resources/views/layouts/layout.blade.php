<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
        <link type="text/css" href="public/css/common.css" rel="stylesheet">
        @yield('pageCss')
    </head>

    <body>
        <header>
            <div class="header-block">
                <h1>
                    <a href="/Agc/mainmenu">
                        <img class='lpio_logo' src="public/images/logo.png">
                    </a>
                </h1>
                <ul class="header_nav">
                  <li><a href="/Agc/customer/">顧客管理</a></li>
                  <li><a href="/Agc/import/">データ連携</a></li>
                  <li><a href="/Agc/faq">よくある質問</a></li>
                  @if(Session::has('admin_flg'))
                  <li><a href="/Agc/agency_master">代理店マスタ</a></li>
                  <li><a href="/Agc/update">データ更新画面</a></li>
                  @endif
                </ul>
            </div>
            <div class="agency_info">

                @if(session()->has('agency_cd'))
                <div class="agency">
                    <!--<img class="agency_icon" src="public/images/icon.png">-->
                    <p>{{session('agency_name')}}様</p>
                </div>
                @endif
                <a href="/Agc/logout">
                <div class="logout-btn">
                    <p>ログアウト</p>
                </div>
                </a>
            </div>
        </header>
        <div class="container">
            @yield('content')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript" src="public/js/common.js"></script>
        <script type="text/javascript" src="public/js/plugin/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="public/js/plugin/daterangepicker.js"></script>
        @yield('pageJs')
    </body>
</html>
