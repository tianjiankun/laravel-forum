<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - laravel-forum</title>
    <link href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('statics/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tjk.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<header class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">首页</a>
                </li>
                <li>
                    <a href="">PHP</a>
                </li>
                <li>
                    <a href="">Laravel</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div></div>
                    <a href="">登录</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="container m-t-100">
    <div class="row">
    @yield('content')
    </div>
</div>
</body>
</html>
