<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>SIDEBAR</h3>
        <ul class="nav side-menu">
            <li>
                <a><i class="fa fa-columns"></i> 分类管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/category/list') }}">分类列表</a></li>
                    <li><a href="{{ url('admin/category/add') }}">添加分类</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-columns"></i> 帖子管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/post/list') }}">帖子列表</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-columns"></i> 管理员管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/admin_user/list') }}">管理员列表</a></li>
                    <li><a href="{{ url('admin/admin_user/add') }}">添加管理员</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
