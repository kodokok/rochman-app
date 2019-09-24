<!-- Main content -->
<div class="row">

    <div class="col-md-6">
    {!! Form::model($model, [
        'route' => $model->exists ? ['auditplan.update', $model->id] : 'auditplan.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}
        <div class="card card-primary">
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
                    {!! Form::textarea('objektif_audit', null, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3]) !!}
                    <div id="error-objektif_audit" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="klausul">Klausul</label>
                    {!! Form::textarea('klausul', null, ['class' => 'form-control', 'id' => 'klausul', 'rows' => 3]) !!}
                    <div id="error-klausul" class="invalid-feedback"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="departement_id">Departement</label>
                        {!! Form::select('departement_id', $departements, null, ['class' => 'form-control', 'id' => 'departement_id',
                        'placeholder' => 'Please Select']) !!}
                        <div id="error-departement_id" class="invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                            {{-- <div class="form-group"> --}}
                        <label for="kadept">Kadept</label>
                        {!! Form::text('kadept', null, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                    {{-- </div> --}}

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="tanggal">Tanggal</label>
                        {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => 'tanggal']) !!}
                        <div id="error-tanggal" class="invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="waktu">Waktu</label>
                        <div class="input-group date" id="waktu" data-target-input="nearest">
                            <input type="text" name="waktu" id="waktu" class="form-control datetimepicker-input" data-target="#waktu"/>
                            <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                            </div>
                        </div>
                        <div id="error-waktu" class="invalid-feedback"></div>
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
                <h3 class="card-title">Audit User</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="auditee_id">Auditee</label>
                        {!! Form::select('auditee_id', $auditee, null, ['class' => 'form-control', 'id' => 'auditee_id',
                        'placeholder' => 'Please Select']) !!}
                        <div id="error-auditee_id" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="auditor_id">Auditor</label>
                        {!! Form::select('auditor_id', $auditor, null, ['class' => 'form-control', 'id' => 'auditor_id',
                        'placeholder' => 'Please Select']) !!}
                        <div id="error-auditor_id" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="auditor_leader_id">Auditor Leader</label>
                        {!! Form::select('auditor_leader_id', $auditorLeader, null, ['class' => 'form-control', 'id' => 'auditor_leader_id',
                        'placeholder' => 'Please Select']) !!}
                        <div id="error-auditor_leader_id" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="{{ $model->exists ? 'Update' : 'Create New'}}" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
