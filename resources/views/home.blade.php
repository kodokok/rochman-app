@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumbs', Breadcrumbs::render('dashboard'))

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="col">
            <div class="row">
                <div class="col-lg-3">
                    @include('partials.dashboard.small-box.auditplan')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('partials.dashboard.small-box.temuanaudit')
                </div>
            </div>
        </div>
        <div class="col">

        </div>
    </div>
</section>

@endsection
