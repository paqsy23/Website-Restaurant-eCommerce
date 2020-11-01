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
                <a href="" class="navbar-brand">Ini Nama</a>
            </div>

            {{-- <div class="flex-grow-1 d-flex"> --}}
                <form action="{{ url('search') }}" method="get" class="form-inline flex-grow-1 d-flex mx-0 mx-lg-auto p-1">
                    <input type="text" name="name" id="" class="form-control flex-grow-1" placeholder="Search">
                </form>
            {{-- </div> --}}

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto" id="right-nav">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Barang</a>
                        <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                            <a href="{{ url('page_insertMakanan') }}" class="dropdown-item text-dark">Insert Makanan</a>
                            <a href="{{ url('page_listMakanan') }}" class="dropdown-item text-dark">List Makanan</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto" id="right-nav">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Promo</a>
                        <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                            <a href="{{ url('page_insertPromo') }}" class="dropdown-item text-dark">Insert Promo</a>
                            <a href="{{ url('page_listPromo') }}" class="dropdown-item text-dark">List Promo</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto" id="right-nav">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                            <a href="{{ url('page_insertKategori') }}" class="dropdown-item text-dark">Insert Kategori</a>
                            <a href="{{ url('page_listKategori') }}" class="dropdown-item text-dark">List Kategori</a>
                        </div>
                    </li>
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto" id="right-nav">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                            <a href="{{ url('logout') }}" class="dropdown-item text-dark">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-5 mt-4 py-5">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('warning'))
                    <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                @endif
                <div class="card pb-4" style="border-radius: 0.5em">
                    <div class="card-body">
                        <div class="card-title text-center">
                            @yield('title')
                        </div>
                        <div class="card-text">
                            @yield('content')
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

    $('.dropdown-toggle').dropdown();
</script>
