@extends('layouts.auth')

@section('content')
<div class="login-box m-auto w-75">
    <div class="row">
        <div class="col-md-12">
            <div class="login-container">
                <div class="row">
                    <div class="col-md-6 login-form-left">
                        <div class="login-logo">
                            <h1 class="logo-text">
                                INTERNAL AUDIT
                                <span>be effective and efficient</span>
                            </h1>
                        </div>
                        <div class="login-left-link">
                            <p class="text-white m-0">Need Help?</p>
                            <ul class="list-unstyled text-white">
                                <li>
                                    <i class="fas fa-envelope pr-2"></i>
                                    <a href="mailto:rochmanabel@gmail.com" class="text-white">rochmanabel@gmail.com</a>
                                </li>
                                <li>
                                    <i class="fas fa-phone-alt pr-2"></i>
                                    <a href="#" class="text-white">(+62) 813 1520 5566</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 login-form-right">
                        <div class="login-logo-small float-right">
                            <a href="{{ route('home') }}" class="text-danger font-weight-bold">{{ config('app.name', 'Laravel') }}</a>
                        </div>
                        <div class="errors text-danger">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
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
                                        <label for="remember" class="font-weight-normal">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                            </div>
                        </form>

                        <div class="forgot float-right">
                            <a href="#">I forgot my password</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
