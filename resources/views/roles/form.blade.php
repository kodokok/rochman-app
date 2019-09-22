{!! Form::open($guards, [
    'route' => 'roles.create',
    'method' => 'POST',
]) !!}

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        <div id="error-name" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="guard_name" class="col-sm-2 col-form-label">Guard</label>
    <div class="col-sm-10">
        {!! Form::select('guard_name', $guards, null, ['class' => 'form-control', 'id' => 'guard_name']) !!}
        <div id="error-guard_name" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
