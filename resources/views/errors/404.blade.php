@extends('layouts.auth')

@section('content')

<!-- Main content -->
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="{{ route('app') }}">back to app</a> or try using the search
                        form.
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
                <!-- /.error-page -->
        </div>
    </div>
</div>
<!-- /.content -->

@endsection
