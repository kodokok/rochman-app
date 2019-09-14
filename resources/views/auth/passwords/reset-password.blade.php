@extends('layouts.auth')

@section('title', 'ROCHMAN-APP')

@section('body_class', 'hold-transition login-page')
@section('box_type', 'login-box')

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg text-sm">Please enter your email address or username.
        You will receive a link to create a new password via email.</p>

        <form action="#" method="post">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email Address Or Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->
@endsection
