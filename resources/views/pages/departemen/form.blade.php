{!! Form::model($departemen, [
    'route' => $departemen->exists ? ['departemen.update', $departemen->id] : 'departemen.store',
    'method' => $departemen->exists ? 'PUT' : 'POST',
    'autocomplete' => 'off'
]) !!}

<div class="form-group row">
    <label for="kode" class="col-sm-4 col-form-label">Kode</label>
    <div class="col-sm-8">
        {!! Form::text('kode', null, ['class' => 'form-control', 'id' => 'kode']) !!}
        <div id="error-kode" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
    <div class="col-sm-8">
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
        <div id="error-nama" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
    <div class="col-sm-8">
        {!! Form::text('lokasi', null, ['class' => 'form-control', 'id' => 'lokasi']) !!}
        <div id="error-lokasi" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="kadept_user_id" class="col-sm-4 col-form-label">Kadept</label>
    <div class="col-sm-8">
        {!! Form::select('kadept_user_id', $kadept, null, ['class' => 'form-control', 'id' => 'kadept_user_id', 'placeholder' => 'Please Select']) !!}
        <div id="error-kadept_user_id" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
