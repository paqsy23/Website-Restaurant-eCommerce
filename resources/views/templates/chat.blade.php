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
        .card { box-shadow: 0 0 0.2em gray }
        .card-header { background-color: rgba(0, 0, 0, 0); }

        #right-nav li a { color: white; }
        .float-button {
            position: fixed;
            border-radius: 100%;
            width: 3.5em;
            height: 3.5em;
            bottom: 0;
            right: 0;
        }

        #content-chat {
            height: 24em;
            overflow: scroll;
        }
        .bubble-chat {
            max-width: 40%;
            padding: 0.5em 1em;
            margin-bottom: 0.5em;
            border: 1px solid #dc3545;
            border-radius: 0.5em;
        }
        .bubble-chat.left {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg" style="background-color: #dc3545">
        @if (Session::get('user-login')->id_user == 'admin')
            <div class="container-fluid">
                <div class="navbar-header flex-grow-1" style="max-width: 20%;">
                    <a href="{{ url('admin') }}" class="navbar-brand">Ini Nama</a>
                </div>

                {{-- Navigation Menu --}}
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto" id="right-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('chat') }}">Chat</a></li>
                        {{-- Barang --}}
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Barang</a>
                            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                <a href="{{ url('page_insertMakanan') }}" class="dropdown-item text-dark">Insert Makanan</a>
                                <a href="{{ url('page_listMakanan') }}" class="dropdown-item text-dark">List Makanan</a>
                            </div>
                        </li>

                        {{-- Promo --}}
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Promo</a>
                            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                <a href="{{ url('page_insertPromo') }}" class="dropdown-item text-dark">Insert Promo</a>
                                <a href="{{ url('page_listPromo') }}" class="dropdown-item text-dark">List Promo</a>
                            </div>
                        </li>

                        {{-- Kategori --}}
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Kategori</a>
                            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                <a href="{{ url('page_insertKategori') }}" class="dropdown-item text-dark">Insert Kategori</a>
                                <a href="{{ url('page_listKategori') }}" class="dropdown-item text-dark">List Kategori</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        @else
            <div class="container-fluid">
                <div class="navbar-header flex-grow-1" style="max-width: 20%;">
                    <a href="{{ url('/') }}" class="navbar-brand">Ini Nama</a>
                </div>

                {{-- <div class="flex-grow-1 d-flex"> --}}
                    <form action="{{ url('search') }}" method="get" class="form-inline flex-grow-1 d-flex mx-0 mx-lg-auto p-1">
                        <input type="text" name="name" id="" class="form-control flex-grow-1" placeholder="Search">
                    </form>
                {{-- </div> --}}

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto" id="right-nav">
                        @if (Session::get('user-login') == null)
                            <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('chat/'.$user->id) }}">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('faq') }}">FAQ</a></li>
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">{{ $user->nama }}</a>
                                <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                    <a href="" class="dropdown-item text-dark">Profile</a>
                                    <a href="{{ url('logout') }}" class="dropdown-item text-dark">Logout</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        @endif

    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-4 py-5">
                <h2>Chat</h2>
                <div id="content-chat" class="mb-3" target="{{ url('load-chat') }}"></div>
                <div class="row">
                    @csrf
                    <div class="form-group col-9">
                        <input type="text" name="pesan" id="pesan" class="form-control w-100">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-danger w-100" @if(Session::get('user-login')->id_user != 'admin') target="{{ url('insertChat') }}/{{ $user->id_user }}" @else target="{{ url('insertAdmin') }}/{{ Session::get('target-chatroom') }}" @endif onclick="sendChat(this, '{{ csrf_token() }}')">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    var timer
    $(document).ready(function () {
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
        loadChat();
        timer = setInterval(function(){
            loadChat();
            $('#content-chat').scrollTop($('#content-chat')[0].scrollHeight)
        },5000);

    })

    function loadChat() {
        $('#content-chat').load($('#content-chat').attr('target'))
    }

    function sendChat(e, token) {
        $.post(
            $(e).attr('target'),
            {
                '_token' : token,
                'pesan' : $('#pesan').val()
            }, function() {
                $('#pesan').val('')
                loadChat()
                $('#content-chat').scrollTop($('#content-chat').scrollHeight)
            }
        )
    }

    $('.dropdown-toggle').dropdown();
</script>
