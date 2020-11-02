@extends('templates.login-register')

@section('title')
    <h2>Register</h2>
@endsection

@section('content')
    <form action="{{ url('register-process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_register">Username</label>
            <input type="text" name="user_register" id="" class="form-control" value="{{ old('user_register') }}">
            @error('user_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="name_register">Nama</label>
            <input type="text" name="name_register" id="" class="form-control" value="{{ old('name_register')}}">
            @error('name_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email_register">Email</label>
            <input type="text" name="email_register" id="" class="form-control" value="{{ old('email_register')}}">
            @error('email_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_register">Password</label>
            <input type="password" name="pass_register" id="" class="form-control">
            @error('pass_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirm_register">Confirm Password</label>
            <input type="password" name="confirm_register" id="" class="form-control">
            @error('confirm_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telp_register">No. Telp</label>
            <input type="text" name="telp_register" id="" class="form-control" value="{{ old('telp_register') }}">
            @error('telp_register')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Register</button>
        <div class="text-center">
            Already have an account? <a href="{{ url('login') }}">Login</a>
        </div>
    </form>
@endsection
