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
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg" style="background-color: #dc3545">
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
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 py-5">
                @yield('title')
                @yield('content')
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

    $('.dropdown-toggle').dropdown();
</script>
