@extends('layouts.admin')

@section('title', '修改分类')

@section('nav', '修改分类')

@section('description', '修改分类')

@section('css')
@endsection
@section('content')
    <form class="form-horizontal " action="{{ url('admin/category/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>分类名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name')??$data->name }}">
                </td>
            </tr>
            <tr>
                <th>关键字</th>
                <td>
                    <input class="form-control" type="text" name="keyword" value="{{ old('keyword')??$data->keyword }}">
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description')??$data->description }}">
                </td>
            </tr>
            <tr>
                <th>排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort')??$data->sort }}">
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
