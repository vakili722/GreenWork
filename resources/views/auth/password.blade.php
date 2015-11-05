@extends('auth.master')

@section('title', 'ثبت نام کاربر')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url() }}"><b>Workflow</b> BPM</a>
        </div>

        @include('auth.message')

        <div class="register-box-body">
            <p class="login-box-msg">Send Password Reset Link</p>

            <form action="{{ url('password/email') }}" method="post">
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4 pull-left">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Continue</button>
                    </div>
                    <!-- /.col -->
                </div>
                {!! csrf_field() !!}
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
            </div>

            <a href="{{ url('auth/register') }}" class="text-center">Register a new membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection