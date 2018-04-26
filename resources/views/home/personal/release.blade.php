@extends('layouts.home')
@section('title', '发布帖子')
@section('css')
    <link rel="stylesheet" href="{{ asset('statics/editormd/css/editormd.min.css') }}">
@endsection
@section('content')
    @include('home.personal.sidebar')
    <div class="col-md-9">
        <div id="content">
            <textarea name="markdown">{{ old('markdown') }}</textarea>
        </div>
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
                toolbarIcons : ['undo', 'redo', 'code', 'code-block', 'bold', 'del', 'italic', 'quote',  'h1', 'h2', 'h3', 'h4', 'h5', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{ url('personal/uploadImg') }}',
            });
        });
    </script>
@endsection