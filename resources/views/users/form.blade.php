{!! Form::model($model, [
    'route' => 'users.store',
    'method' => 'POST',
]) !!}

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name'], $attributes = ['required']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>

{!! Form::close() !!}
