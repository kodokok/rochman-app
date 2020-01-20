@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan.show'))
@section('page-title', 'Show Audit Plan')
@section('page-action')
    <a id="cancel" href="{{ old('redirect_to', url()->previous()) }}" class="btn btn-secondary float-right"
        style="margin-right: 5px; width: 120px;">Cancel</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="departemen">Departemen</label>
                        {{ Form::text('departemen', ($model->departemen->kode . ' - ' . $model->departemen->nama), ['class' => 'form-control', 'disabled']) }}
                    </div>
                    <div class="col-sm-6">
                        <label for="kadept">Kadept</label>
                        {!! Form::text('kadept', $model->departemen->kadept->nama, ['class' => 'form-control', 'disabled']) !!}
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            {!! Form::text('tanngal', $model->tanggal, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            {!! Form::text('waktu', $model->waktu, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="auditee">Auditee</label>
                    {!! Form::text('auditee', $model->auditee->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor">Auditor</label>
                    {!! Form::text('auditor', $model->auditor->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group">
                    <label for="auditor_leadd">Auditor Lead</label>
                    {!! Form::text('auditor_lead', $model->auditorLead->nama, ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Klausul</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                        <table id="table-klausul" name="table_klausul" class="table table-sm w100">
                            <thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:25%;">Objektif Audit</th>
                                    <th style="width:50%;">Klausul</th>
                                    <th class="text-center" style="width:10%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->klausuls as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->objektif_audit }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="error-klausul" class="small form-text text-danger d-none"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>


</script>
@endpush
