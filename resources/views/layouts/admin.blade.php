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
    <link href="{{ asset('statics/build/css/custom.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="{{ url('admin') }}" class="site_title"><i class="fa fa-drupal"></i> <span>laravel-forum</span></a>
                </div>
                <div class="clearfix"></div>
                <br />
                <!-- sidebar menu -->
                @include('layouts.admin_sidebar')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a href="{{ url('admin/config/edit') }}" data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a href="{{ url('admin/login/logout') }}" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset(session('user.avatar')) }}" alt="">{{ session('user.name') }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ url('admin/login/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
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
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3>@yield('nav') <small>@yield('description')</small></h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- footer content -->
        <footer>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
