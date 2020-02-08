@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('user.profile'))
@section('page-title', 'User Profile')

@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img" src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('img/avatar.png') }}"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                <p class="text-muted text-center">{{ $user->email }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <div>Role :
                        @foreach ($user->roles as $role)
                            <span class="badge badge-primary mr-2">{{ $role->name }}</span>
                        @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
            {!! Form::model($user, [
                'route' => ['profile.update', $user->id],
                'method' => 'PUT',
                'autocomplete' => 'off',
            ]) !!}
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nama">Nama</label>
                        {!! Form::text('nama', ($user->exists ? $user->nama : old('nama')), ['class' => 'form-control', 'id' => 'nama']) !!}
                        <div id="error-nama" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        {!! Form::text('email', ($user->exists ? $user->email : old('email')), ['class' => 'form-control', 'id' => 'email', 'disabled']) !!}
                        <div id="error-email" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    {!! Form::textarea('alamat', ($user->exists ? $user->alamat : old('alamat')), ['class' => 'form-control', 'id' => 'alamat', 'rows' => 3]) !!}
                    <div id="error-alamat" class="invalid-feedback"></div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="phone">Phone</label>
                        {!! Form::text('phone', ($user->exists ? $user->phone : old('phone')), ['class' => 'form-control', 'id' => 'phone']) !!}
                        <div id="error-phone" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-4">
                        <label for="pendidikan">Pendidikan</label>
                        {!! Form::text('pendidikan', ($user->exists ? $user->pendidikan : old('pendidikan')), ['class' => 'form-control', 'id' => 'pendidikan']) !!}
                        <div id="error-pendidikan" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-4">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <div class="input-group date" id="tanggal_masuk" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal_masuk" data-target="#tanggal_masuk"
                                value="{{ $user->exists ? $user->tanggal_masuk : old('tanggal_masuk') }}"
                            />
                            <div class="input-group-append" data-target="#tanggal_masuk" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Password</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open([
                    'route' => ['profile.change-password', $user->id],
                    'method' => 'PUT',
                    'autocomplete' => 'off',
                ]) !!}
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    {!! Form::text('current_password', null, ['class' => 'form-control' . ($errors->has('current_password') ? ' is-invalid': ''), 'id' => 'current_password', 'oninput' => "turnOnPasswordStyle()"]) !!}
                    <div id="error-current_password" class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    {!! Form::text('new_password', null, ['class' => 'form-control' . ($errors->has('new_password') ? ' is-invalid': ''), 'id' => 'new_password', 'oninput' => "turnOnPasswordStyle()"]) !!}
                    <div id="error-new_password" class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    {!! Form::text('confirm_password', null, ['class' => 'form-control' . ($errors->has('confirm_password') ? ' is-invalid': ''), 'id' => 'confirm_password', 'oninput' => "turnOnPasswordStyle()"]) !!}
                    <div id="error-confirm_password" class="invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    {{ Form::submit('Change Password', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#current_password, #new_password, #confirm_password').bind("cut copy paste", function(e) {
        e.preventDefault();
        //  alert("You cannot paste into this text field.");
        $('#current_password, #new_password, #confirm_password').bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });

    $('#tanggal_masuk').datetimepicker({
        format: 'MM-DD-YYYY',
    });
});

function turnOnPasswordStyle() {
  $('#current_password, #new_password, #confirm_password').attr('type', "password");
}

</script>
@endpush
