@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>View Audit Plan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auditplan.index') }}">Audit Plan</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @include('auditplan.confirm.form')
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(function () {

    $('#datetimepicker4').datetimepicker({
        format: 'MM-DD-YYYY',
    });

    $('#datetimepicker3').datetimepicker({
        format: 'HH:mm:ss'
    });

    $('#departement_id').on('change', function(){
       var kadept = $(this).children('option:selected').data('kadept');
       $('#kadept').val(kadept);
    });
});
</script>
@endpush
