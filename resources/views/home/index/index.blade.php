@extends('layouts.home')

@section('title','论坛首页')

@section('content')
    <!--------贴子列表开始-------->
    <div class="col-md-9 post-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="list-inline">
                    <li><a  id="test" href="#" class="action">普通</a></li>
                    <li><a href="">精华</a></li>
                    <li><a href="">最近</a></li>
                </ul>
            </div>
            <div class="post-preview">
                <div class="panel-body t-p-0">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-danger t-m-10">置顶</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                                <span>作者：tianjiankun</span>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-success t-m-10">精华</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                                <span>作者：tianjiankun</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                                <span>作者：tianjiankun</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="">我有一本PHP的书籍</a>
                            <div class="pull-left">
                                <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                            </div>
                            <div class="pull-right">
                                <span>回复数：10</span>
                                <span>作者：tianjiankun</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--------帖子列表结束-------->
    <!--------侧边栏开始-------->
    <div class="col-md-3 side-bar">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" class="form-inline">
                    <input type="text" style="float: left">
                    <input type="submit" class="btn btn-primary" style="float: left">
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                七天内最热
            </div>
            <div class="panel-body">
                <ul class="">
                    <li><a href="">来学PHP吧</a></li>
                    <li><a href="">来学PHP吧</a></li>
                    <li><a href="">来学PHP吧</a></li>
                    <li><a href="">来学PHP吧</a></li>
                    <li><a href="">来学PHP吧</a></li>
                    <li><a href="">来学PHP吧</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--------侧边栏结束-------->
@endsection
@section('js')
@endsection