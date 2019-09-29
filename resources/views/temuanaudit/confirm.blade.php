@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Confirm Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('temuanaudit.index') }}">Temuan Audit</a></li>
                    <li class="breadcrumb-item active">Confirm</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            @include('auditplan.details')
            @include('auditplan.detail-team')
        </div>
        <div class="col-md-4">
            {!! Form::model($temuanaudit, [
                'route' => ['temuanaudit.confirm', $temuanaudit->id],
                'method' => 'PUT',
                'autocomplete' => 'off'
            ]) !!}
            @include('temuanaudit.form', ['disabled' => true])
        </div>
        <div class="col-md-4">

            @include('temuanaudit.approve')
            @include('temuanaudit.review')

        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('temuanaudit.index') }}" class="btn btn-secondary" style="width: 120px;">Cancel</a>
            <input type="submit" value="Confirm" class="btn btn-success float-right mr-2" style="width: 120px;">
        </div>
    </div>
    {!! Form::close() !!}

</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>

</script>
@endpush
