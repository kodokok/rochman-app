<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ubah Jadwal Audit</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tanggal_baru">Tanggal Baru</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input id="tanggal_baru" name="tanggal_baru" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4"
                                    placeholder="mm-dd-yyyy"
                                    value="{{ $model->ubahJadwalAudit->tanggal }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <div id="error-tanggal_baru" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="waktu_baru">Waktu Baru</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input id="waktu_baru" name="waktu_baru" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker3"
                                    placeholder="HH:mm:ss"
                                    value="{{ $model->ubahJadwalAudit->waktu }}"
                                />
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                </div>
                                <div id="error-waktu_baru" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Catatan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $model->ubahJadwalAudit->catatan }}</textarea>
                </div>
                <div class="form-group">
                    <div class="icheck-warning">
                        <input type="checkbox" id="ubah_jadwal_check" name="ubah_jadwal_check"
                            {{ old('ubah_jadwal_check') ? 'checked' : '' }}>
                        <label for="ubah_jadwal_check" class="font-weight-normal">
                            Ya, Saya ingin mengubah jadwal audit.
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
