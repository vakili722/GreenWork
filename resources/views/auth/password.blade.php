@extends('auth.master')

@section('title', 'فراموشی رمز ورود')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url() }}"><b>Green</b>Work</a>
        </div>

        @include('auth.message')

        <div class="register-box-body">
            <p class="login-box-msg">دریافت لینک بازیابی رمز ورود</p>

            <form action="{{ url('password/email') }}" method="post">
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4 pull-left">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">دریافت</button>
                    </div>
                    <!-- /.col -->
                </div>
                {!! csrf_field() !!}
            </form>

            <div class="social-auth-links text-center">
                <p>- یا -</p>
            </div>

            <a href="{{ url('auth/register') }}" class="text-center">ساخت حساب کاربری جدید</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection