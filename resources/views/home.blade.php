@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumbs', Breadcrumbs::render('dashboard'))

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                @include('dashboard.small-box.auditplan')
            </div>
            <div class="col-lg-3 col-6">
                @include('dashboard.small-box.temuanaudit')
            </div>
            <div class="col-lg-3 col-6">
                {{-- @include('dashboard.small-box.auditplan') --}}
            </div>
            <div class="col-lg-3 col-6">
                {{-- @include('dashboard.small-box.auditplan') --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {{--  @include('dashboard.list.auditplan')  --}}
            </div>
            <div class="col-lg-6">
                {{--  @include('dashboard.list.temuanaudit')  --}}
            </div>
        </div>
    </div>
</section>

@endsection
