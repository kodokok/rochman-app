{!! Form::model($klausul, [
    'route' => $klausul->exists ? ['klausul.update', $klausul->id] : 'klausul.store',
    'method' => $klausul->exists ? 'PUT' : 'POST',
    'files' => true,
    'autocomplete' => 'off'
]) !!}
<div class="modal-header">
        <h5 class="modal-title">{{isset($customer)?'Edit':'New'}} Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
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
    </div>
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
        {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
    </div>
{!! Form::close() !!}
