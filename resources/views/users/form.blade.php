{!! Form::model($model, [
    'route' => $model->exists ? ['users.update', $model->id] : 'users.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}
@csrf
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
    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
    <div class="col-sm-10">
        <ul class="list-group">
        @foreach ($roles as $roleId => $roleName)
            <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                    {{-- {!! Form::checkbox('roles[]', false, ['class' => 'custom-control-input', 'id' => $roleId]) !!}
                    {!! Form::label($roleId, $roleName, ['class'=>'custom-control-label font-weight-normal']) !!} --}}
                    <input name="roles[]" type="checkbox" class="custom-control-input" id="{{ $roleId }}"
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
