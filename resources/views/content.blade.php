<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php
        if ($path == '/' || $path == 'home' || $path == 'dashboard') {
            echo 'داشبورد';
        } else {
            if (starts_with($path, 'page/static')) {
                $split = explode('/', $path);
                $last = count($split) - 1;
                $name = $split[$last];
                echo $session->get('static_menu')
                        ->where('name', $name)
                        ->first()->alias;
            }
        }
        ?>
        <small>
            <?php
            if ($path == '/' || $path == 'home' || $path == 'dashboard') {
                echo 'صفحه خانگی';
            } else {
                if (starts_with($path, 'page/static')) {
                    $split = explode('/', $path);
                    $last = count($split) - 1;
                    $name = $split[$last];
                    echo $session->get('static_menu')
                            ->where('name', $name)
                            ->first()->info;
                }
            }
            ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <?php
        if ($path == '/' || $path == 'home' || $path == 'dashboard') {
            echo '<li class = "active"><i class = "fa fa-dashboard"></i> داشبورد</li>';
        } else {
            if (starts_with($path, 'page/static')) {
                $split = explode('/', $path);
                $last = count($split) - 1;
                $name = $split[$last];
                echo '<li><a href="#"><i class="fa fa-suitcase"></i>ابزارها</a></li>';
                echo '<li class="active">' . $session->get('static_menu')->where('name', $name)->first()->alias . '</li>';
            }
        }
        ?>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @yield('content')
</section>