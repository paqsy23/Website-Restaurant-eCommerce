<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <style>
        a { color: #dc3545; }
        a:hover { color: black; }
        .card { border: 1px solid #dc3545; }
        .card-header {
            background-color: rgba(0, 0, 0, 0);
            /* border-bottom: 1px solid #dc3545; */
        }
        /* .nav-tabs .nav-link.active, .nav-tabs .nav-item.show, .nav-link {
            border-color: #dc3545 #dc3545 #fff;
        } */
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-5 mt-4 py-5">
                <div class="card pb-4" style="border-radius: 0.5em">
                    <div class="card-header">
                        {{-- Navigation --}}
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        {{-- Content --}}
                        <div class="tab-content" id="myTabContent">
                            {{-- Login --}}
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <div class="card-title text-center">
                                    <h2>Login</h2>
                                </div>
                                <div class="card-text">
                                    <form action="{{ url('login-process') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="user-login">Email / Username</label>
                                            <input type="text" name="user-login" id="" class="form-control" value="{{ old('user-login') }}">
                                            @error('user-login')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pass-login">Password</label>
                                            <input type="password" name="pass-login" id="" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Login</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Register --}}
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <div class="card-title text-center">
                                    <h2>Register</h2>
                                </div>
                                <div class="card-text">
                                    <form action="{{ url('register-process') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="user-login">Username</label>
                                            <input type="text" name="user-register" id="" class="form-control" value="{{ old('user-register') }}">
                                            @error('user-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user-login">Nama</label>
                                            <input type="text" name="name-register" id="" class="form-control" value="{{ old('name-register')}}">
                                            @error('name-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user-login">Email</label>
                                            <input type="text" name="email-register" id="" class="form-control" value="{{ old('email-register')}}">
                                            @error('email-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user-login">Password</label>
                                            <input type="password" name="pass-register" id="" class="form-control">
                                            @error('pass-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user-login">Confirm Password</label>
                                            <input type="password" name="confirm-register" id="" class="form-control">
                                            @error('confirm-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user-login">No. Telp</label>
                                            <input type="text" name="telp-register" id="" class="form-control" value="{{ old('telp-register') }}">
                                            @error('telp-register')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    })
</script>
