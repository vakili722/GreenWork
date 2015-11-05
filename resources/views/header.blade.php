<!-- Logo -->
<a href="{{ url() }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>G</b>W</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Green</b>Work</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- custom navbar -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ url('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">مجتبی صباغ جعفری</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                        <p>
                            مجتبی صباغ جعفری
                            <br/><small>گروه مهندسی کامپیوتر</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="{{ url('prototype/profile') }}" class="btn btn-default btn-flat">پروفایل</a>
                        </div>
                        <div class="pull-left">
                            <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">خروج</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>