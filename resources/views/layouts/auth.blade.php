<!DOCTYPE html>
<html>
<head>
    @include('partials.head')

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('partials.styles')
</head>
<body>
    <div class="container d-flex flex-column min-vh-100">
        @yield('content')
    </div>
    @include('layouts.partials.scripts')
</body>

</html>
