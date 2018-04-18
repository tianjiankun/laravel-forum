@extends('layouts.admin')

@section('title', '帖子列表页')

@section('nav', '帖子列表页')

@section('description', '帖子管理')

@section('css')
    <style>
        .k-m-w-50{
            max-width:50px;
        }
    </style>
@endsection
@section('content')
    <hr>
    <form action="">
        <div class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">ID:</label>
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="输入帖子编号">
            </div>
            <div class="form-group">
                <label for="exampleInputName2">用户名:</label>
                <input type="text" class="form-control" value="{{ Request::get('username') }}" name="username" placeholder="张三">
            </div>
            <div class="form-group">
                <label for="exampleInputName2">标题:</label>
                <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" placeholder="输入标题">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
            <button type="reset" class="btn btn-default">重置</button>
        </div>
    </form>
    <hr>
    <form action="{{ url('admin/post/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>编号</th>
                <th><button class="btn btn-dark btn-xs">排序</button></th>
                <th>发帖人</th>
                <th>标题</th>
                <th>关键词</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
            @foreach($list as $v)
                @if($v->user)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td ><input type="text" value="{{ $v->sort }}" name="{{ $v->id }}" class="am-input-sm k-m-w-50"/></td>
                    <td>{{ $v->user->nickname }}</td>
                    <td>{{ $v->title }}</td>
                    <td>{{ $v->keyword }}</td>
                    <td>{{ $v->description }}</td>
                    <td>
                        @if($v->is_top == 0)
                            <a href="{{ url('admin/post/top?type=1', [$v->id]) }}" class="btn btn-success btn-xs">置顶</a>
                        @else
                            <a href="{{ url('admin/post/top?type=0', [$v->id]) }}" class="btn btn-success btn-xs">取消置顶</a>
                        @endif
                         |
                        @if($v->is_essence == 0)
                            <a href="{{ url('admin/post/essence?type=1', [$v->id]) }}" class="btn btn-primary btn-xs">加精</a>
                        @else
                            <a href="{{ url('admin/post/essence?type=0', [$v->id]) }}" class="btn btn-primary btn-xs">取精</a>
                        @endif
                         |
                        @if(is_null($v->deleted_at))
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('确定要删除吗?'))location='{{ url('admin/post/delete', [$v->id]) }}'">
                                删除</a>
                        @else
                            <a class="btn btn-warning btn-xs"
                               href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/post/restore', [$v->id]) }}'">
                                恢复</a>
                            |
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/post/force_delete', [$v->id]) }}'">
                                彻底删除</a>
                        @endif
                    </td>
                </tr>
                @endif()
            @endforeach
        </table>
    </form>
@endsection
