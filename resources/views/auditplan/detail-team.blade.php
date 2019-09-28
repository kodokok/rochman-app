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
                    {!! Form::text('auditee_id', $auditplan->auditee->name, ['class' => 'form-control', 'id' => 'auditee_id', 'disabled']) !!}
                </div>
                <div class="col-sm-4">
                    <label for="auditor_id">Auditor</label>
                    {!! Form::text('auditor_id', $auditplan->auditor->name, ['class' => 'form-control', 'id' => 'auditor_id', 'disabled']) !!}
                </div>
                <div class="col-sm-4">
                    <label for="auditor_leader_id">Leader</label>
                    {!! Form::text('auditor_leader_id', $auditplan->auditorLeader->name, ['class' => 'form-control', 'id' => 'auditor_leader_id', 'disabled']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
