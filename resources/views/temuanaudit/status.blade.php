<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Change Status</h3>
        <div class="card-tools">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body text-center">
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'open' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="0" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline1">Open</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'closed' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="1" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline2">Closed</label>
        </div>
    </div>
    <!-- /.card-body -->
</div>
