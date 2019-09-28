{!! Form::hidden('audit_plan_id', old('audit_plan_id'), ['id' => 'audit_plan_id']) !!}
<div class="card {{ $disabled ? 'card-default' : 'card-primary' }}">
    <div class="card-header">
        <h3 class="card-title">Temuan Audit</h3>
        <div class="card-tools">
            <div class="card-tools">
                @if ($temuanaudit->exists)
                    <span class="badge badge-info text-uppercase">{{ $temuanaudit->status }}</span>
                @endif
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="klausul">Ketidaksesuaian</label>
            {!! Form::text('ketidaksesuaian', $temuanaudit->ketidaksesuaian, ['class' => 'form-control', 'id' => 'ketidaksesuaian', ($disabled ? 'disabled' : '')]) !!}
            <div id="error-ketidaksesuaian" class="invalid-feedback">{{ $errors->first('ketidaksesuaian') }}</div>
        </div>
        <div class="form-group">
            <label for="akar_masalah">Akar Masalah</label>
            {!! Form::text('akar_masalah', null, ['class' => 'form-control'. ($errors->has('akar_masalah')? ' is-invalid': ''), 'id' => 'akar_masalah', ($disabled ? 'disabled' : '')]) !!}
            <div id="error-akar_masalah" class="invalid-feedback">{{ $errors->first('akar_masalah') }}</div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
                    {!! Form::text('tindakan_perbaikan', null, ['class' => 'form-control'. ($errors->has('tindakan_perbaikan') ? ' is-invalid': ''), 'id' => 'tindakan_perbaikan', ($disabled ? 'disabled' : '')]) !!}
                    <div id="error-tindakan_perbaikan" class="invalid-feedback">{{ $errors->first('tindakan_perbaikan') }}</div>
                </div>
                <div class="col-sm-4">
                    <label for="duedate_perbaikan">Due Date</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input id="duedate_perbaikan" name="duedate_perbaikan" type="text"
                            class="form-control datetimepicker-input {{ $errors->has('duedate_perbaikan') ? ' is-invalid': '' }}"
                            data-target="#datetimepicker1"
                            value="{{ $temuanaudit->exists ? $temuanaudit->duedate_perbaikan : old('duedate_perbaikan') }}"
                            {{ $disabled ? 'disabled' : '' }}
                        />
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <div id="error-duedate_perbaikan" class="invalid-feedback">{{ $errors->first('duedate_perbaikan') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="tindakan_pencegahan">Tindakan Pencegahan</label>
                    {!! Form::text('tindakan_pencegahan', null, ['class' => 'form-control'. ($errors->has('tindakan_pencegahan')? ' is-invalid': ''), 'id' => 'tindakan_pencegahan', ($disabled ? 'disabled' : '')]) !!}
                    <div id="error-tindakan_pencegahan" class="invalid-feedback">{{ $errors->first('tindakan_pencegahan') }}</div>
                </div>
                <div class="col-sm-4">
                    <label for="duedate_pencegahan">Due Date</label>
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                        <input id="duedate_pencegahan" name="duedate_pencegahan" type="text"
                            class="form-control datetimepicker-input {{ $errors->has('duedate_pencegahan') ? ' is-invalid': '' }}"
                            data-target="#datetimepicker2"
                            value="{{ $temuanaudit->exists ? $temuanaudit->duedate_pencegahan : old('duedate_pencegahan') }}"
                            {{ $disabled ? 'disabled' : '' }}
                        />
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <div id="error-duedate_pencegahan" class="invalid-feedback">{{ $errors->first('duedate_pencegahan') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

