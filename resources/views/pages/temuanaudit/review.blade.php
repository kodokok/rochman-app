<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Review</h3>
        <div class="card-tools">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::textarea('review', old('review'), ['class' => 'form-control' . ($errors->has('review')? ' is-invalid': ''), 'id' => 'review', 'rows' => 4]) !!}
            <div id="error-review" class="invalid-feedback">{{ $errors->first('review') }}</div>
        </div>
    </div>
</div>
