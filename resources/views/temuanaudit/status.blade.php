<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Status</h3>
        <div class="card-tools">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                        {{ old('status') ? 'checked' : '' }}
                        {{ $temuanaudit->status === 'Closed' ? 'checked' : '' }}
                    >
                    <label class="custom-control-label" for="approve_kadept">Closed</label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
