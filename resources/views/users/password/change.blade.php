{!! Form::open([
    'route' => 'password.change',
    'method' => 'POST'
]) !!}
{{Form::hidden('_method','PUT')}}

<div class="form-group row">
    <label for="old_password" class="col-sm-4 col-form-label">Current Password</label>
    <div class="col-sm-8">
        {!! Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password']) !!}
        <div id="error-old-password" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="new_password" class="col-sm-4 col-form-label">New Password</label>
    <div class="col-sm-8">
        {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password']) !!}
        <div id="error-new-password" class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group row">
    <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
    <div class="col-sm-8">
        {!! Form::password('confirm_password', ['class' => 'form-control', 'id' => 'confirm_password']) !!}
        <div id="error-confirm-password" class="invalid-feedback"></div>
    </div>
</div>

{!! Form::close() !!}
