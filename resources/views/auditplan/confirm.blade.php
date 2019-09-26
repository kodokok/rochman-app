@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Confirm Audit Plan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auditplan.index') }}">Audit Plan</a></li>
                    <li class="breadcrumb-item active">Confirm</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Main content -->
    <div class="row">
        @include('auditplan.details')
        <div class="col-md-6">
            {!! Form::model($auditPlan, [
                'route' => ['auditplan.confirm', $auditPlan->id],
                'method' => 'PUT',
                'autocomplete' => 'off'
            ]) !!}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Action</h3>
                </div>
                <div class="card-body text-center">

                    <div class="custom-control custom-radio custom-control-inline {{ $auditPlan->approval === 'pending' ? 'd-none': '' }}">
                        <input type="radio" id="customRadioInline1" name="action" class="custom-control-input" value="pending" {{ old('action') ? 'checked': '' }}>
                        <label class="custom-control-label" for="customRadioInline1">Pending</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline {{ $auditPlan->approval === 'approve' ? 'd-none': '' }}">
                        <input type="radio" id="customRadioInline2" name="action" class="custom-control-input" value="approve" {{ old('action') ? 'checked': '' }}>
                        <label class="custom-control-label" for="customRadioInline2">Approve</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline {{ $auditPlan->approval === 'reschedule' ? 'd-none': '' }}">
                        <input type="radio" id="customRadioInline3" name="action" class="custom-control-input" value="reschedule" {{ old('action') ? 'checked': '' }}>
                        <label class="custom-control-label" for="customRadioInline3">Reschedule</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline {{ $auditPlan->approval === 'reject' ? 'd-none': '' }}">
                        <input type="radio" id="customRadioInline4" name="action" class="custom-control-input" value="reject" {{ old('action') ? 'checked': '' }}>
                        <label class="custom-control-label" for="customRadioInline4">Reject</label>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Remarks</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body mb-3">
                    <div class="form-group">
                        {!! Form::textarea('remarks', null, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid': ''), 'id' => 'remarks', 'rows' => 4, 'placeholder' => 'Enter remarks...']) !!}
                        <div id="error-remarks" class="invalid-feedback">{{ $errors->first('remarks') }}</div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-warning d-none" id="reschedule">
                <div class="card-header">
                    <h3 class="card-title">Schedule Request</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="new_tanggal">Tanggal</label>
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input id="new_tanggal" name="new_tanggal" type="text"
                                        class="form-control datetimepicker-input {{ $errors->has('new_tanggal') ? ' is-invalid': '' }}"
                                        data-target="#datetimepicker4"
                                        value="{{ old('new_tanggal') }}"
                                    />
                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div id="error-new_tanggal" class="invalid-feedback">{{ $errors->first('new_tanggal') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="new_waktu">Waktu</label>
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <input id="new_waktu" name="new_waktu" type="text"
                                        class="form-control datetimepicker-input {{ $errors->has('new_waktu') ? ' is-invalid': '' }}"
                                        data-target="#datetimepicker3"
                                        value="{{ old('new_waktu') }}"
                                    />
                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                    </div>
                                    <div id="error-waktu" class="invalid-feedback">{{ $errors->first('new_waktu') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Confirm" class="btn btn-success float-right mr-2" style="width: 120px;">
        </div>
    </div>
    {!! Form::close() !!}
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(function () {
    $('input[type="radio"]').click(function(){

        var inputValue = $(this).attr("value");
        var target = $('#reschedule');

        if (inputValue === target.attr('id')){
            target.removeClass('d-none');
        } else {
            target.addClass('d-none');
        }
    });

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
