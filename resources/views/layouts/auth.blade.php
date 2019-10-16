<!DOCTYPE html>
<html>
<head>
  @include('layouts.partials.htmlheader')
</head>
<body>
    <div class="container d-flex flex-column min-vh-100">
        @yield('content')
    </div>
    @include('layouts.partials.scripts')
</body>

</html>
