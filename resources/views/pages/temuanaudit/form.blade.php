{!! Form::model($model, [
    'route' => 'kompetensi.store',
    'method' => 'POST',
]) !!}

<div class="form-group row">
    <label for="user_id" class="col-sm-4 col-form-label">Klausul</label>
    <div class="col-sm-8">
        {!! Form::select('user_id', $auditor, null, ['class' => 'form-control', 'id' => 'user_id',
        'placeholder' => 'Please Select']) !!}
        <div id="error-user_id" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="ketidaksesuaian" class="col-sm-4 col-form-label">Ketidaksesuaian</label>
    <div class="col-sm-8">
        {!! Form::textarea('ketidaksesuaian', null, ['class' => 'form-control', 'id' => 'pelatihan', 'rows' => 3]) !!}
        <div id="error-ketidaksesuaian" class="invalid-feedback"></div>
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
