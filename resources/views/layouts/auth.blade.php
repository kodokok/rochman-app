<!DOCTYPE html>
<html>
<head>
  @include('layouts.partials.htmlheader')
</head>
<style>
body {
    height: 100vh !important;
}
</style>
<body>

@yield('content')

@include('layouts.partials.scripts')
</body>

</html>
