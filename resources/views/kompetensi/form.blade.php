{!! Form::model($model, [
    'route' => $model->exists ? ['kompetensi.update', $model->id] : 'kompetensi.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'files' => true
]) !!}

<div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label">Auditor</label>
    <div class="col-sm-10">
        {!! Form::select('user_id', $auditor, null, ['class' => 'form-control', 'id' => 'user_id', 'placeholder' => 'Please Select']) !!}
        <div id="error-auditor" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
    <div class="col-sm-10">
        {!! Form::text('pendidikan', null, ['class' => 'form-control', 'id' => 'pendidikan']) !!}
        <div id="error-pendidikan" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="masa_kerja" class="col-sm-2 col-form-label">Masa Kerja</label>
    <div class="col-sm-10">
        {!! Form::text('masa_kerja', null, ['class' => 'form-control', 'id' => 'masa_kerja']) !!}
        <div id="error-masa_kerja" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="pelatihan" class="col-sm-2 col-form-label">Pelatihan</label>
    <div class="col-sm-10">
        {!! Form::text('masa_kerja', null, ['class' => 'form-control', 'id' => 'masa_kerja']) !!}
        <div id="error-masa_kerja" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="tanggal_pelatihan" class="col-sm-2 col-form-label">Tanggal Pelatihan</label>
    <div class="col-sm-10">
        {!! Form::text('tanggal_pelatihan', null, ['class' => 'form-control', 'id' => 'tanggal_pelatihan']) !!}
        <div id="error-tanggal_pelatihan" class="invalid-feedback"></div>
    </div>
</div>


{!! Form::close() !!}
