@extends('layouts.home')
@section('title', '发布帖子')
@section('css')
    <link rel="stylesheet" href="{{ asset('statics/editormd/css/editormd.min.css') }}">
@endsection
@section('content')
    @include('home.personal.sidebar')
    <div class="col-md-9">
        <form class="form-horizontal " action="{{ route('personal.release.handle') }}" method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input class="form-control" type="text" name="title" placeholder="请输入标题" value="{{ old('title') }}">
                </td>
            </tr>
            <div  class="tjk-m-t-10">
                <tr>
                    <td>
                        <select class="form-control" name="category_id">
                            <option value="">请选择分类</option>
                            @foreach($category as $v)
                                <option value="{{ $v->id }}" @if(old('category_id')) selected="selected" @endif>{{ $v->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </div>
            <div  class="tjk-m-t-10">
                <td>
                    <input class="form-control" type="text" placeholder="请输入关键词，用英文逗号分隔" name="keywords" value="{{ old('keywords') }}">
                </td>
            </div>
            <div class="tjk-m-t-10">
                <tr>
                    <td>
                        <textarea class="form-control" name="description" rows="7" placeholder="输入描述，可以不填，如不填；则截取文章内容前100字为描述">{{ old('description') }}</textarea>
                    </td>
                </tr>
            </div>
            <div class="tjk-m-t-10">
                <tr>
                    <td>
                        <div id="content">
                            <textarea name="content">{{ old('content') }}</textarea>
                        </div>
                    </td>
                </tr>
            </div>
            <div class="tjk-m-t-10">
                <tr>
                    <td>
                        <input class="btn btn-success" type="submit" value="提交">
                    </td>
                </tr>
            </div>
            <hr>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('statics/editormd/editormd.min.js') }}"></script>
    <script>
        var testEditor;

        $(function() {
            editormd.urls.atLinkBase = "https://github.com/";
            testEditor = editormd("content", {
                width     : "100%",
                height    : 720,
                toc       : true,
                todoList  : true,
                placeholder: '输入帖子内容',
                toolbarAutoFixed: false,
                path      : '{{ asset('/statics/editormd/lib') }}/',
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'code', 'code-block', 'bold', 'del', 'italic', 'quote',  'h1', 'h2', 'h3', 'h4', 'h5', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'table', 'emoji', 'html-entities', 'watch', 'preview'],
                imageUpload: true,
                imageUploadURL : '{{ url('personal/uploadImg') }}',
            });
        });
    </script>
@endsection