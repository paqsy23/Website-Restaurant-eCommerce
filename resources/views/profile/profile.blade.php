@extends('templates.profile')

@section('content')
<div class="col-6">
    <h3>Update Profile</h3>
</div>
<div class="col-sm-12 dropdown-divider"></div> 
<div class="col-sm-12">
    <form action="{{ url('update-profile') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_profile">Username</label>
            <div class="col-sm-10">
                <input type="text" name="user_profile" id="" class="form-control-plaintext" value="{{ $user->id_user }}" readonly>
            </div>
            @error('user_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="name_profile">Nama</label>
            <input type="text" name="name_profile" id="" class="form-control" value="{{ $user->nama }}">
            @error('name_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email_profile">Email</label>
            <input type="text" name="email_profile" id="" class="form-control" value="{{ $user->email }}">
            @error('email_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telp_profile">No. Telp</label>
            <input type="text" name="telp_profile" id="" class="form-control" value="{{ $user->notelp }}">
            @error('telp_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-danger">Save Update</button>
        </div>
    </form>
</div>
<div class="col-6">
    <h3>Change Password</h3>
</div>
<div class="col-sm-12 dropdown-divider"></div> 
<div class="col-sm-12">
    <form action="{{ url('update-password') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="oldpass_profile">Old Password</label>
            <input type="password" name="oldpass_profile" id="" class="form-control">
            @error('oldpass_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="newpass_profile">New Password</label>
            <input type="password" name="newpass_profile" id="" class="form-control">
            @error('newpass_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirmpass_profile">Confirm Password</label>
            <input type="password" name="confirmpass_profile" id="" class="form-control">
            @error('confirmpass_profile')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-danger">Save Password</button>
        </div>
    </form>
</div>
@endsection
