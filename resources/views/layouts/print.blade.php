<!DOCTYPE html>
<html>
<head>
@include('layouts.partials.print-header')
<style>
html {
    font-size: 14px;
}
</style>
</head>
<body>

@yield('content')

@include('layouts.partials.print-scripts')
</body>

</html>
