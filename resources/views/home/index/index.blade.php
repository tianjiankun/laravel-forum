@extends('layouts.home')

@section('title','论坛首页')

@section('content')
    <!--------贴子列表开始-------->
    <div class="col-md-9 post-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="list-inline">
                    @foreach($filter as $f)
                    <li>
                        <a href="{{ $uri. '?filter='.$f['filter'] }}"
                           class="btn btn-default @if($f['filter'] == $app->request->input('filter')) active @endif"
                        >{{ $f['name'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="post-preview">
                <div class="panel-body t-p-0">
                    <ul class="list-group">
                        @foreach($list as $v)
                            <li class="list-group-item">
                                <a href="{{ route('post.show', [$v->id]) }}">{{ $v->title }}</a>
                                <div class="pull-left">
                                    @if($v->is_top == 1)
                                        <button type="button" class="btn btn-xs btn-danger t-m-10">置顶</button>
                                    @endif
                                    @if($v->is_essence == 2)
                                        <button type="button" class="btn btn-xs btn-success t-m-10">精华</button>
                                    @endif
                                    @if($v->is_top==0 && $v->is_essence==1)
                                        <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <span>回复数：{{ $v->comment->count() }}</span>
                                    <span>作者: {{ $v->user->nickname }}</span>
                                </div>
                            </li>
                        @endforeach
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
                <form action="{{ route('home') }}" class="form-inline">
                    <input type="text" value="{{ Request::get('search') }}" name="search" style="float: left">
                    <input type="submit" class="btn btn-primary" style="float: left">
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                七天内最热
            </div>
            <div class="panel-body">
                <ol class="">
                    @foreach($hot as $h)
                        <li>
                            <a href="{{ route('post.show', [$h->id]) }}">{{ $h->title }}</a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <!--------侧边栏结束-------->
@endsection
@section('js')
@endsection