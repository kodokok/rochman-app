@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
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
                @include('dashboard.list.auditplan')
            </div>
            <div class="col-lg-6">
                @include('dashboard.list.temuanaudit')
            </div>
        </div>
    </div>
</section>

@endsection