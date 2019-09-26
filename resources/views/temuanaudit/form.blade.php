<!-- Main content -->
<div class="row">
    <div class="col-md-6">
        {!! Form::model($model, [
            'route' => ['temuan.update', $model->id],
            'method' => 'PUT',
            'autocomplete' => 'off'
        ]) !!}
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Audit Plan</h3>
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
        <div class="card card-info">
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
                            <input type="checkbox" class="custom-control-input" id="approve_kadept">
                            <label class="custom-control-label" for="approve_kadept">Kadept</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="approve_auditee">
                            <label class="custom-control-label" for="approve_auditee">Auditee</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="approve_auditor">
                            <label class="custom-control-label" for="approve_auditor">Auditor</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="approve_auditor_leader">
                            <label class="custom-control-label" for="approve_auditor_leader">Auditor Leader</label>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Temuan Audit</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="klausul">Ketidaksesuaian</label>
                    {!! Form::text('ketidaksesuaian', null, ['class' => 'form-control'. ($errors->has('ketidaksesuaian')? ' is-invalid': ''), 'id' => 'ketidaksesuaian']) !!}
                    <div id="error-ketidaksesuaian" class="invalid-feedback">{{ $errors->first('ketidaksesuaian') }}</div>
                </div>
                <div class="form-group">
                    <label for="akar_masalah">Akar Masalah</label>
                    {!! Form::text('akar_masalah', null, ['class' => 'form-control'. ($errors->has('akar_masalah')? ' is-invalid': ''), 'id' => 'akar_masalah']) !!}
                    <div id="error-akar_masalah" class="invalid-feedback">{{ $errors->first('akar_masalah') }}</div>
                </div>
                <div class="form-group">
                    <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
                    {!! Form::text('tindakan_perbaikan', null, ['class' => 'form-control'. ($errors->has('tindakan_perbaikan')? ' is-invalid': ''), 'id' => 'tindakan_perbaikan']) !!}
                    <div id="error-tindakan_perbaikan" class="invalid-feedback">{{ $errors->first('tindakan_perbaikan') }}</div>
                </div>
                <div class="form-group">
                    <label for="tidakan_pencegahan">Tindakan Pencegahan</label>
                    {!! Form::text('tidakan_pencegahan', null, ['class' => 'form-control'. ($errors->has('tidakan_pencegahan')? ' is-invalid': ''), 'id' => 'tidakan_pencegahan']) !!}
                    <div id="error-tidakan_pencegahan" class="invalid-feedback">{{ $errors->first('tidakan_pencegahan') }}</div>
                </div>
                <div class="form-group">
                    <label for="reviews">Review</label>
                        {!! Form::textarea('reviews',  null, ['class' => 'form-control', 'id' => 'reviews', 'rows' => 10]) !!}
                    <div id="error-reviews" class="invalid-feedback">{{ $errors->first('reviews') }}</div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-success">

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="action" value="Approve" class="btn btn-success float-right mr-2" style="width: 120px;">
        <input type="submit" name="action" value="Change" class="btn btn-info float-right mr-2" style="width: 120px;">
        <input type="submit" name="action" value="Reject" class="btn btn-danger float-right mr-2" style="width: 120px;">
    </div>
</div>
{!! Form::close() !!}
