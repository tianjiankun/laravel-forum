@extends('layouts.home')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)
@section('css')
    <link rel="stylesheet" href="{{ asset('statics/prism/prism.min.css') }}" />
    <style>
        .markdown-body p{
            margin-bottom: 20px;;
        }
    </style>
@endsection

@section('content')
    <!-- 左侧文章开始 -->
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">
                    {{ $data->title }}
                </h1>
                <div class="">
                    <a href="">
                        <span>作者：</span>{{ $data->user->nickname }}
                    </a>
                    <a href="">
                        <span>回复数：</span>10
                    </a>
                    <a href="">
                        <span>阅读数：</span>1000
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="markdown-body">
                    {!! $data->content->content !!}
                </div>
            </div>
        </div>
    </div>
    <!-- 左侧文章结束 -->
@endsection

@section('js')
    <script src="{{ asset('statics/prism/prism.min.js') }}"></script>
    <script>
        // 添加行数
        $('pre').addClass('line-numbers');
    </script>
@endsection