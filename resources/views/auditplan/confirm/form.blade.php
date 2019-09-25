<!-- Main content -->
<div class="row">

    <div class="col-md-6">
        {!! Form::model($model, [
        'route' => ['auditplan.confirm', $model->id],
        'method' => 'PUT',
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
        <div class="card card-primary">
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
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Confirm" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
