@extends('layouts.app')

@section('page-title', 'Laporan Temuan Audit')
@section('breadcrumbs', Breadcrumbs::render('laporan.temuanaudit'))

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Report Option</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => 'laporan.temuanaudit-preview', 'method' => 'POST']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="start_date">Dari Tanggal</label>
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input id="dari_tanggal" name="dari_tanggal" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker1"
                                    placeholder="mm-dd-yyyy"
                                />
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                </div>
                                <div id="error-dari_tanggal" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="start_date">Sampai Tanggal</label>
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <input id="sampai_tanggal" name="sampai_tanggal" type="text"
                                    class="form-control datetimepicker-input"
                                    data-target="#datetimepicker1"
                                    placeholder="mm-dd-yyyy"
                                />
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                </div>
                                <div id="error-dari_tanggal" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input id="print" type="submit" value="Preview" class="btn btn-success float-right"  style="width: 120px;">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#datetimepicker1').datetimepicker({ format: 'MM-DD-YYYY'});
    $('#datetimepicker2').datetimepicker({ format: 'MM-DD-YYYY'});
});
</script>
@endpush
