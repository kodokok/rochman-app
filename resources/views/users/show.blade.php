@extends('layouts.app')

@section('body_class', 'hold-transition sidebar-mini')

@section('content')
<div class="wrapper">
    @include('partials.navbar')

    @include('partials.sidebar')


    @include('partials.footer')

</div>
<!-- ./wrapper -->

@endsection
