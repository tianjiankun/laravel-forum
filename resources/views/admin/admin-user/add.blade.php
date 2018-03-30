@extends('layouts.admin')

@section('title', '添加管理员')

@section('nav', '添加管理员')

@section('description', '添加管理员')

@section('css')

@endsection
@section('content')
    <form class="form-horizontal " action="{{ url('admin/admin_user/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>管理员</th>
                <td>
                    <input class="form-control" type="text" name="login_name" value="{{ old('login_name') }}">
                </td>
            </tr>
            <tr>
                <th>真实姓名</th>
                <td>
                    <input class="form-control" type="text" name="real_name" value="{{ old('real_name') }}">
                </td>
            </tr>
            <tr>
                <th>手机号</th>
                <td>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                </td>
            </tr>
            <tr>
                <th>密码</th>
                <td>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                </td>
            </tr>
            <tr>
                <th>重复密码</th>
                <td>
                    <input class="form-control" type="password" name="repeat_pwd" value="{{ old('repeat_pwd') }}">
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
