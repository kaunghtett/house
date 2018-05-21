<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $user->showImage($path) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        {{-- @include ('admin.search-form') --}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ isActiveURL('/backend/user/admin') }}">
                <a href="/backend/user/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview {{ areActiveRoutes(['houses.index', 'houses.unpublish', 'houses.publish']) }}">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Houses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ isActiveURL('/backend/user/admin/houses') }}">
                        <a href="/backend/user/admin/houses"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; All Houses</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/houses/unpublish') }}">
                        <a href="/backend/user/admin/houses/unpublish"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; Unpublished Houses</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/houses/publish') }}">
                        <a href="/backend/user/admin/houses/publish"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; Published Houses</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ areActiveRoutes(['users.index', 'users.host', 'users.vistor']) }}">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ isActiveURL('/backend/user/admin/users/create') }}">
                        <a href="/backend/user/admin/users/create"><i class="fa fa-user-plus"></i>&nbsp;&nbsp; Create User</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/users') }}">
                        <a href="/backend/user/admin/users"><i class="fa fa-users"></i>&nbsp;&nbsp; All User</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/users/host') }}">
                        <a href="/backend/user/admin/users/host"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; Hosts</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/users/vistor') }}">
                        <a href="/backend/user/admin/users/vistor"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; Vistors</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ areActiveRoutes(['roles.index', 'roles.create']) }}">
                <a href="#">
                    <i class="fa fa-magic"></i>
                    <span>Roles</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ isActiveURL('/backend/user/admin/roles/create') }}">
                        <a href="/backend/user/admin/roles/create"><i class="fa fa-user-plus"></i>&nbsp;&nbsp; Create Role</a>
                    </li>
                    <li class="{{ isActiveURL('/backend/user/admin/roles') }}">
                        <a href="/backend/user/admin/roles"><i class="fa fa-circle-o"></i>&nbsp;&nbsp; Roles</a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->

</aside>
