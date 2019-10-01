<!-- Main content -->
<div class="row">

    <div class="col-md-6">
    {!! Form::model($model, [
        'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
                    <div id="error-nama" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                    <div id="error-email" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
                    <div id="error-alamat" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                    <div id="error-phone" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    {!! Form::file('foto', ['class' => 'form-control', 'id' => 'foto']) !!}
                    <div id="error-foto" class="invalid-feedback"></div>
                </div>
                @if(!$model->exists)
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                    <div id="error-password" class="invalid-feedback"></div>
                </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Roles</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <ul class="list-group">
                        @foreach ($roles as $roleId => $roleName)
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input name="roles[]" type="checkbox" class="custom-control-input" id="{{ $roleId }}"
                                    value="{{ $roleName }}"
                                    @if ($model->exists)
                                        @if ($model->hasRole($roleName))
                                            checked
                                        @endif
                                    @endif
                                >
                                <label class="custom-control-label font-weight-normal"
                                    for="{{$roleId}}">{{$roleName}}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
        <input type="submit" value="{{ $model->exists ? 'Update' : 'Simpan'}}" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
