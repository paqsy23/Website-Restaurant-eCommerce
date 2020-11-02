@extends('templates.login-register')

@section('title')
    <h2>Login</h2>
@endsection

@section('content')
    <form action="{{ url('login-process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_login">Email / Username</label>
            <input type="text" name="user_login" id="" class="form-control" value="{{ old('user_login') }}">
            @error('user_login')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="pass_login">Password</label>
            <input type="password" name="pass_login" id="" class="form-control">
            @error('pass_login')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Login</button>
        <div class="text-center">
            Don't have an account? <a href="{{ url('register') }}">Register now!</a>
        </div>
    </form>
@endsection
