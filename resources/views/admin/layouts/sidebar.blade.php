<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

        <li class="nav-item <?php echo(Request::segment(2)== 'dashboard' )?'active':''; ?>">
            <a href="{{URL::to('admin')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>

        </li>

        <li class="nav-item <?php echo(Request::segment(2)== 'user'||Request::segment(2)== 'module'||Request::segment(2)== 'role' )?'active':''; ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">User</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/module') }}" class="nav-link ">
                        <span class="title">Module List</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/role') }}" class="nav-link ">
                        <span class="title">Role List</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/user') }}" class="nav-link ">
                        <span class="title">User List</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item <?php echo(Request::segment(2)== 'category' )?'active':''; ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-direction"></i>
                <span class="title">Category</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/category') }}" class="nav-link ">
                        <span class="title">Category List</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item <?php echo(Request::segment(2)== 'subcategory' )?'active':''; ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-directions"></i>
                <span class="title">Sub Category</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/subcategory') }}" class="nav-link ">
                        <span class="title">Sub Category List</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item <?php echo(Request::segment(2)== 'post' )?'active':''; ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title">Post</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ Url::to('admin/post') }}" class="nav-link ">
                        <span class="title">Post List</span>
                    </a>
                </li>
            </ul>
        </li>


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
                <!-- END SIDEBAR -->