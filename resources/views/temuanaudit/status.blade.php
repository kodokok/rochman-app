<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Change Status</h3>
    </div>
    <div class="card-body text-center">
        {{-- ['tindakan', 'perbaikan', 'pencegahan', 'selesai'] --}}
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'tindakan' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="0" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline1">Tindakan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'perbaikan' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="1" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline2">Perbaikan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'pencegahan' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline3" name="status" class="custom-control-input" value="2" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline3">Pencegahan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline {{ $temuanaudit->status === 'selesai' ? 'd-none': '' }}">
            <input type="radio" id="customRadioInline4" name="status" class="custom-control-input" value="3" {{ old('action') ? 'checked': '' }}>
            <label class="custom-control-label" for="customRadioInline4">Selesai</label>
        </div>
    </div>
    <!-- /.card-body -->
</div>
