<div class="card card-default">
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
            <label for="ketidaksesuaian">Ketidaksesuaian</label>
            {!! Form::text('ketidaksesuaian', $temuanaudit->ketidaksesuaian, ['class' => 'form-control', 'id' => 'ketidaksesuaian', 'disabled']) !!}
        </div>
        <div class="form-group">
            <label for="akar_masalah">Akar Masalah</label>
            {!! Form::text('akar_masalah', $temuanaudit->akar_masalah, ['class' => 'form-control', 'id' => 'akar_masalah', 'disabled']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
                    {!! Form::text('tindakan_perbaikan', $temuanaudit->tindakan_perbaikan, ['class' => 'form-control', 'id' => 'tindakan_perbaikan', 'disabled']) !!}
                </div>
                <div class="col-sm-4">
                    <label for="duedate_pencegahan">Due Date</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        {!! Form::text('duedate_perbaikan', $temuanaudit->duedate_perbaikan, ['class' => 'form-control', 'id' => 'duedate_perbaikan', 'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="tindakan_pencegahan">Tindakan Pencegahan</label>
                    {!! Form::text('tindakan_pencegahan', $temuanaudit->tindakan_pencegahan, ['class' => 'form-control', 'id' => 'tindakan_pencegahan', 'disabled']) !!}
                </div>
                <div class="col-sm-4">
                    <label for="duedate_pencegahan">Due Date</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        {!! Form::text('duedate_pencegahan', $temuanaudit->duedate_pencegahan, ['class' => 'form-control', 'id' => 'duedate_pencegahan', 'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
