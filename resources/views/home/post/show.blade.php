@extends('layouts.home')

@section('title', $post->title)

@section('keywords', $post->keywords)

@section('description', $post->description)
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
                    {{ $post->title }}
                </h1>
                <div class="">
                    <a href="">
                        <span>作者：</span>{{ $post->user->nickname }}
                    </a>
                    <a href="">
                        <span>回复数：</span>10
                    </a>
                    <a href="">
                        <span>阅读数：</span>{{ $post->view_count }}
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="markdown-body">
                    {!! $post->content->content !!}
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group row">
                    @forelse($post->comment as  $c)
                        <li class="list-group-item">
                            <div class="pull-left">
                                <a href="">
                                    <img class="img-thumbnail"
                                         src="{{ $c->user->info->img }}"
                                         style="width:55px;height:55px;">
                                </a>
                                <div class="text-center">
                                    <a class="label label-success" href="">{{ $c->user->nickname }}</a>
                                </div>
                            </div>
                            <div class="media-heading tjk-m-l-10">
                                <div>
                                    <abbr>{{ $c->created_at }}</abbr>
                                </div>
                                <div class="tjk-m-t-10" style="height:55px;">
                                    <p>{{ $c->content }}</p>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            暂无评论
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('post.comment', [$post->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control"
                                  @if(! Auth::check())disabled="disabled"@endif
                                  rows="5" placeholder="需要登录后才能发表评论"
                                  name="content" cols="50" style="overflow: hidden; word-wrap: break-word;
                                  resize: horizontal; height: 164px;"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm"
                                    type="submit" @if(! Auth::check())disabled="disabled"@endif>
                                <i class="fa fa-send"></i> 发送
                            </button>
                        </div>
                    </div>
                </form>

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