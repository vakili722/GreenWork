@extends('auth.master')

@section('title', 'ثبت نام کاربر')

@section('body')
<div class="register-box">
    <div class="register-logo">
        <a href="{{ url() }}"><b>Green</b>Work</a>
    </div>

    @include('auth.message')

    <div class="register-box-body">
        <p class="login-box-msg">ساخت حساب کاربری جدید</p>

        <form action="{{ url('auth/register') }}" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" required="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required="">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input name="contract" type="checkbox"><a href="#"> قوانین</a> را میپذیرم 
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ایجاد</button>
                </div>
                <!-- /.col -->
            </div>
            {!! csrf_field() !!}
        </form>

        <div class="social-auth-links text-center">
            <p>- یا -</p>
        </div>

        <a href="{{ url('auth/login') }}" class="text-center">صفجه ورود به سیستم</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection