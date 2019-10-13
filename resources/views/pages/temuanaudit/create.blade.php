@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('temuanaudit.create'))
@section('page-title', 'Create Temuan Audit')
@section('page-action')
    <input id="save" type="submit" value="Create" class="btn btn-success float-right"
        style="width: 120px;">
    <a id="cancel" href="{{ old('redirect_to', url()->previous()) }}" class="btn btn-secondary float-right"
        style="margin-right: 5px; width: 120px;">Cancel</a>
@endsection

@section('content')
{!! Form::open() !!}
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="departemen_id">Departemen</label>
                    {!! Form::select('departemen_id', $departemens_select, null, ['class' => 'form-control']) !!}
                    <div id="error-departemen_id" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="audit_plan_id">Audit Plan ID</label>
                    {!! Form::select('audit_plan_id', $auditplans_select, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="audit_plan_id">Klausul ID</label>
                    {!! Form::select('audit_plan_id', $auditplans_select, null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('ketidaksesuaian') !!}
                    {!! Form::textarea('ketidaksesuaian', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <div id="error-ketidaksesuaian" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    {!! Form::label('akar_masalah') !!}
                    {!! Form::textarea('akar_masalah', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <div id="error-akar_masalah" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    {!! Form::label('klasifikasi', null, ['class' => 'mr-3']) !!}
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                        <label class="form-check-label" for="inlineRadio1">Minor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Mayor</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{!! Form::close() !!}
@endsection
