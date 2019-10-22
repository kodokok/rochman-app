<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Jadwal Audit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model($model, ['id' => 'ubah-jadwal-modal', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tanggal_baru">Tanggal Baru</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input id="tanggal_baru" name="tanggal_baru" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4"
                                    placeholder="mm-dd-yyyy"
                                    value="{{ $model->ubahJadwalAudit ? $model->ubahJadwalAudit->tanggal : '' }}"
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
                                    value="{{ $model->ubahJadwalAudit ? $model->ubahJadwalAudit->waktu : ''}}"
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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $model->ubahJadwalAudit ? $model->ubahJadwalAudit->catatan : '' }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Save changes', ['class'=>"btn btn-primary"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
