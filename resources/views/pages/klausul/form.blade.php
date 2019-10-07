@if (isset($klausul))
    {!! Form::model($klausul, [
        'route' => ['klausul.update', $klausul->id],
        'method' => 'PUT',
        'autocomplete' => 'off',
    ]) !!}
@else
    {!! Form::open([
        'route' => 'klausul.store',
        'autocomplete' => 'off',
    ]) !!}
@endif
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
