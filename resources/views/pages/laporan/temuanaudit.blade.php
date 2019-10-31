@extends('layouts.app')

@section('page-title', 'Laporan Temuan Audit')
@section('breadcrumbs', Breadcrumbs::render('laporan.temuanaudit'))

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Filter Option</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        <input id="start_date" name="start_date" type="text"
                            class="form-control datetimepicker-input"
                            data-target="#datetimepicker4"
                            placeholder="mm-dd-yyyy"
                            value=""
                        />
                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <div id="error-start_date" class="invalid-feedback"></div>
                    </div>
                </div
            </div>
        </div>
    </div>
</div>
@endsection
