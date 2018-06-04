@extends('layouts.home')

@section('title', '个人中心')

@section('content')
    @include('home.personal.sidebar')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <div>
                    <i class="fa fa-ravelry" aria-hidden="true"></i>
                    我的帖子
                </div>
            </div>
            <div class="panel-body" style="padding: 0px">
                <div class="">
                    <ul class="list-group">
                        @forelse($list as $p)
                            <li class="list-group-item">
                                <a href="{{ route('post.show', [$p->id]) }}">{{ $p->title }}</a>
                                <div class="pull-left">
                                    @if($p->is_top == 1)
                                        <button type="button" class="btn btn-xs btn-danger t-m-10">置顶</button>
                                    @endif
                                    @if($p->is_essence == 2)
                                        <button type="button" class="btn btn-xs btn-success t-m-10">精华</button>
                                    @endif
                                    @if($p->is_top==0 && $p->is_essence==1)
                                        <button type="button" class="btn btn-xs btn-default t-m-10">普通</button>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <span>回复数：{{ $p->comment->count() }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                暂无
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="text-center">
                    {{ $list->appends($app->request->all())->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection()