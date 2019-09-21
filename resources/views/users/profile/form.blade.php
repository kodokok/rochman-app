{!! Form::model($user, [
    'route' => ['profile.update', $user->id],
    'method' => 'PUT',
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
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10 float-right">
        <button type="submit" class="btn btn-danger float-right">Update</button>
    </div>
</div>
{!! Form::close() !!}
