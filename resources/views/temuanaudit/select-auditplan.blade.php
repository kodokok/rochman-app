<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Select Approved Audit Plan</h3>
        <div class="card-tools">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @error('audit_plan_id')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        @enderror
        <div class="form-group">
            <label for="select_departement">Departement</label>
            {!! Form::select('select_departement', $departement, old('select_departement'), ['class' => 'form-control', 'id' => 'select_departement', 'placeholder' => 'Please select departement']) !!}
        </div>

        <div class="form-group">
            <label for="select_objektif">Objektif Audit</label>
            <select name="select_objektif" class="form-control" id="select_objektif">
                <option></option>
            </select>
        </div>
    </div>
</div>
