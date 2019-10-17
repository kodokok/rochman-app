@extends('layouts.auth')

@section('content')
<div class="login-box m-auto w-75">
    <div class="login-container">
        <div class="row">
            <div class="col-md-6 login-form-left">
                <div class="login-logo logo-box">
                    <a href="#">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div class="login-left-text">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 login-form-right">
                <div class="container">
                <p class="text">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
