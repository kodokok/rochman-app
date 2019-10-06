{!! Form::model($klausul, [
    'route' => $klausul->exists ? ['klausul.update', $klausul->id] : 'klausul.store',
    'method' => $klausul->exists ? 'PUT' : 'POST',
    'files' => true,
    'autocomplete' => 'off'
]) !!}

<div class="form-group row">
    <label for="kode" class="col-sm-4 col-form-label">Objektif Audit</label>
    <div class="col-sm-8">
        {!! Form::text('objektif_audit', null, ['class' => 'form-control', 'id' => 'objektif_audit']) !!}
        <div id="error-objektif_audit" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
    <div class="col-sm-8">
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
        <div id="error-nama" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
