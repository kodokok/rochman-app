@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan.create'))
@section('page-title', 'Create New Audit Plan')
@section('page-action')
    <input id="save" type="submit" value="Simpan" class="btn btn-success float-right" 
        style="width: 120px;">
    <a href="{{ old('redirect_to', url()->previous()) }}" class="btn btn-secondary float-right" 
        style="margin-right: 5px; width: 120px;">Batal</a>
@endsection

@section('content')

<div class="row">
    <div class="col-md-4">
    {!! Form::model($model, [
        'route' => 'auditplan.store',
        'method' => 'POST',
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="departemen_id">Departemen</label>
                            {{ Form::select('departemen_id', $departemen, null, ['class' => 'form-control', 'id' => 'departemen_id', 'placeholder' => 'Pilih departemen']) }}
                            <div id="error-departemen_id" class="invalid-feedback">{{ $errors->first('departemen_id') }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kadept">Kadept</label>
                            @if ($model->exists)
                                {!! Form::text('kadept', ($model->exists ? $model->departemen->user->nama : null), ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
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
                        {!! Form::select('auditee_user_id', $auditee, old('auditee_user_id'),
                            ['class' => 'form-control' . ($errors->has('auditee_user_id') ? ' is-invalid': ''), 
                            'id' => 'auditee_user_id', 'placeholder' => 'Pilih Auditee'])
                        !!}
                        <div id="error-auditee_user_id" class="invalid-feedback">{{ $errors->first('auditee_user_id') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="auditor_user_id">Auditor</label>
                        {!! Form::select('auditor_user_id', $auditor, old('auditor_user_id'),
                            ['class' => 'form-control' . ($errors->has('auditor_user_id') ? ' is-invalid': ''), 
                            'id' => 'auditor_user_id', 'placeholder' => 'Pilih Auditor'])
                        !!}
                        <div id="error-auditor_user_id" class="invalid-feedback">{{ $errors->first('auditor_id') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="auditor_lead_user_id">Auditor Leader</label>
                        {!! Form::select('auditor_lead_user_id', $auditorLead, old('auditor_lead_user_id'),
                            ['class' => 'form-control' . ($errors->has('auditor_lead_user_id') ? ' is-invalid': ''), 
                            'id' => 'auditor_lead_user_id', 'placeholder' => 'Pilih Auditor Leader'])
                        !!}
                        <div id="error-auditor_lead_user_id" class="invalid-feedback">{{ $errors->first('auditor_lead_user_id') }}</div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Klausul</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group col-sm-12">
                        {{ Form::select('klausul', $klausul, null, ['class' => 'form-control', 'id' => 'klausul', 'placeholder' => 'Pilih klausul']) }}
                        <div class="input-group-append">
                            <button id="add-row" class="btn btn-outline-success" type="button">Add</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table id="table-klausul" class="table table-sm w100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Objektif Audit</th>
                                <th>Klausul</th>
                                <th style="width:20%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection

@push('scripts')
<script>
$(function () {

    $('#klausul').select2();

    $('#add-row').click(function(){
        
        var klausul = $('#klausul').select2('data');

        var row = '<tr><td id="'+ klausul[0].id + '">' + klausul[0].id + '</td><td>' 
            + klausul[0].text + '</td></tr>';

        $('#table-klausul tbody').append(row);
        $('#klausul').val('').trigger('change');
    });

    $('#datetimepicker4').datetimepicker({
        format: 'MM-DD-YYYY',
    });

    $('#datetimepicker3').datetimepicker({
        format: 'HH:mm:ss'
    });

    $('#departemen_id').on('change', function(){
       var kadept = $(this).children('option:selected').data('kadept');
       $('#kadept').val(kadept);
    });
});
</script>
@endpush