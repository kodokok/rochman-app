@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan.edit'))
@section('page-title', 'Edit Audit Plan')
@section('page-action')
    <input id="save" type="submit" value="Save" class="btn btn-success float-right"
        style="width: 120px;">
    <a id="cancel" href="{{ old('redirect_to', url()->previous()) }}" class="btn btn-secondary float-right"
        style="margin-right: 5px; width: 120px;">Cancel</a>
@endsection

@section('content')
{!! Form::model($model, [
    'route' => ['auditplan.update', $model->id],
    'method' => 'PUT',
    'autocomplete' => 'off',
    'id' => 'current-form'
]) !!}
<div class="row">
    <div class="col-md-4">
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
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="departemen_id">Departemen</label>
                        @hasanyrole('admin|auditor_lead|auditor')
                            {{ Form::select('departemen_id', $departemen, null, ['class' => 'form-control', 'id' => 'departemen_id', 'placeholder' => 'Pilih departemen...']) }}
                        @else
                            {{ Form::text('departemen', ($model->departemen->kode . ' - ' . $model->departemen->nama), ['class' => 'form-control', 'disabled']) }}
                        @endhasanyrole
                        <div id="error-departemen_id" class="invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="kadept">Kadept</label>
                        {!! Form::text('kadept', $kadept, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                    </div>

                </div>
                <div class="form-group row">
                    @hasanyrole('admin|auditor_lead|auditor')
                        <div class="col-sm-6">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input id="tanggal" name="tanggal" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4"
                                    placeholder="mm-dd-yyyy"
                                    value="{{ $model->tanggal }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <div id="error-tanggal" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="waktu">Waktu</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input id="waktu" name="waktu" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker3"
                                    placeholder="HH:mm:ss"
                                    value="{{ $model->waktu }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                </div>
                                <div id="error-waktu" class="invalid-feedback"></div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-6">
                            <label for="tanggal">Tanggal</label>
                            {!! Form::text('tanngal', $model->tanggal, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="col-sm-6">
                            <label for="waktu">Waktu</label>
                            {!! Form::text('waktu', $model->waktu, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    @endhasanyrole
                </div>
                <div class="form-group">
                    <label for="auditee_id">Auditee</label>
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::select('auditee_user_id', $auditee, null,
                            ['class' => 'form-control',
                            'id' => 'auditee_user_id', 'placeholder' => 'Pilih auditee...'])
                        !!}
                        <div id="error-auditee_user_id" class="invalid-feedback"></div>
                    @else
                        {!! Form::text('auditee', $model->auditee->nama, ['class' => 'form-control', 'disabled']) !!}
                    @endhasanyrole
                </div>
                <div class="form-group">
                    <label for="auditor_user_id">Auditor</label>
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::select('auditor_user_id', $auditor, null,
                            ['class' => 'form-control',
                            'id' => 'auditor_user_id', 'placeholder' => 'Pilih auditor...'])
                        !!}
                        <div id="error-auditor_user_id" class="invalid-feedback"></div>
                    @else
                        {!! Form::text('auditor', $model->auditor->nama, ['class' => 'form-control', 'disabled']) !!}
                    @endhasanyrole
                </div>
                <div class="form-group">
                    <label for="auditor_lead_user_id">Auditor Leader</label>
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::select('auditor_lead_user_id', $auditorLead, null,
                            ['class' => 'form-control',
                            'id' => 'auditor_lead_user_id', 'placeholder' => 'Pilih auditor lead...'])
                        !!}
                        <div id="error-auditor_lead_user_id" class="invalid-feedback"></div>
                    @else
                        {!! Form::text('auditor_lead', $model->auditorLead->nama, ['class' => 'form-control', 'disabled']) !!}
                    @endhasanyrole
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
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
                        @hasanyrole('admin|auditor_lead|auditor')
                        <div class="form group row mb-3">
                            <div class="col-10">
                                {{ Form::select('klausul', $klausul, null, ['class' => 'form-control', 'id' => 'klausul', 'placeholder' => 'Pilih klausul...']) }}
                            </div>
                            <div class="col-2">
                                <button id="add-row" class="btn btn-outline-success btn-block" type="button" style="width=100%;">Add</button>
                            </div>
                        </div>
                        @endhasanyrole
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
                                        @foreach ($model->klausuls as $item)
                                            <tr>
                                                <td><input type="hidden" name="klausul_id[]" value="{{ $item->id }}">{{ $item->id }}</td>
                                                <td>{{ $item->objektif_audit }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                @hasanyrole('admin|auditor_lead|auditor')
                                                    @if (in_array($item->nama, $klausul_temuan) == 0)
                                                        <button id="delete-row" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                    @endif
                                                @endhasanyrole
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="error-klausul" class="small form-text text-danger d-none"></div>
                    </div>
                </div>
            </div>
        </div>
        @if ($model->ubahJadwalAudit)
            @include('pages.auditplan.ubah-jadwal')
        @endif
    </div>

</div>

{!! Form::close() !!}
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

    $('#departemen_id').select2({
        placeholder: "Pilih departemen...",
        width: '100%',
        containerCssClass: "error"
    });

    $('#departemen_id').on('select2:select', function (e) {
        var data = e.params.data;
        var url = '{{ url("departemen/{id}/kadept") }}';
        $.get(url.replace('{id}', data.id), function(response) {
            $('#kadept').val(response);
        });
    }).trigger('change');

    $('#klausul').select2({
        placeholder: "Pilih klausul...",
        width: '100%'
    });

    $('#auditee_user_id').select2({
        placeholder: "Pilih auditee...",
        width: '100%'
    });

    $('#auditor_user_id').select2({
        placeholder: "Pilih auditor...",
        width: '100%'
    });

    $('#auditor_lead_user_id').select2({
        placeholder: "Pilih auditor lead...",
        width: '100%'
    });

    $('#add-row').click(function(){

        var klausul = $('#klausul').select2('data');
        var id = klausul[0].id;
        var nama = klausul[0].text;
        var hiddenField = '<input type="hidden" name="klausul_id[]" value="' + id + '">';
        var exist = $('#table-klausul td:contains('+ nama +')').length ? true : false;
        if (exist || id.length == 0) {
            toastr.warning('Error', 'Silahkan pilih data klausul yang lain!')
        } else {

            var url = '{{ url("klausul/select") }}/' + id;

            $.get(url, function(data) {
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
        $("#current-form").submit();
    });

    $('#current-form').submit(function (event) {
        event.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var formData = new FormData(form.get(0));
        var buttonText = $("#save").val();
        var redirect_to = $('#cancel').attr('href');

        $.ajax({
            url: url,
            method: method,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#save").val('Sending...');
                $('.is-invalid').removeClass('is-invalid');
                $('#error-klausul').addClass('d-none');
            },
            success: function(response) {

                if (response.fail) {

                    for (const control in response.errors) {
                        $('#' + control).addClass('is-invalid');
                        $('#error-' + control).text(response.errors[control]);

                        if (control == 'klausul_id') {
                            $('#error-klausul').removeClass('d-none');
                            $('#error-klausul').text(response.errors[control]);
                        }
                    }
                    $("#save").val(buttonText);

                } else {
                    if (response.redirect_to) {
                        window.location.href = response.redirect_to;
                    } else {
                        $("#save").val(buttonText);
                    }
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
                $("#save").val(buttonText);
            }
        });
    });
});

</script>
@endpush
