@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('user.create'))
@section('page-title', 'Creat New User')

@section('page-action')
    <input id="save" type="submit" value="Save" class="btn btn-success float-right" style="margin-right: 5px; width: 120px;">
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
    {!! Form::model($model, [
        'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'files' => true,
        'autocomplete' => 'off',
        'id' => 'current-from'
    ]) !!}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    {!! Form::text('nama', null, ['class' => 'form-control'. ($errors->has('nama') ? ' is-invalid': ''), 'id' => 'nama']) !!}
                    <div id="error-nama" class="invalid-feedback">{{ $errors->first('nama') }}</div>
                </div>
                <div class="form-group">
                    <label for="new-email">Email</label>
                    {!! Form::email('email', null, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid': ''), 'id' => 'email', 'autocomplete'=>"new-password"]) !!}
                    <div id="error-new-email" class="invalid-feedback">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid': ''), 'id' => 'password', 'autocomplete'=>"new-password"]) !!}
                    <div id="error-password" class="invalid-feedback">{{ $errors->first('password') }}</div>
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    {!! Form::select('roles[]',$roles ,null, ['class' => 'form-control' . ($errors->has('roles') ? ' is-invalid': ''), 'id' => 'roles', 'multiple', 'style' => "width: 100%"]) !!}
                    <div id="error-roles" class="invalid-feedback">{{ $errors->first('roles') }}</div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Details</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'rows' => 3]) !!}
                    <div id="error-alamat" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                    <div id="error-phone" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    {!! Form::text('pendidikan', null, ['class' => 'form-control', 'id' => 'pendidikan']) !!}
                    <div id="error-pendidikan" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <div class="form-group">
                        <div class="input-group date" id="tanggal_masuk" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal_masuk" data-target="#tanggal_masuk"/>
                            <div class="input-group-append" data-target="#tanggal_masuk" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Foto</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
        <div class="card-body">
            <div class="col-sm-12 text-center mb-3">
                <img id="display-foto" src="{{ asset('img/avatar.png') }}" class="img-fluid img-fluid" alt="foto" width="307" height="240">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="foto">Pilih foto</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{!! Form::close() !!}
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    
    $('#roles').select2({placeholder: 'Pilih role', width: 'resolve'});
    $('#pendidikan').select2({placeholder: 'Pilih pendidikan', width: 'resolve'});

    $('#tanggal_masuk').datetimepicker({
        format: 'MM-DD-YYYY',
    });

    bsCustomFileInput.init()

    $("#save").on('click', function(e){
        // e.preventDefault();
        $("#current-from").submit(); // Submit the form
    });

    $("#foto").change(function(){
        readURL(this);
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#display-foto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endpush
