{!! Form::model($model, [
'route' => $model->exists ? ['kompetensi.update', $model->id] : 'kompetensi.store',
'method' => $model->exists ? 'PUT' : 'POST',
'autocomplete' => 'off',
]) !!}

<div class="form-group row">
    <label for="user_id" class="col-sm-4 col-form-label">Auditor</label>
    <div class="col-sm-8">
        {!! Form::select('user_id', $auditor, null, ['class' => 'form-control', 'id' => 'user_id',
        'placeholder' => 'Please Select']) !!}
        <div id="error-user_id" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="pelatihan" class="col-sm-4 col-form-label">Pelatihan</label>
    <div class="col-sm-8">
        {!! Form::text('pelatihan', null, ['class' => 'form-control', 'id' => 'pelatihan']) !!}
        <div id="error-pelatihan" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nilai" class="col-sm-4 col-form-label">Nilai</label>
    <div class="col-sm-8">
        {!! Form::text('nilai', null, ['class' => 'form-control', 'id' => 'nilai']) !!}
        <div id="error-nilai" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
