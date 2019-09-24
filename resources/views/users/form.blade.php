<!-- Main content -->
<div class="row">

    <div class="col-md-6">
    {!! Form::model($model, [
        'route' => $model->exists ? ['users.update', $model->id] : 'users.store',
        'method' => $model->exists ? 'PUT' : 'POST',
        'files' => true,
        'autocomplete' =
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
                    <label for="name">Name</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                    <div id="error-name" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                    <div id="error-email" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
                    <div id="error-address" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
                    <div id="error-image" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                    <div id="error-password" class="invalid-feedback"></div>
                </div>
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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
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
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
    </div>
</div>
{!! Form::close() !!}
