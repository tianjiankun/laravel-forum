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
                <ul class="list-group text-center">
                    <a href="">
                        <li class="list-group-item person-list">
                            <i class="text-md fa fa-bullseye margin-3"></i>
                              点击发布帖子
                        </li>
                    </a>
                    <hr class="no-margin">
                    <a href="" class="person-list-font">
                        <li class="list-group-item person-list">
                            <i class="text-md fa fa-file margin-3"></i>
                              查看我的帖子
                        </li>
                    </a>
                    <hr class="no-margin">
                    <a href="" class="person-list-font">
                        <li class="list-group-item person-list">
                            <i class="text-md fa fa-comment margin-2"></i>
                              我回复的帖子
                        </li>
                    </a>
                    <hr class="no-margin">
                    <a href="" class="person-list-font">
                        <li class="list-group-item person-list">
                            <i class="text-md fa fa-eye margin-3"></i>
                              我关注的用户
                        </li>
                    </a>
                    <hr class="no-margin">
                </ul>
            </div>
        </div>
    </div>
    <!--------侧边栏结束-------->
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <div>
                    <i class="fa fa-ravelry" aria-hidden="true"></i>
                    最近发布的帖子
                </div>
            </div>
            <div class="panel-body" style="padding: 0px">
                <div class="">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-danger t-m-10">置顶</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-success t-m-10">精华</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <div class="">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    最近回复的帖子
                </div>
            </div>
            <div class="panel-body t-p-0">
                <div class="">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-danger t-m-10">置顶</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-success t-m-10">精华</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection()