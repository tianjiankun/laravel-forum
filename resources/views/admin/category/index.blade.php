@extends('layouts.admin')

@section('title', '分类列表页')

@section('nav', '分类列表页')

@section('description', '分类管理')

@section('content')
    <form action="{{ url('admin/category/sort') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>分类名</th>
                <th>关键字</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
            @foreach($list as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->keyword }}</td>
                    <td>{{ $v->description }}</td>
                    <td>
                        <a href="{{ url('admin/category/edit', [$v->id]) }}" class="btn btn-primary btn-xs">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('确定要删除吗?'))location='{{ url('admin/category/delete', [$v->id]) }}'">
                                删除</a>
                        @else
                            <a class="btn btn-warning btn-xs"
                               href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/category/restore', [$v->id]) }}'">
                                恢复</a>
                            |
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/category/force_delete', [$v->id]) }}'">
                                彻底删除</a>
                        @endif
                    </td>
                </tr>

            @endforeach
        </table>
    </form>
@endsection
