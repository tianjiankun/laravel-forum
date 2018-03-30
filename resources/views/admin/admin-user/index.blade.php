@extends('layouts.admin')

@section('title', '管理员列表页')

@section('nav', '管理员列表页')

@section('description', '管理员管理')

@section('css')

@endsection
@section('content')
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>管理员</th>
                <th>真实姓名</th>
                <th>手机号码</th>
                <th>操作</th>
            </tr>
            @foreach($list as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->login_name }}</td>
                    <td>{{ $v->real_name }}</td>
                    <td>{{ $v->phone }}</td>
                    <td>
                        <a href="{{ url('admin/admin_user/edit', [$v->id]) }}" class="btn btn-primary btn-xs">编辑</a> |
                        @if(is_null($v->deleted_at))
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('确定要删除吗?'))location='{{ url('admin/admin_user/delete', [$v->id]) }}'">
                                删除</a>
                        @else
                            <a class="btn btn-warning btn-xs"
                               href="javascript:if(confirm('确认恢复?'))location.href='{{ url('admin/admin_user/restore', [$v->id]) }}'">
                                恢复</a>
                            |
                            <a class="btn btn-danger btn-xs"
                               href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/admin_user/force_delete', [$v->id]) }}'">
                                彻底删除</a>
                        @endif
                    </td>
                </tr>

            @endforeach
        </table>
    </form>
@endsection
