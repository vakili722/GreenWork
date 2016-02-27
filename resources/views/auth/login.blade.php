@extends('auth.master')

@section('title', 'ورود به سیستم')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url() }}"><b>Green</b>Work</a>
    </div>

    @include('auth.message')

    <div class="login-box-body">
        <p class="login-box-msg">برای شروع نشست وارد سیستم شوید</p>

        <form action="{{ url('auth/login') }}" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> مرا به خاطر داشته باش
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                </div>
                <!-- /.col -->
            </div>
            {!! csrf_field() !!}
        </form>

        <div class="social-auth-links text-center">
            <p>- یا -</p>
        </div>

        <a href="{{ url('password/email') }}">رمز عبورم را فراموش کرده ام</a><br>
        <a href="{{ url('auth/register') }}" class="text-center">ساخت حساب کاربری جدید</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection