{!! Form::model($model, [
    'route' => 'users.store',
    'method' => 'POST',
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
        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'id' => 'roles', 'multiple']) !!}
        <div id="error-roles" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
