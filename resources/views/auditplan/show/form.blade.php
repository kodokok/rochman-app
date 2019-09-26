<!-- Main content -->
<div class="row">

    <div class="col-md-6">
        {!! Form::model($model, [
        'route' => ['auditplan.change', $model->id],
        'method' => 'PUT',
        'autocomplete' => 'off'
        ]) !!}
        <div class="card card-secondary">
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
                    <div class="row">
                        <label for="objektif_audit" class="col-sm-2 col-form-label">Objektif Audit</label>
                        <div class="col-sm-10">
                            {!! Form::textarea('objektif_audit',  $model->objektif_audit, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3, 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="klausul" class="col-sm-2 col-form-label">Klausul</label>
                        <div class="col-sm-10">
                        {!! Form::text('klausul', $model->klausul, ['class' => 'form-control', 'id' => 'klausul', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="departement_id" class="col-sm-2 col-form-label">Departement</label>
                        <div class="col-sm-5">
                                {!! Form::text('departement_id', $model->departement->name, ['class' => 'form-control', 'id' => 'departement_id', 'disabled']) !!}
                        </div>
                        <div class="col-sm-5">
                            {!! Form::text('kadept', $model->departement->user->name, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="auditee_id" class="col-sm-2 col-form-label">Auditee</label>
                        <div class="col-sm-10">
                        {!! Form::text('auditee_id', $model->auditee->name, ['class' => 'form-control', 'id' => 'auditee_id', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="auditor_id" class="col-sm-2 col-form-label">Auitor</label>
                        <div class="col-sm-10">
                            {!! Form::text('auditor_id', $model->auditor->name, ['class' => 'form-control', 'id' => 'auditor_id', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="auditor_leader_id" class="col-sm-2 col-form-label">Auditor Leader</label>
                        <div class="col-sm-10">
                            {!! Form::text('auditor_leader_id', $model->auditorLeader->name, ['class' => 'form-control', 'id' => 'auditor_leader_id', 'disabled']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="schedule" class="col-sm-2 col-form-label">Schedule</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                {!! Form::text('tanggal', $model->tanggal, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                </div>
                                {!! Form::text('waktu',  $model->waktu, ['class' => 'form-control', 'id' => 'waktu', 'disabled']) !!}
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
                <h3 class="card-title">Action</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadioInline1">Approve</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Change Schedule</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3">Reject</label>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Change Schedule</h3>
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
                    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'id' => 'remarks', 'rows' => 4, 'placeholder' => 'Enter remarks...']) !!}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="action" value="Confirm" class="btn btn-success float-right mr-2" style="width: 120px;">
        {{-- <input type="submit" name="action" value="Change" class="btn btn-info float-right mr-2" style="width: 120px;">
        <input type="submit" name="action" value="Reject" class="btn btn-danger float-right mr-2" style="width: 120px;"> --}}
    </div>
</div>
{!! Form::close() !!}
