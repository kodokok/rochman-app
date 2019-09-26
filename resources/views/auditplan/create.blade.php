@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Audit Plan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auditplan.index') }}">Audit Plan</a></li>
                    <li class="breadcrumb-item active">{{ $model->exists ? 'Edit' : 'Create'}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Main content -->
<div class="row">
    <div class="col-md-6">
    {!! Form::model($model, [
        'route' => $model->exists ? ['auditplan.update', $model->id] : 'auditplan.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'autocomplete' => 'off'
    ]) !!}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="objektif_audit">Objektif Audit</label>
                    {!! Form::textarea('objektif_audit', null, ['class' => 'form-control' . ($errors->has('objektif_audit') ? ' is-invalid': ''), 'id' => 'objektif_audit', 'rows' => 3]) !!}
                    @error('objektif_audit')
                        <div id="error-objektif_audit" class="invalid-feedback">{{ $errors->first('objektif_audit') }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="klausul">Klausul</label>
                    {!! Form::text('klausul', null, ['class' => 'form-control'. ($errors->has('klausul')? ' is-invalid': ''), 'id' => 'klausul']) !!}
                    @error('klausul')
                        <div id="error-klausul" class="invalid-feedback">{{ $errors->first('klausul') }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="departement_id">Departement</label>
                            <select class="form-control {{ $errors->has('departement_id')? ' is-invalid': '' }}" name="departement_id" id="departement_id">
                                <option value="" {{ !$model->exists ? 'selected' : ''}} disabled>Please select</option>
                                @foreach($departement as $dept)
                                    @if ($model->exist)
                                        <option {{ $model->departement->id == $dept->id ? "selected" : "" }}
                                            value="{{ $dept->id }}"
                                            data-kadept="{{ $dept->user->name }}"
                                            >
                                            {{ $dept->name }}
                                        </option>
                                    @else
                                        <option {{ old('departement_id') == $dept->id ? "selected" : "" }}
                                            value="{{ $dept->id }}"
                                            data-kadept="{{ $dept->user->name }}"
                                        >
                                            {{ $dept->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <div id="error-departement_id" class="invalid-feedback">{{ $errors->first('departement_id') }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kadept">Kadept</label>
                            @if ($model->exists)
                                {!! Form::text('kadept', ($model->exists ? $model->departement->user->name : null), ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                            @else
                                {!! Form::text('kadept', null, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input id="tanggal" name="tanggal" type="text"
                                    class="form-control datetimepicker-input {{ $errors->has('tanggal') ? ' is-invalid': '' }}"
                                    data-target="#datetimepicker4"
                                    value="{{ $model->exists ? $model->tanggal : old('tanggal') }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <div id="error-tanggal" class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input id="waktu" name="waktu" type="text"
                                    class="form-control datetimepicker-input {{ $errors->has('waktu') ? ' is-invalid': '' }}"
                                    data-target="#datetimepicker3"
                                    value="{{ $model->exists ? $model->waktu : old('waktu') }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                </div>
                                <div id="error-waktu" class="invalid-feedback">{{ $errors->first('waktu') }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Team Audit</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="auditee_id">Auditee</label>
                    {!! Form::select('auditee_id', $auditee, old('auditee_id'),
                        ['class' => 'form-control' . ($errors->has('auditee_id') ? ' is-invalid': ''), 'id' => 'auditee_id', 'placeholder' => 'Please Select'])
                    !!}
                    <div id="error-auditee_id" class="invalid-feedback">{{ $errors->first('auditee_id') }}</div>
                </div>
                <div class="form-group">
                    <label for="auditor_id">Auditor</label>
                    {!! Form::select('auditor_id', $auditee, old('auditor_id'),
                        ['class' => 'form-control' . ($errors->has('auditor_id') ? ' is-invalid': ''), 'id' => 'auditor_id', 'placeholder' => 'Please Select'])
                    !!}
                    <div id="error-auditor_id" class="invalid-feedback">{{ $errors->first('auditor_id') }}</div>
                </div>
                <div class="form-group">
                    <label for="auditor_leader_id">Auditor Leader</label>
                    {!! Form::select('auditor_leader_id', $auditorLeader, old('auditor_leader_id'),
                        ['class' => 'form-control' . ($errors->has('auditor_leader_id') ? ' is-invalid': ''), 'id' => 'auditor_leader_id', 'placeholder' => 'Please Select'])
                    !!}
                    <div id="error-auditor_leader_id" class="invalid-feedback">{{ $errors->first('auditor_leader_id') }}</div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="{{ $model->exists ? 'Update' : 'Create New'}}" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
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
