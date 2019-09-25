<!-- Main content -->
<div class="row">

    <div class="col-md-6">
    {!! Form::model($model, [
        'route' => $model->exists ? ['auditplan.update', $model->id] : 'auditplan.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="objektif_audit">Objektif Audit</label>
                    {!! Form::textarea('objektif_audit', null, ['class' => 'form-control' . ($errors->has('objektif_audit')? ' is-invalid': ''), 'id' => 'objektif_audit', 'rows' => 3]) !!}
                    @error('objektif_audit')
                        <div id="error-objektif_audit" class="invalid-feedback">{{ $errors->first('objektif_audit') }}(</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="klausul">Klausul</label>
                    {!! Form::text('klausul', null, ['class' => 'form-control'. ($errors->has('klausul')? ' is-invalid': ''), 'id' => 'klausul']) !!}
                    @error('klausul')
                        <div id="error-klausul" class="invalid-feedback">{{ $errors->first('klausul') }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="departement_id">Departement</label>
                        {{-- {!! Form::select('departement_id', $departement, null, ['class' => 'form-control', 'id' => 'departement_id',
                        'placeholder' => 'Please Select' 'data-kadept'="{{$user->role->name}}"> ]) !!} --}}
                        <select class="form-control {{ $errors->has('klausul')? ' is-invalid': '' }}" name="departement_id" id="departement_id">
                            <option value="" {{ !$model->exists ? 'selected' : ''}} disabled>Please select</option>
                            @foreach($departement as $dept)
                                <option value="{{ $dept->id }}" data-kadept="{{ $dept->user->name }}"
                                    @if ($model->exist)
                                        @if ($model->departement->id === $dept->id)
                                            selected
                                        @endif
                                    @endif
                                >
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('departement_id')
                            <div id="error-departement_id" class="invalid-feedback">{{ $errors->first('departement_id') }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                            {{-- <div class="form-group"> --}}
                        <label for="kadept">Kadept</label>
                        @if ($model->exists)
                            {!! Form::text('kadept', ($model->exists ? $model->departement->user->name : null), ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                        @else
                            {!! Form::text('kadept', null, ['class' => 'form-control', 'id' => 'kadept', 'disabled']) !!}
                        @endif
                        {{-- <input class="form-control" type="text" name="kadept" id="kadept" disabled value="{{ $model->departement->user->name }}"> --}}
                    {{-- </div> --}}

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="tanggal">Tanggal</label>
                        @if ($model->exists)
                            {!! Form::text('tanggal', null, ['class' => 'form-control' . ($errors->has('tanggal')? ' is-invalid': ''), 'id' => 'tanggal']) !!}
                        @else
                            <input type="text" id="tanggal" class="form-control" name="tanggal">
                        @endif
                        @error('tanggal')
                            <div id="error-tanggal" class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="waktu">Waktu</label>
                        <div class="input-group date {{ $errors->has('d')? ' is-invalid': '' }}" id="waktu" data-target-input="nearest">
                            <input type="text" name="waktu" id="waktu" class="form-control datetimepicker-input" data-target="#waktu" value="{{ $model->exists ? $model->waktu : ''}}"/>
                                <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                </div>
                            </div>
                            @error('tanggal')
                                <div id="error-waktu" class="invalid-feedback">{{ $errors->first('waktu') }}</div>
                            @enderror
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Audit User</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="auditee_id">Auditee</label>
                    {!! Form::select('auditee_id', $auditee, null, ['class' => 'form-control'. ($errors->has('auditee_id')? ' is-invalid': '', 'id' => 'auditee_id',
                    'placeholder' => 'Please Select']) !!}
                    <div id="error-auditee_id" class="invalid-feedback">{{ $errors->first('auditee_id') }}</div>
                </div>
                <div class="form-group">
                    <label for="auditor_id">Auditor</label>
                    {{-- {!! Form::select('auditor_id', $auditor, null, ['class' => 'form-control'. ($errors->has('auditee_id')? ' is-invalid': ', 'id' => 'auditor_id',
                    'placeholder' => 'Please Select', $model->exists ? 'selected' : '']) !!} --}}
                    <select class="form-control" name="auditor_id" id="auditor_id">
                        <option value="" {{ !$model->exists ? 'selected' : ''}} disabled>Please select</option>
                        @foreach($auditor as $key => $value)
                            <option value="{{ $key}}"
                                @if ($model->exist)
                                    @if ($model->auditor->id === $key)
                                        selected
                                    @endif
                                @endif
                            >
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                    <div id="error-auditor_id" class="invalid-feedback">{{ $errors->first('auditor_id') }}</div>
                </div>
                <div class="form-group">
                    <label for="auditor_leader_id">Auditor Leader</label>
                    {!! Form::select('auditor_leader_id', $auditorLeader, null, ['class' => 'form-control', 'id' => 'auditor_leader_id',
                    'placeholder' => 'Please Select']) !!}
                    <div id="error-auditor_leader_id" class="invalid-feedback">{{ $errors->first('auditor_leader_id') }}</div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('auditplan.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="{{ $model->exists ? 'Update' : 'Create New'}}" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
