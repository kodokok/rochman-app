<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Approval</h3>
        <div class="card-tools">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="approve_kadept" name="approve_kadept"
                        {{ old('approve_kadept') ? 'checked' : '' }}
                        {{ $temuanaudit->approve_kadept ? 'checked' : '' }}
                    >
                    <label class="custom-control-label" for="approve_kadept">Kadept</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="approve_auditee" name="approve_auditee"
                        {{ old('approve_auditee') ? 'checked' : '' }} {{ $temuanaudit->approve_auditee ? 'checked' : '' }}>
                    <label class="custom-control-label" for="approve_auditee">Auditee</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="approve_auditor" name="approve_auditor"
                        {{ old('approve_auditor') ? 'checked' : '' }} {{ $temuanaudit->approve_auditor ? 'checked' : '' }}>
                    <label class="custom-control-label" for="approve_auditor">Auditor</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="approve_auditor_leader" name="approve_auditor_leader"
                        {{ old('approve_auditor_leader') ? 'checked' : '' }} {{ $temuanaudit->approve_auditor_leader ? 'checked' : '' }}>
                    <label class="custom-control-label" for="approve_auditor_leader">Auditor Leader</label>
                </div>
            </div>
        </div>
    </div>
</div>
