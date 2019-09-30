@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $temuanaudit->exists ? 'Edit' : 'Create'}} Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('temuanaudit.index') }}">Temuan Audit</a></li>
                    <li class="breadcrumb-item active">{{ $temuanaudit->exists ? 'Edit' : 'Create'}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        @if ($temuanaudit->exists)
            <div class="col-md-4">
                @include('auditplan.details')
            </div>
            <div class="col-md-4">
                @include('auditplan.detail-team')
            </div>
        @else
            <div class="col-md-6">
                @include('temuanaudit.select-auditplan')
            </div>
        @endif
        <div class="{{ $temuanaudit->exists ? 'col-md-4' : 'col-md-6'}}">
            {!! Form::model($temuanaudit, [
                'route' => $temuanaudit->exists ? ['temuanaudit.update', $temuanaudit->id] : 'temuanaudit.store',
                'method' => $temuanaudit->exists ? 'PUT' : 'POST',
                'autocomplete' => 'off'
            ]) !!}

            @include('temuanaudit.form', ['disabled' => false])
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('temuanaudit.index') }}" class="btn btn-secondary" style="width: 120px;">Cancel</a>
            @if ($temuanaudit->exists)
                <input type="submit" value="Update" class="btn btn-success float-right mr-2" style="width: 120px;">
            @else
                <input type="submit" name="action" value="Save" class="btn btn-success float-right mr-2" style="width: 150px;">
                <input type="submit" name="action" value="Save & Create New" class="btn btn-warning float-right mr-2" style="width: 150px;">
            @endif
        </div>
    </div>
    {!! Form::close() !!}
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(document).ready(function(){


    $('#select_departement').select2({
        width:'100%',
        placeholder: 'Please select departement',
    });
    $('#select_objektif').select2({
        width:'100%',
        placeholder: 'Please select objektif plan',
    });

    $('#select_departement').on('change', function() {
        var departement_id = $(this).val();
        var url = '{{ route("auditplan.departement", ":id") }}'.replace(':id', departement_id);

        $.get(url, function(data) {

            $.each(data, function(index, value) {
                var option = new Option(value.objektif_audit, value.id);
                $("#select_objektif").append(option);
            });

        });

        $("#select_objektif option[value]").remove();

        $("#select_objektif").val("").trigger("change");
    });

    var oldSelectedObjektif = $('#audit_plan_id');
    if (oldSelectedObjektif !== '') {
        $("#select_objektif").val(oldSelectedObjektif).trigger("change");
    }

    $('#select_objektif').on('change', function() {
        var value = $(this).val();

        $('#audit_plan_id').val(value);
    });

    // datetimepicker due date perbaikan
    $('#datetimepicker1').datetimepicker({
        format: 'MM-DD-YYYY',
    });

    // datetimepicker due date pencegahan
    $('#datetimepicker2').datetimepicker({
        format: 'MM-DD-YYYY',
    });
});
</script>
@endpush
