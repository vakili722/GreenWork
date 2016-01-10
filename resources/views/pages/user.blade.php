@extends('master')

@section('title', 'کاربران | GreenWork')

@section('script')
<script src="{{ url('js/bootstrap-dialog.min.js') }}"></script>

<script type="text/javascript">
$('table tbody .btn-group [name="trash"]').click(function() {
    BootstrapDialog.show({
        title: 'Default Title',
        message: 'Click buttons below.',
        buttons: [{
                label: 'Title 1',
                action: function(dialog) {
                    dialog.setTitle('Title 1');
                }
            }, {
                label: 'Title 2',
                action: function(dialog) {
                    dialog.setTitle('Title 2');
                }
            }]
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
                    <label>نام</label> 
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
                    <label>نام خانوادگی</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-pencil-square"></i>
                        </div>
                        <input type="text" class="form-control" name="family" placeholder="وکیلی" required="">
                    </div><!-- /.input group -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>نام کاربری</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="vakili722" required="">
                    </div><!-- /.input group -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>رمز ورود</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock-alt"></i>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="123564" required="">
                    </div><!-- /.input group -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>سمت</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap"></i>
                        </div>
                        <input type="text" class="form-control" name="possition" placeholder="کاربر ارشد" required="">
                    </div><!-- /.input group -->
                </div>
            </div>
            <!-- radio -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>وضعیت کاربر</label>
                    <br/>
                    <label>
                        <input type="radio" name="state" class="minimal" value="1" checked/>
                        فعال
                    </label>
                    <label>
                        <input type="radio" name="state" value="0" class="minimal"/>
                        غیر فعال
                    </label>
                    <br/>
                </div>
            </div>
            <!-- Select multiple-->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>اختصاص گروه کاربری</label>
                    <select name="groups[]" class="form-control" required="">

                    </select>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">اعمال</button>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Responsive Hover Table</h3>

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
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                    <td>657</td>
                    <td>Bob Doe</td>
                    <td>11-7-2014</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td>
                        <div class="btn-group">
                            <button name="trash" type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                        </div>
                    </td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
            </tbody></table>
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