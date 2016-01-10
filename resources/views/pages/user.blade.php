@extends('master')

@section('title', 'کاربران | GreenWork')

@section('script')
<script src="{{ url('js/bootstrap-dialog.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    // delete handler function
    $('table tbody .btn-group [name="trash"]').click(function() {
        element = $(this).parent().parent().siblings();
        BootstrapDialog.confirm({
            title: 'اخطار !',
            message: 'آیا مطمئن هستید که میخواهید کاربر '+element.eq(0).text()+' با ایمیل '+element.eq(2).text()+' را از سیستم حذف کنید!',
            type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'خیر', // <-- Default value is 'Cancel',
            btnOKLabel: 'بلی', // <-- Default value is 'OK',
            btnOKClass: 'btn-danger pull-right', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if (result) {
                    alert('Yup.');
                } else {
                    alert('Nope.');
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
        $('.box-primary .box-footer').append('<button type="submit" class="btn btn-info">ویرایش</button>\n<button id="discard" type="submit" class="btn btn-warning pull-left">لغو</button>');
        // change box title
        $('.box-primary .box-title').text('ویرایش کاربر');
        // discard click function
        $('#discard').click(function() {
            $('.box-primary .box-footer').empty();
            $('.box-primary .box-footer').append('<button type="submit" class="btn btn-primary">افزودن</button>');
            // reset form
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
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>نام و نام خانوادگی</label> 
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-pencil-square"></i>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="وحید" required="">
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
                        <input type="text" class="form-control" name="email" placeholder="vakili722" required="">
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
                        <input type="password" class="form-control" name="password" placeholder="123564" required="">
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
                        <input type="text" class="form-control" name="password_confirmation" placeholder="کاربر ارشد" required="">
                    </div><!-- /.input group -->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Select multiple-->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>گروه کاربری</label>
                    <select name="group" class="form-control" required="">
                        <option>Client</option>
                        <option>Manager</option>
                        <option>Administrator</option>
                    </select>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">افزودن</button>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php
            echo 'اطلاعات ';
            if (!starts_with($path, 'page/')) {
                $name = $path;
                echo $session->get('static_menu')->where('name', $name)->first()->alias;
            }
            ?></h3>

        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>نام و نام خانوادگی</th>
                    <th>گروه کاربری</th>
                    <th>ایمیل</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Manager</td>
                    <td>manager@mail.com</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>
                            <button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Administrator</td>
                    <td>administrator@mail.com</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>
                            <button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Client</td>
                    <td>client@mail.com</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>
                            <button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Administrator</td>
                    <td>administrator@mail.com</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>
                            <button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Administrator</td>
                    <td>administrator@mail.com</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></button>
                            <button name="edit" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-left">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
        <div class="input-group input-group-sm" style="width: 95px;">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-newspaper-o"></i></button>
            </div>
            <select class="form-control pull-right">
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>25</option>
                <option>30</option>
            </select>
        </div>
    </div>
</div>
<!-- /.box -->
@endsection