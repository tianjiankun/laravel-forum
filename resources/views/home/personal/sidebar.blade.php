<!--------侧边栏开始-------->
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h4>昵称：{{ $user->nickname }}</h4>
        </div>
        <div class="panel-body">
            <div>
                <div class="col-xs-4">
                    <a href="" class="counter">0</a>
                    <a href="" class="text">粉丝</a>
                </div>
                <div class="col-xs-4">
                    <a href="" class="counter">{{ $user->post->count() }}</a>
                    <a href="" class="text">帖子</a>
                </div>
                <div class="col-xs-4">
                    <a href="" class="counter">{{ $user->comment->count() }}</a>
                    <a href="" class="text">回帖</a>
                </div>
            </div>
            <hr>
            <div>
                <a href="" class="btn btn-info info-btn">编辑个人资料</a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="list-group text-center">
                <a href="{{ url('personal/release') }}">
                    <li class="list-group-item person-list">
                        <i class="text-md fa fa-bullseye margin-3"></i>
                        点击发布帖子
                    </li>
                </a>
                <hr class="no-margin">
                <a href="{{ url(route('personal.post.list')) }}" class="person-list-font">
                    <li class="list-group-item person-list">
                        <i class="text-md fa fa-file margin-3"></i>
                        查看我的帖子
                    </li>
                </a>
                <hr class="no-margin">
                <a href="" class="person-list-font">
                    <li class="list-group-item person-list">
                        <i class="text-md fa fa-comment margin-2"></i>
                        我回复的帖子
                    </li>
                </a>
                <hr class="no-margin">
                <a href="" class="person-list-font">
                    <li class="list-group-item person-list">
                        <i class="text-md fa fa-eye margin-3"></i>
                        我关注的用户
                    </li>
                </a>
                <hr class="no-margin">
            </ul>
        </div>
    </div>
</div>
<!--------侧边栏结束-------->
