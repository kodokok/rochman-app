@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('temuanaudit.edit'))
@section('page-title', 'Edit Temuan Audit')
@section('page-action')
    <input id="save" type="submit" value="Save" class="btn btn-success float-right"
        style="width: 120px;" {{ $model->isClosed() ? 'disabled' : '' }}>
    <a id="cancel" href="{{ old('redirect_to', url()->previous()) }}" class="btn btn-secondary float-right mr-2"
        style="width: 120px;">Cancel</a>
    @hasanyrole('admin|auditor_lead|auditor')
        @if ($model->isClosed())
            <a id="reopen" href="{{ route('temuanaudit.reopen', $model->id) }}" class="btn btn-warning float-right mr-2"
                style="width: 120px;">Reopen</a>
        @endif
    @endhasanyrole
@endsection

@section('content')
{!! Form::model($model, [
    'route' => ['temuanaudit.update', $model->id],
    'method' => 'PUT',
    'autocomplete' => 'off',
    'id' => 'current-form'
]) !!}
<div class="row">
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Detail Audit Plan</h3>
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
                        {{ Form::text('departemen', ($model->auditplan->departemen->kode . ' - ' . $model->auditplan->departemen->nama), ['class' => 'form-control', 'disabled']) }}
                    </div>
                    <div class="col-sm-6">
                        <label for="kadept">Kadept</label>
                        {!! Form::text('kadept', $model->auditplan->departemen->kadept->nama, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="tanggal">Tanggal</label>
                        {!! Form::text('tanngal', $model->auditplan->tanggal, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                    <div class="col-sm-6">
                        <label for="waktu">Waktu</label>
                        {!! Form::text('waktu', $model->auditplan->waktu, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="auditee_id">Auditee</label>
                    {!! Form::text('auditee', $model->auditplan->auditee->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor_user_id">Auditor</label>
                    {!! Form::text('auditor', $model->auditplan->auditor->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor_lead_user_id">Auditor Leader</label>
                    {!! Form::text('auditor_lead', $model->auditplan->auditorLead->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Temuan</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('ketidaksesuaian') !!}
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::textarea('ketidaksesuaian', null, ['class' => 'form-control', 'rows' => '3', $model->isClosed() ? 'disabled' : '']) !!}
                    @else
                        {!! Form::textarea('ketidaksesuaian', null, ['class' => 'form-control', 'rows' => '3', 'disabled']) !!}
                    @endhasanyrole
                    <div id="error-ketidaksesuaian" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    {!! Form::label('akar_masalah') !!}
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::textarea('akar_masalah', null, ['class' => 'form-control', 'rows' => '3', $model->isClosed() ? 'disabled' : '']) !!}
                    @else
                        {!! Form::textarea('akar_masalah', null, ['class' => 'form-control', 'rows' => '3', 'disabled']) !!}
                    @endhasanyrole
                    <div id="error-akar_masalah" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    {!! Form::label('klasifikasi', null, ['class' => 'mr-3']) !!}
                    <div class="icheck-success d-inline mr-3">
                        @hasanyrole('admin|auditor_lead|auditor')
                            {!! Form::radio('klasifikasi_temuan', 0, false, ['id' => 'klasifikasi_minor', $model->isClosed() ? 'disabled' : '']) !!}
                        @else
                            {!! Form::radio('klasifikasi_temuan', 0, false, ['id' => 'klasifikasi_minor', 'disabled']) !!}
                        @endhasanyrole
                        <label for="klasifikasi_minor" class="font-weight-normal">
                            Minor
                        </label>
                    </div>
                    <div class="icheck-success d-inline">
                        @hasanyrole('admin|auditor_lead|auditor')
                            {!! Form::radio('klasifikasi_temuan', 1, false, ['id' => 'klasifikasi_mayor', $model->isClosed() ? 'disabled' : '']) !!}
                        @else
                            {!! Form::radio('klasifikasi_temuan', 1, false, ['id' => 'klasifikasi_mayor', 'disabled']) !!}
                        @endhasanyrole
                        <label for="klasifikasi_mayor" class="font-weight-normal">
                            Mayor
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Detail Temuan</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('tindakan_perbaikan_pencegahan') !!}
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::textarea('tindakan_perbaikan_pencegahan', null, ['class' => 'form-control', 'rows' => '5', $model->isClosed() ? 'disabled' : '']) !!}
                    @else
                        {!! Form::textarea('tindakan_perbaikan_pencegahan', null, ['class' => 'form-control', 'rows' => '5', 'disabled']) !!}
                    @endhasanyrole
                    <div id="error-tindakan_perbaikan_pencegahan" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="tanggal_perbaikan_pencegahan">Tanggal Perbaikan Pencegahan</label>
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        @hasanyrole('admin|auditor_lead|auditor')
                            <input id="tanggal_perbaikan_pencegahan" name="tanggal_perbaikan_pencegahan" type="text"
                                class="form-control datetimepicker-input"
                                data-target="#datetimepicker4"
                                placeholder="mm-dd-yyyy"
                                value="{{ $model->tanggal_perbaikan_pencegahan }}"
                                {{ $model->isClosed() ? 'disabled' : '' }}
                            />
                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <div id="error-tanggal_perbaikan_pencegahan" class="invalid-feedback"></div>
                        @else
                            {!! Form::text('tanggal_perbaikan_pencegahan', null, ['class' => 'form-control', 'disabled']) !!}
                        @endhasanyrole
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('review') !!}
                    @hasanyrole('admin|auditor_lead|auditor')
                        {!! Form::textarea('review', null, ['class' => 'form-control', 'rows' => '5', $model->isClosed() ? 'disabled' : '']) !!}
                    @else
                        {!! Form::textarea('review', null, ['class' => 'form-control', 'rows' => '5', 'disabled']) !!}
                    @endhasanyrole
                    <div id="error-review" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    {!! Form::label('approval') !!}
                    <div class="icheck-success">
                        {!! Form::checkbox('approval_kadept', 1, $model->approval_kadept, ['id' => 'approval_kadept', $is_user_kadept ? '': 'disabled']) !!}
                        <label for="approval_kadept" class="font-weight-normal">
                            Kadept
                        </label>
                    </div>
                    <div class="icheck-success">
                        {!! Form::checkbox('approval_auditee', 1, $model->approval_auditee, ['id' => 'approval_auditee', $is_user_auditee ? '': 'disabled']) !!}
                        <label for="approval_auditee" class="font-weight-normal">
                            Auditee
                        </label>
                    </div>
                    <div class="icheck-success">
                        {!! Form::checkbox('approval_auditor', 1, $model->approval_auditor, ['id' => 'approval_auditor', $is_user_auditor ? '': 'disabled']) !!}
                        <label for="approval_auditor" class="font-weight-normal">
                            Auditor
                        </label>
                    </div>
                    <div class="icheck-success">
                        {!! Form::checkbox('approval_auditor_lead', 1, $model->approval_auditor_lead, ['id' => 'approval_auditor_lead', $is_user_auditor_lead ? '': 'disabled']) !!}
                        <label for="approval_auditor_lead" class="font-weight-normal">
                            Auditor Leader
                        </label>
                    </div>
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
    $('#datetimepicker4').datetimepicker({
        format: 'MM-DD-YYYY'
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

    $("body").on("click", "#reopen", function(event) {
        event.preventDefault();

        var me = $(this);
        var url = me.attr('href');
        var title = me.attr('title');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Apakah and ingin reopen temuan audit ini?',
            text: '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, reopen!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_method': 'PUT',
                        '_token': csrf_token
                    },
                    success: function(response) {
                        window.location.href = response.redirect_to;
                    },
                    error: function(status)
                    {
                        console.log(status);
                    }
                });
            }
        });
    });
});

</script>
@endpush
