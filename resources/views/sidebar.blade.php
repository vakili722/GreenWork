<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-right image">
            <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ $session->get('user_name') }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>{{ $session->get('group_alias') }}</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">منوی اصلی</li>
            <?php
            $home_is_active = '';
            if ($path == '/' || $path == 'home' || $path == 'dashboard') {
                $home_is_active = 'active';
            }
            echo '<li class="' . $home_is_active . '">'
            . '<a href="' . url('dashboard') . '">'
            . '<i class="fa fa-dashboard"></i>'
            . '<span>داشبورد</span>'
            . '</a>'
            . '</li>';
            ?>
        {!! $menu !!}
    </ul>
</section>
<!-- /.sidebar -->