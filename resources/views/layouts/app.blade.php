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

    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>

</html>
