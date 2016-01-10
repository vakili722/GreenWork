<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php
        if ($path == '/' || $path == 'home' || $path == 'dashboard') {
            echo 'داشبورد';
        } else {
            if (!starts_with($path, 'page/')) {
                $name = $path;
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
                if (!starts_with($path, 'page/')) {
                    $name = $path;
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
            if (!starts_with($path, 'page/')) {
                $name = $path;
                echo '<li><a href="#"><i class="'.$session->get('static_menu')->where('name', $name)->first()->group_icon.'"></i>'.$session->get('static_menu')->where('name', $name)->first()->group_alias.'</a></li>';
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