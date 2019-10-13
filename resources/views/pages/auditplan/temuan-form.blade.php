{!! Form::model($auditplan, [
    'route' => 'temuanaudit.store',
    'method' => 'POST',
]) !!}
<div class="form-group row">
    <label for="audit_plan_id" class="col-sm-4 col-form-label">Audit Plan ID</label>
    <div class="col-sm-8">
        {!! Form::text('auditplan_id', $auditplan->id, ['class' => 'form-control', 'disabled']) !!}
        {!! Form::hidden('audit_plan_id', $auditplan->id) !!}
    </div>
</div>
<div class="form-group row">
    <label for="klausul_id" class="col-sm-4 col-form-label">Klausul</label>
    <div class="col-sm-8">
        {!! Form::select('klausul_id', $klausuls, null, ['class' => 'form-control', 'id' => 'klausul_id', 'placeholder' => 'Pilih klausul']) !!}
        <div id="error-klausul_id" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="ketidaksesuaian" class="col-sm-4 col-form-label">Ketidaksesuaian</label>
    <div class="col-sm-8">
        {!! Form::textarea('ketidaksesuaian', null, ['class' => 'form-control', 'id' => 'ketidaksesuaian', 'rows' => 3]) !!}
        <div id="error-ketidaksesuaian" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="akar_masalah" class="col-sm-4 col-form-label">Akar Masalah</label>
    <div class="col-sm-8">
        {!! Form::textarea('akar_masalah', null, ['class' => 'form-control', 'id' => 'akar_masalah', 'rows' => 3]) !!}
        <div id="error-akar_masalah" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="akar_masalah" class="col-sm-4 col-form-label">Klasifikasi</label>
    <div class="col-sm-8 mt-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="klasifikasi_temuan1" name="klasifikasi_temuan" class="custom-control-input" value="0">
            <label class="custom-control-label font-weight-normal" for="klasifikasi_temuan1">Minor</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="klasifikasi_temuan2" name="klasifikasi_temuan" class="custom-control-input" value="1">
            <label class="custom-control-label font-weight-normal" for="klasifikasi_temuan2">Major</label>
        </div>
    </div>
</div>

{!! Form::close() !!}
