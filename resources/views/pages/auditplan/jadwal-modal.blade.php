<!-- Modal -->
<div class="modal fade" id="ubah-jadwal-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ !empty($model->ubahJadwalAudit->exists) ? 'Update Jadwal' : 'Ubah Jadwal Audit'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @hasanyrole('admin|auditor_lead|auditor')
                    @if (!empty($model->ubahJadwalAudit->exists))
                        {!! Form::model($model, [
                            'route' => ['auditplan.update-jadwal', $model->id],
                            'method' => 'PUT',
                            'id' => 'ubah-jadwal-form',
                            'autocomplete' => 'off'])
                        !!}
                    @endif
                @else
                    {!! Form::model($model, [
                        'route' => ['auditplan.ubah-jadwal', $model->id],
                        'method' => 'PUT',
                        'id' => 'ubah-jadwal-form',
                        'autocomplete' => 'off'])
                    !!}
                @endhasanyrole

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tanggal_baru">Tanggal Baru</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input id="tanggal_baru" name="tanggal_baru" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4"
                                    placeholder="mm-dd-yyyy"
                                    value="{{ !empty($model->ubahJadwalAudit->exists) ? $model->ubahJadwalAudit->tanggal : '' }}"
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
                                    value="{{ !empty($model->ubahJadwalAudit->exists) ? $model->ubahJadwalAudit->waktu : ''}}"
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
                    {!! Form::label('catatan') !!}
                    {!! Form::textarea('catatan', !empty($model->ubahJadwalAudit->exists) ? $model->ubahJadwalAudit->catatan : '', ['class' => 'form-control', 'rows' => '3']) !!}
                    <div id="error-catatan" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @hasanyrole('admin|auditor_lead|auditor')
                    @if (!empty($model->ubahJadwalAudit->exists))
                        {!! Form::submit('Update', ['class'=>"btn btn-primary", 'id' => 'ubah-jadwal-btn']) !!}
                    @endif
                @else
                    {!! Form::submit('Simpan', ['class'=>"btn btn-primary", 'id' => 'ubah-jadwal-btn']) !!}
                @endhasanyrole
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
