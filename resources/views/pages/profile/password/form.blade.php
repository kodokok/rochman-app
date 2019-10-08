{!! Form::model($user, [
    'route' => ['password.change', $user->id],
    'method' => 'PUT'
]) !!}

<div class="form-group row">
    <label for="old_password" class="col-sm-4 col-form-label">Current Password</label>
    <div class="col-sm-8">
        {!! Form::password('old_password', ['class' => 'form-control'. ($errors->has('old_password') ? ' is-invalid': ''), 'id' => 'old_password']) !!}
        <div id="error-confirm_password" class="invalid-feedback">{{ $errors->first('old_password') }}</div>
    </div>
</div>
<div class="form-group row">
    <label for="new_password" class="col-sm-4 col-form-label">New Password</label>
    <div class="col-sm-8">
        {!! Form::password('new_password', ['class' => 'form-control'. ($errors->has('new_password') ? ' is-invalid': ''), 'id' => 'new_password']) !!}
        <div id="error-confirm_password" class="invalid-feedback">{{ $errors->first('new_password') }}</div>
    </div>
</div>
<div class="form-group row">
    <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
    <div class="col-sm-8">
        {!! Form::password('confirm_password', ['class' => 'form-control'. ($errors->has('confirm_password') ? ' is-invalid': ''), 'id' => 'confirm_password']) !!}
        <div id="error-confirm_password" class="invalid-feedback">{{ $errors->first('confirm_password') }}</div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10 float-right">
        <button type="submit" class="btn btn-danger btn-update float-right">Update</button>
    </div>
</div>
{!! Form::close() !!}
