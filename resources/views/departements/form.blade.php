{!! Form::model($model, [
    'route' => $model->exists ? ['departements.update', $model->id] : 'departements.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'files' => true
]) !!}

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        <div id="error-name" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-10">
        {!! Form::text('lokasi', null, ['class' => 'form-control', 'id' => 'lokasi']) !!}
        <div id="error-lokasi" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label">Kadept</label>
    <div class="col-sm-10">
        {!! Form::select('user_id', $kadept, null, ['class' => 'form-control', 'id' => 'user_id', 'placeholder' => 'Please Select']) !!}
        <div id="error-kadept" class="invalid-feedback"></div>
    </div>
</div>


{!! Form::close() !!}
