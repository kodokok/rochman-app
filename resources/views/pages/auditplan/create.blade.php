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
{!! Form::model($model, [
    'route' => 'auditplan.store',
    'method' => 'POST',
    'autocomplete' => 'off',
    'files' => true,
    'id' => 'current-form'
]) !!}
<div class="row">

    <div class="col-md-5">

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
                <div class="row">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="auditee_id">Auditee</label>
                    {!! Form::select('auditee_user_id', $auditee, old('auditee_user_id'),
                        ['class' => 'form-control' . ($errors->has('auditee_user_id') ? ' is-invalid': ''),
                        'id' => 'auditee_user_id', 'placeholder' => 'Pilih Auditee'])
                    !!}
                </div>
                <div class="form-group">
                    <label for="auditor_user_id">Auditor</label>
                    {!! Form::select('auditor_user_id', $auditor, old('auditor_user_id'),
                        ['class' => 'form-control' . ($errors->has('auditor_user_id') ? ' is-invalid': ''),
                        'id' => 'auditor_user_id', 'placeholder' => 'Pilih Auditor'])
                    !!}
                </div>
                <div class="form-group">
                    <label for="auditor_lead_user_id">Auditor Leader</label>
                    {!! Form::select('auditor_lead_user_id', $auditorLead, old('auditor_lead_user_id'),
                        ['class' => 'form-control' . ($errors->has('auditor_lead_user_id') ? ' is-invalid': ''),
                        'id' => 'auditor_lead_user_id', 'placeholder' => 'Pilih Auditor Leader'])
                    !!}
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-7">
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
                    <div class="input-group col-12">
                        {{ Form::select('klausul', $klausul, null, ['class' => 'form-control', 'id' => 'klausul', 'placeholder' => 'Pilih klausul...']) }}
                        <div class="input-group-append">
                            <button id="add-row" class="btn btn-outline-success" type="button">Add</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <table id="table-klausul" name="table_klausul" class="table table-sm w100">
                            <thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:25%;">Objektif Audit</th>
                                    <th style="width:50%;">Klausul</th>
                                    <th class="text-center" style="width:10%;"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ $model->exists ? old('klausul_id') : '' }}
{!! Form::close() !!}
@endsection

@push('scripts')
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
$(function () {
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

    $('#klausul').select2({
        placeholder: "Pilih klausul..."
    });

    $('#add-row').click(function(){

        var klausul = $('#klausul').select2('data');
        var id = klausul[0].id;
        var nama = klausul[0].text;
        var hiddenField = '<input type="hidden" name="klausul_id[]" value="' + id + '">';
        // var row = '<tr><td>' + id + '</td><td>'  + hiddenField + nama + '</td></tr>';
        var exist = $('#table-klausul td:contains('+ nama +')').length ? true : false;
        // console.log(id);
        if (exist || id.length == 0) {
            toastr.warning('Error', 'Silahkan pilih data klausul yang lain!')
        } else {

            var url = '{{ url("klausul/select") }}/' + id;

            $.get(url, function(data) {

                // console.log(data);
                $.each(data, function(key, value) {

                    $('#table-klausul tbody').append('<tr><td>' + hiddenField + value.id
                        + '</td><td>' + value.objektif_audit
                        + '</td><td>' + value.nama
                        + '</td><td><button id="delete-row" class="btn btn-sm btn-danger">'
                        + '<i class="fas fa-times"></i></button></td></tr>'
                    );
                })
            });

            $('#klausul').val('').trigger('change');
        }    
    });

    $('#table-klausul').on('click', '#delete-row', function(){
        $(this).closest('tr').remove();
    });

    $("#save").on('click', function(e){
        // e.preventDefault();
        $("#current-form").submit(); // Submit the form
    });
    
    // validation form
    $('#current-form').validate({
        rules: {
            departemen_id: 'required',
            tanggal: 'required',
            waktu: 'required',
            auditee_user_id: 'required',
            auditor_user_id: 'required',
            auditor_lead_user_id: 'required',
            table_klausul: 'required',
        },
        messages: {
            
        },
        submitHandler: function(form) {
            form.submit();
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});

</script>
@endpush
