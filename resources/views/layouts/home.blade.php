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
                    <a class="@if( isset($cid) && $cid == 'index') t-active @endif" href="/">首页</a>
                </li>
                @foreach($category as $v)
                <li>
                    <a class="@if( isset($cid) && $v->id == $cid ) t-active @endif" href="{{ url('/category/cid',[$v->id] ) }}">{{ $v->name }}</a>
                </li>
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::id())
                    <a href="{{ route('logout') }}" class="btn btn-default nav-btn">退出登录</a>
                    <a href="{{ url('/personal') }}" class="btn btn-default nav-btn">个人中心</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-default nav-btn">登录</a>
                    <a href="{{ route('login') }}" class="btn btn-default nav-btn">注册</a>
                @endif
            </ul>
        </div>
    </div>
    {{--成功或者错误提示--}}
    @if (count($errors) > 0)
        <div class="top_nav">
            <div class="nav_menu">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    @if(Session::has('alert-message'))
        <div class="top_nav">
            <div class="nav_menu">
                <div class="alert {{session('alert-class')}}">
                    <ul>
                        <li>{{ session('alert-message') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</header>
<div class="container m-t-100">
    <div class="row">
    @yield('content')
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('statics/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('statics/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('statics/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('statics/nprogress/nprogress.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('statics/build/js/custom.min.js') }}"></script>
@yield('js')
</body>
</html>
