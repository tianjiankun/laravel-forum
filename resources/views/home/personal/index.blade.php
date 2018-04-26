@extends('layouts.home')

@section('title', '个人中心')

@section('content')
    @include('home.personal.sidebar')
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