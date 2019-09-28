@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('temuanaudit.index') }}">Temuan Audit</a></li>
                    <li class="breadcrumb-item active">{{ $model->exists ? 'Edit' : 'Create'}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Select Approved Audit Plan</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    {!! Form::model($model, [
                        'route' => $model->exists ? ['temuanaudit.update', $model->id] : 'temuanaudit.store',
                        'method' => $model->exists ? 'PUT' : 'POST',
                        'autocomplete' => 'off'
                    ]) !!}

                    @error('audit_plan_id')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> You should check in on some of those fields below.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                    @enderror
                    <div class="form-group">
                        <label for="select_departement">Departement</label>
                        {!! Form::select('select_departement', $departement, old('select_departement'), ['class' => 'form-control', 'id' => 'select_departement', 'placeholder' => 'Please select departement']) !!}
                    </div>
                    {!! Form::hidden('audit_plan_id', old('audit_plan_id'), ['id' => 'audit_plan_id']) !!}
                    <div class="form-group">
                        <label for="select_objektif">Objektif Audit</label>
                        <select name="select_objektif" class="form-control" id="select_objektif">
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Temuan Audit</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="klausul">Ketidaksesuaian</label>
                        {!! Form::text('ketidaksesuaian', null, ['class' => 'form-control'. ($errors->has('ketidaksesuaian')? ' is-invalid': ''), 'id' => 'ketidaksesuaian']) !!}
                        <div id="error-ketidaksesuaian" class="invalid-feedback">{{ $errors->first('ketidaksesuaian') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="akar_masalah">Akar Masalah</label>
                        {!! Form::text('akar_masalah', null, ['class' => 'form-control'. ($errors->has('akar_masalah')? ' is-invalid': ''), 'id' => 'akar_masalah']) !!}
                        <div id="error-akar_masalah" class="invalid-feedback">{{ $errors->first('akar_masalah') }}</div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
                                {!! Form::text('tindakan_perbaikan', null, ['class' => 'form-control'. ($errors->has('tindakan_perbaikan')? ' is-invalid': ''), 'id' => 'tindakan_perbaikan']) !!}
                                <div id="error-tindakan_perbaikan" class="invalid-feedback">{{ $errors->first('tindakan_perbaikan') }}</div>
                            </div>
                            <div class="col-sm-4">
                                <label for="duedate_perbaikan">Due Date Pencegahan</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input id="duedate_perbaikan" name="duedate_perbaikan" type="text"
                                        class="form-control datetimepicker-input {{ $errors->has('duedate_perbaikan') ? ' is-invalid': '' }}"
                                        data-target="#datetimepicker1"
                                        value="{{ $model->exists ? $model->duedate_perbaikan : old('duedate_perbaikan') }}"
                                    />
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div id="error-duedate_perbaikan" class="invalid-feedback">{{ $errors->first('duedate_perbaikan') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="tindakan_pencegahan">Tindakan Pencegahan</label>
                                {!! Form::text('tindakan_pencegahan', null, ['class' => 'form-control'. ($errors->has('tindakan_pencegahan')? ' is-invalid': ''), 'id' => 'tindakan_pencegahan']) !!}
                                <div id="error-tindakan_pencegahan" class="invalid-feedback">{{ $errors->first('tindakan_pencegahan') }}</div>
                            </div>
                            <div class="col-sm-4">
                                <label for="duedate_pencegahan">Due Date Pencegahan</label>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input id="duedate_pencegahan" name="duedate_pencegahan" type="text"
                                        class="form-control datetimepicker-input {{ $errors->has('duedate_pencegahan') ? ' is-invalid': '' }}"
                                        data-target="#datetimepicker2"
                                        value="{{ $model->exists ? $model->duedate_pencegahan : old('duedate_pencegahan') }}"
                                    />
                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div id="error-duedate_pencegahan" class="invalid-feedback">{{ $errors->first('duedate_pencegahan') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('auditplan.index') }}" class="btn btn-secondary" style="width: 120px;">Cancel</a>
            <input type="submit" name="action" value="Save" class="btn btn-success float-right mr-2" style="width: 150px;">
            <input type="submit" name="action" value="Save & Create New" class="btn btn-warning float-right mr-2" style="width: 150px;">
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
