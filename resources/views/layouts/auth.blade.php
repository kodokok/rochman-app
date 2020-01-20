<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div class="container d-flex flex-column min-vh-100">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
