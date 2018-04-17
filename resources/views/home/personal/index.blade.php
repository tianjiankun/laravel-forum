@extends('layouts.home')

@section('title', '个人中心')

@section('content')
    <!--------侧边栏开始-------->
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h4>昵称：tianjiankun</h4>
            </div>
            <div class="panel-body">
                <div>
                    <div class="col-xs-4">
                        <a href="" class="counter">0</a>
                        <a href="" class="text">粉丝</a>
                    </div>
                    <div class="col-xs-4">
                        <a href="" class="counter">0</a>
                        <a href="" class="text">帖子</a>
                    </div>
                    <div class="col-xs-4">
                        <a href="" class="counter">0</a>
                        <a href="" class="text">回帖</a>
                    </div>
                </div>
                <hr>
                <div>
                    <a href="" class="btn btn-info info-btn">编辑个人资料</a>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="">
                    <li><a href="">发布帖子</a></li>
                    <li><a href="">我的帖子</a></li>
                    <li><a href="">我回复的帖子</a></li>
                    <li><a href="">关注的用户</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--------侧边栏结束-------->
@endsection()