{!! Form::model($model, [
    'route' => $model->exists ? ['users.update', $model->id] : 'users.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'files' => true
]) !!}

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        <div id="error-name" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
        <div id="error-email" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
        <div id="error-image" class="invalid-feedback"></div>
    </div>
</div>

@if (!$model->exists)
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
            <div id="error-password" class="invalid-feedback"></div>
        </div>
    </div>
@endif
<div class="form-group row">
    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
    <div class="col-sm-10">
        <ul class="list-group">
        @foreach ($roles as $roleId => $roleName)
            <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                    <input name="roles[]" type="checkbox" class="custom-control-input" id="{{ $roleId }}"  value="{{ $roleName }}"
                        @if ($model->exists)
                            @if ($model->hasRole($roleName))
                                checked
                            @endif
                        @endif
                    >
                    <label class="custom-control-label font-weight-normal" for="{{$roleId}}">{{$roleName}}</label>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</div>

{!! Form::close() !!}
