@extends('master')

@section('title', 'کاربران | GreenWork')

@section('script')
<script src="{{ url('js/bootstrap-dialog.min.js') }}"></script>
<script src="{{ url('js/notify.js') }}"></script>
<script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ url('plugins/select2/i18n/fa.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $(".select2").select2({
        language: "fa",
        dir: "rtl"
    });

    $.notify.defaults({
        globalPosition: 'top center'
    });
    // delete handler function
    $('table tbody .btn-group [name="trash"]').click(function() {
        item = $(this).parent().parent().parent();
        element = $(this).parent().parent().siblings();
        BootstrapDialog.confirm({
            title: 'اخطار !',
            message: 'آیا مطمئن هستید که میخواهید کاربر ' + element.eq(0).text() + ' با ایمیل ' + element.eq(2).text() + ' را از سیستم حذف کنید!',
            type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'خیر', // <-- Default value is 'Cancel',
            btnOKLabel: 'بلی', // <-- Default value is 'OK',
            btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if (result) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ url("user") }}',
                        data: {_token: '{{ csrf_token() }}', action: 'delete', email: element.eq(2).text()},
                        success: function(result) {
                            if (result === '1') {
                                $.notify("کاربر " + element.eq(0).text() + " با موفقیت از سیستم حذف شد.", 'success');
                                item.remove();
                            }
                            else {
                                $.notify("حذف کاربر " + element.eq(0).text() + " با مشکل رو به رو شده.", 'error');
                            }
                        },
                        error: function() {
                            $.notify("ارتباط شما با سیستم قطع شده لطفا دوباره وارد شوید.", 'warn');
                        }
                    });
                    $.notify("درخواست با موفقیت ارسال شد.", 'info');
                }
            }
        });
    });

    // edit handler function
    $('table tbody .btn-group [name="edit"]').click(function() {
        element = $(this).parent().parent().siblings();
        // name
        $('[name="name"]').attr('value', element.eq(0).text());
        // email
        $('[name="email"]').attr('value', element.eq(2).text());
        // group
        $('[name="group"]').children().each(function() {
            if ($(this).text() === element.eq(1).text()) {
                $(this).prop("selected", true);
            }
        });
        // add new button to form
        $('.box-primary .box-footer').empty();
        $('.box-primary .box-footer').append('<button name="action"  type="submit" value="update" class="btn btn-info">ویرایش</button>\n<button id="discard" type="button" class="btn btn-warning pull-left">لغو</button>');
        // add old email to form as hidden field
        $('.box-primary form').find('input[name="old_email"]').remove();
        $('.box-primary form').append('<input name="old_email" value="' + element.eq(2).text() + '" type="hidden">');
        // change box title
        $('.box-primary .box-title').text('ویرایش کاربر');
        // discard click function
        $('#discard').click(function() {
            $('.box-primary .box-footer').empty();
            $('.box-primary .box-footer').append('<button name="action"  type="submit" value="create" class="btn btn-primary">افزودن</button>');
            // reset form
            $('.box-primary form').find('input[name="old_email"]').remove();
            $('[name="name"]').removeAttr('value');
            $('[name="email"]').removeAttr('value');
            $('[name="group"]').children().first().prop("selected", true);
            $('.box-primary .box-title').text('افزودن کاربر جدید');
        });
    });
});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ url('css/bootstrap-dialog.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/select2/select2.min.css') }}">
@endsection

@section('content')
<!-- Default box -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن کاربر جدید</h3>
        <div class="box-tools pull-left">
            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <form action="{{ url('user') }}" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>نام</label> 
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil-square"></i>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="">
                        </div><!-- /.input group -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>ایمیل</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="" >
                        </div><!-- /.input group -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>گذرواژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="" required="">
                        </div><!-- /.input group -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>تکرار گذرواژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="" required="">
                        </div><!-- /.input group -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Select multiple-->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>گروه کاربری</label>
                        <select name="group" class="form-control select2" >
                            <?php
//                            var_dump($user['load']);
                            foreach ($user['load'] as $item) {
                                echo '<option value="' . $item->id . '">' . $item->alias . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button name="action" type="submit" value="create" class="btn btn-primary">افزودن</button>
        </div>
        {!! csrf_field() !!}
    </form>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?php
            echo 'اطلاعات ';
            if (!starts_with($path, 'page/')) {
                $name = $path;
                echo $session->get('static_menu')->where('name', $name)->first()->alias;
            }
            ?>
        </h3>

        <div class="box-tools">
            <form action="{{ url('user') }}" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="search" class="form-control pull-right" placeholder="Search" type="text">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>گروه کاربری</th>
                    <th>ایمیل</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
//                var_dump($user['info']);
                foreach ($user['info'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item->name . '</td>';
                    echo '<td>' . $item->group->alias . '</td>';
                    echo '<td>' . $item->email . '</td>';
                    echo '<td>';
                    echo '<div class="btn-group">';
                    echo '<button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>';
                    echo '<button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php if ($user['info']->render() != ''): ?>
        <div class="box-footer clearfix">
            <?php echo $user['info']->appends(['search' => $params['search']])->render(); ?>
        </div>
    <?php endif; ?>
</div>
<!-- /.box -->
@endsection