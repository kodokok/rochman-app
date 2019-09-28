<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Audit Plan</h3>
        <div class="card-tools">
            <div class="card-tools">
                    <span class="badge badge-info text-uppercase">{{ $auditplan->approval }}</span>
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="objektif_audit">Objektif Audit</label>
            {!! Form::textarea('objektif_audit',  $auditplan->objektif_audit, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3, 'disabled']) !!}
        </div>
        <div class="form-group">
            <label for="klausul">Klausul</label>
            {!! Form::text('klausul', $auditplan->klausul, ['class' => 'form-control', 'id' => 'klausul', 'disabled']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="departement_id">Departement</label>
                    {!! Form::text('departement_id', $auditplan->departement->name, ['class' => 'form-control', 'id' => 'departement_id', 'disabled']) !!}
                </div>
                <div class="col-sm-6">
                    <label for="departement_id">Kadept</label>
                    {!! Form::text('kadept', $auditplan->departement->user->name, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        {!! Form::text('tanggal', $auditplan->tanggal, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="waktu">Waktu</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                        </div>
                        {!! Form::text('waktu',  $auditplan->waktu, ['class' => 'form-control', 'id' => 'waktu', 'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

