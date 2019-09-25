<!-- Main content -->
<div class="row">

    <div class="col-md-6">
        {!! Form::model($model, [
        'route' => ['auditplan.confirm', $model->id],
        'method' => 'PUT',
        'autocomplete' => 'off'
        ]) !!}
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="objektif_audit">Objektif Audit</label>
                    {!! Form::textarea('objektif_audit', null, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3, 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="klausul">Klausul</label>
                    {!! Form::text('klausul', null, ['class' => 'form-control', 'id' => 'klausul', 'disabled']) !!}
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="departement_id">Departement</label>
                                {!! Form::text('departement_id', $model->departement->name, ['class' => 'form-control', 'id' => 'departement_id', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kadept">Kadept</label>
                            {!! Form::text('kadept', $model->departement->user->name, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="auditee_id">Auitee</label>
                    {!! Form::text('auditee_id', $model->auditee->name, ['class' => 'form-control', 'id' => 'auditee_id', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor_id">Auitor</label>
                    {!! Form::text('auditor_id', $model->auditor->name, ['class' => 'form-control', 'id' => 'auditor_id', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor_leader_id">Auditor Leader</label>
                    {!! Form::text('auditor_leader_id', $model->auditorLeader->name, ['class' => 'form-control', 'id' => 'auditor_leader_id', 'disabled']) !!}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Schedule</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            {!! Form::text('waktu', null, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-primary">
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
                    <div class="col-sm-5">
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
                    <div class="col-sm-5">
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
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button class="form-control btn btn-info">Change</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Remarks</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'id' => 'remarks', 'rows' => 3]) !!}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Approve" class="btn btn-success float-right">
        <input type="submit" value="Reject" class="btn btn-danger float-right mr-2">
    </div>
</div>
{!! Form::close() !!}
