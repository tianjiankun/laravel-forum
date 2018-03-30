@extends('layouts.admin')

@section('title', '编辑管理员')

@section('nav', '编辑管理员')

@section('description', '编辑管理员')

@section('css')

@endsection
@section('content')
    <form class="form-horizontal " action="{{ url('admin/admin_user/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>管理员</th>
                <td>
                    <input class="form-control" type="text" name="login_name" value="{{ old('login_name')??$data->login_name }}">
                </td>
            </tr>
            <tr>
                <th>真实姓名</th>
                <td>
                    <input class="form-control" type="text" name="real_name" value="{{ old('real_name')??$data->real_name }}">
                </td>
            </tr>
            <tr>
                <th>手机号</th>
                <td>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone')??$data->phone }}">
                </td>
            </tr>
            <tr>
                <th>密码</th>
                <td>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="留空表示不修改">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>
@endsection
