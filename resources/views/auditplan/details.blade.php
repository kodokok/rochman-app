<div class="col-md-6">
    <div class="card card-default">
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
                {!! Form::textarea('objektif_audit',  $auditPlan->objektif_audit, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3, 'disabled']) !!}
            </div>
            <div class="form-group">
                <label for="klausul">Klausul</label>
                {!! Form::text('klausul', $auditPlan->klausul, ['class' => 'form-control', 'id' => 'klausul', 'disabled']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="departement_id">Departement</label>
                        {!! Form::text('departement_id', $auditPlan->departement->name, ['class' => 'form-control', 'id' => 'departement_id', 'disabled']) !!}
                    </div>
                    <div class="col-sm-6">
                        <label for="departement_id">Kadept</label>
                        {!! Form::text('kadept', $auditPlan->departement->user->name, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            {!! Form::text('tanggal', $auditPlan->tanggal, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="waktu">Waktu</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                            {!! Form::text('waktu',  $auditPlan->waktu, ['class' => 'form-control', 'id' => 'waktu', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="approval">Approval Status</label>
                        {!! Form::text('approval', $auditPlan->approval, ['class' => 'form-control', 'id' => 'approval', 'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-default">
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
                <div class="row">
                    <div class="col-sm-4">
                        <label for="auditee_id">Auditee</label>
                        {!! Form::text('auditee_id', $auditPlan->auditee->name, ['class' => 'form-control', 'id' => 'auditee_id', 'disabled']) !!}
                    </div>
                    <div class="col-sm-4">
                        <label for="auditor_id">Auditor</label>
                        {!! Form::text('auditor_id', $auditPlan->auditor->name, ['class' => 'form-control', 'id' => 'auditor_id', 'disabled']) !!}
                    </div>
                    <div class="col-sm-4">
                        <label for="auditor_leader_id">Auditor Leader</label>
                        {!! Form::text('auditor_leader_id', $auditPlan->auditorLeader->name, ['class' => 'form-control', 'id' => 'auditor_leader_id', 'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
