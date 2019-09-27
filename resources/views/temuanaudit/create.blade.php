@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('temuanaudit.index') }}">Temuan Audit</a></li>
                    <li class="breadcrumb-item active">{{ $model->exists ? 'Edit' : 'Create'}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Select Audit Plan</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <select name="auditplans" class="form-control select2">
                        <option value=""></option>
                        @foreach ($auditplans as $ap)
                            <option value="{{ $ap->id }}">
                                {{ $ap->departement->name . ' - ' . $ap->objektif_audit . ' - ' . $ap->klausul }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Team Audit</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="objektif_audit">Objektif Audit</label>
                        {!! Form::textarea('objektif_audit',  null, ['class' => 'form-control', 'id' => 'objektif_audit', 'rows' => 3, 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        <label for="klausul">Klausul</label>
                        {!! Form::text('klausul', null, ['class' => 'form-control', 'id' => 'klausul', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="departement_id">Departement</label>
                                {!! Form::text('departement_id', null, ['class' => 'form-control', 'id' => 'departement_id', 'disabled']) !!}
                            </div>
                            <div class="col-sm-6">
                                <label for="departement_id">Kadept</label>
                                {!! Form::text('kadept', null, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="tanggal">Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => 'tanggal', 'disabled']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="waktu">Waktu</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    {!! Form::text('waktu', null, ['class' => 'form-control', 'id' => 'waktu', 'disabled']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="approval">Approval Status</label>
                                {!! Form::text('approval', null, ['class' => 'form-control', 'id' => 'approval', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="auditee_id">Auditee</label>
                                {!! Form::text('auditee_id', null, ['class' => 'form-control', 'id' => 'auditee_id', 'disabled']) !!}
                            </div>
                            <div class="col-sm-4">
                                <label for="auditor_id">Auditor</label>
                                {!! Form::text('auditor_id', null, ['class' => 'form-control', 'id' => 'auditor_id', 'disabled']) !!}
                            </div>
                            <div class="col-sm-4">
                                <label for="auditor_leader_id">Auditor Leader</label>
                                {!! Form::text('auditor_leader_id', null, ['class' => 'form-control', 'id' => 'auditor_leader_id', 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            {!! Form::model($model, [
                'route' => $model->exists ? ['temuanaudit.update', $model->id] : 'temuanaudit.store',
                'method' => $model->exists ? 'PUT' : 'POST',
                'autocomplete' => 'off'
            ]) !!}

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Temuan Audit</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="klausul">Ketidaksesuaian</label>
                        {!! Form::text('ketidaksesuaian', null, ['class' => 'form-control'. ($errors->has('ketidaksesuaian')? ' is-invalid': ''), 'id' => 'ketidaksesuaian']) !!}
                        <div id="error-ketidaksesuaian" class="invalid-feedback">{{ $errors->first('ketidaksesuaian') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="akar_masalah">Akar Masalah</label>
                        {!! Form::text('akar_masalah', null, ['class' => 'form-control'. ($errors->has('akar_masalah')? ' is-invalid': ''), 'id' => 'akar_masalah']) !!}
                        <div id="error-akar_masalah" class="invalid-feedback">{{ $errors->first('akar_masalah') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="tindakan_perbaikan">Tindakan Perbaikan</label>
                        {!! Form::text('tindakan_perbaikan', null, ['class' => 'form-control'. ($errors->has('tindakan_perbaikan')? ' is-invalid': ''), 'id' => 'tindakan_perbaikan']) !!}
                        <div id="error-tindakan_perbaikan" class="invalid-feedback">{{ $errors->first('tindakan_perbaikan') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="tidakan_pencegahan">Tindakan Pencegahan</label>
                        {!! Form::text('tidakan_pencegahan', null, ['class' => 'form-control'. ($errors->has('tidakan_pencegahan')? ' is-invalid': ''), 'id' => 'tidakan_pencegahan']) !!}
                        <div id="error-tidakan_pencegahan" class="invalid-feedback">{{ $errors->first('tidakan_pencegahan') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="reviews">Review</label>
                            {!! Form::textarea('reviews',  null, ['class' => 'form-control', 'id' => 'reviews', 'rows' => 3]) !!}
                        <div id="error-reviews" class="invalid-feedback">{{ $errors->first('reviews') }}</div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Approval</h3>
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
                                    <input type="checkbox" class="custom-control-input" id="approve_kadept">
                                    <label class="custom-control-label" for="approve_kadept">Kadept</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="approve_auditee">
                                    <label class="custom-control-label" for="approve_auditee">Auditee</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="approve_auditor">
                                    <label class="custom-control-label" for="approve_auditor">Auditor</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="approve_auditor_leader">
                                    <label class="custom-control-label" for="approve_auditor_leader">Auditor Leader</label>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" class="btn btn-success float-right mr-2" style="width: 120px;">
        </div>
    </div>
    {!! Form::close() !!}

</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('.select2').select2({
        width:'100%',
        placeholder: 'Please select objektif audit',
    });
});
</script>
@endpush
