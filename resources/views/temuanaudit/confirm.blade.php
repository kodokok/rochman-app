@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Confirm Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('temuanaudit.index') }}">Temuan Audit</a></li>
                    <li class="breadcrumb-item active">Confirm</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            @include('auditplan.details')
            @include('auditplan.detail-team')
        </div>
        <div class="col-md-4">
            @include('temuanaudit.details')
        </div>
        <div class="col-md-4">
            {!! Form::open([
                'route' => ['temuanaudit.update', $temuanaudit->id],
                'method' => 'PUT',
                'autocomplete' => 'off'
            ]) !!}
            <div class="card card-primary">
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
                                <input type="checkbox" class="custom-control-input" id="approve_kadept" name="approve_kadept">
                                <label class="custom-control-label" for="approve_kadept">Kadept</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="approve_auditee" name="approve_auditee">
                                <label class="custom-control-label" for="approve_auditee">Auditee</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="approve_auditor" name="approve_auditor">
                                <label class="custom-control-label" for="approve_auditor">Auditor</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="approve_auditor_leader" name="approve_auditor_leader">
                                <label class="custom-control-label" for="approve_auditor_leader">Auditor Leader</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Review</h3>
                    <div class="card-tools">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::textarea('review', old('review'), ['class' => 'form-control' . ($errors->has('review')? ' is-invalid': ''), 'id' => 'review', 'rows' => 4]) !!}
                        <div id="error-review" class="invalid-feedback">{{ $errors->first('review') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('auditplan.index') }}" class="btn btn-secondary" style="width: 120px;">Cancel</a>
            <input type="submit" value="Confirm" class="btn btn-success float-right mr-2" style="width: 120px;">
        </div>
    </div>
    {!! Form::close() !!}

</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>

</script>
@endpush
