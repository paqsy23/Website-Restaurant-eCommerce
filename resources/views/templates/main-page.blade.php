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
        #right-nav li a { color: white; }
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg" style="background-color: #dc3545">
        <div class="container-fluid">
            <div class="navbar-header flex-grow-1" style="max-width: 20%;">
                <a href="" class="navbar-brand">Ini Nama</a>
            </div>

            {{-- <div class="flex-grow-1 d-flex"> --}}
                <form action="" class="form-inline flex-grow-1 d-flex mx-0 mx-lg-auto p-1">
                    <input type="text" name="" id="value" class="form-control flex-grow-1" placeholder="Search">
                </form>
            {{-- </div> --}}

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-1 d-flex" id="navbarText">
                @if (Cookie::get('user-login') == null)
                    <ul class="navbar-nav ml-auto" id="right-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto" id="right-nav">
                        <li class="nav-item"><a href="" class="nav-link">{{ $user->nama }}</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</body>
<script>
    $('#value').keyup(function(e){
        if (e.keycode == 13) {
            var value = $('#value').val()
            alert(value)
            window.location.href = new URL('/search?nama=' + value, 'http://127.0.0.1')
        }
    })
</script>
</html>
