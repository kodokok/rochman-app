<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.htmlheader')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('layouts.partials.navbar')

        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')

    </div>

    @include('layouts.partials._modal')

    @include('layouts.partials.scripts')

    @stack('scripts')
</body>

</html>
