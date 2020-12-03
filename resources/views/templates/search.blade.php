<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/google_icons.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <style>
        #right-nav li a { color: white; }
        .float-button {
            position: fixed;
            border-radius: 100%;
            width: 3.5em;
            height: 3.5em;
            bottom: 0;
            right: 0;
        }
        .pagination .page-item a { color: #dc3545; }
        .page-item.active .page-link {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }
        .del-btn:hover { cursor: pointer; }
        a.stretched-link { color: black; }
        a.stretched-link:hover { text-decoration: none; }
        .swal2-confirm.swal2-styled {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .swal2-confirm.swal2-styled:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }
        .swal2-confirm.swal2-styled:focus {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
            box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);
        }
        .swal2-deny.swal2-styled {
            color: #dc3545;
            background-color: #fff;
            border-color: #dc3545;
        }
        .swal2-deny.swal2-styled:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .swal2-deny.swal2-styled:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg" style="background-color: #dc3545">
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
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">{{ $user->nama }}</a>
                            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                <a href="" class="dropdown-item text-dark">Profile</a>
                                <a href="{{ url('trans') }}" class="dropdown-item text-dark">Profile</a>
                                <a href="{{ url('logout') }}" class="dropdown-item text-dark">Logout</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- Content --}}
    <div class="container mt-5 py-4">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mt-4">
                <form action="{{ url('filter') }}/{{$nama_barang}}" method="get">
                <div style="float: left; width: 200px;">
                    <h4>Jenis</h4>
                    @foreach ($kategoris as $kategori)
                        <p><input type="checkbox" name="language[]"  value="{{$kategori->nama}}"/> {{$kategori->nama}}</p>
                    @endforeach
                </div>
                <div style="float: left; width: 200px;">
                    <h4>Kategori</h4>
                    @foreach ($makanans1 as $makanan1)
                        <p><input type="checkbox" name="language[]"  value="{{$makanan1->jenis}}"/> {{ucfirst($makanan1->jenis)}}</p>
                    @endforeach
                </div>
                <div><p><input type="submit" name="submit" class="btn btn-info w-100    " value="Filter" /></p></div>
                <br style="clear: left;" />
                </form>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="row">
                    {{-- Search Menus --}}
                    <div class="col-sm-12 row d-flex h-50 mt-4">
                        <div class="col-sm-6">
                            <h3>Menus</h3>
                        </div>
                        <div class="col-sm-12 dropdown-divider"></div>
                    </div>

                    @foreach ($makanans as $makanan)
                        <div class="col-6 col-md-4 col-lg-3 mt-3">
                            <div class="card" style="min-height: 20em;">
                                {{-- Image --}}
                                @if ($makanan->jenis == 'main dish')
                                    <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img">
                                @elseif ($makanan->jenis == 'dessert')
                                    <img src="{{ asset('image/dessert_sample.jpg') }}" alt="" class="card-img">
                                @elseif ($makanan->jenis == 'drink')
                                    <img src="{{ asset('image/drink_sample.jpg') }}" alt="" class="card-img">
                                @endif
                                <div class="card-body">
                                    @if ($makanan->jenis == 'main dish')
                                        <a href="{{ url('main-dishes/detail/'.$makanan->id_barang) }}" class="stretched-link">
                                    @else
                                        <a href="{{ url($makanan->jenis.'s/detail/'.$makanan->id_barang) }}" class="stretched-link">
                                    @endif
                                    <h5 class="card-title">{{ $makanan->nama }}</h5></a>
                                    <p class="card-text">
                                        <span class="text-danger" style="font-weight: bold;">Rp. {{ number_format($makanan->harga, 0) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('.dropdown-toggle').dropdown();

    function decQty(e) {
        var id = $(e).attr('id_menu')
        $.get(
            $(e).attr('target') + '/' + id,
            {},
            function (result) {
                $('#qty-' + id).val(parseInt($('#qty-' + id).val()) - 1)
                if ($('#qty-' + id).val() == 1) {
                    $(e).attr('disabled', true)
                }

            }
        )
    }

    function incQty(e) {
        var id = $(e).attr('id_menu')
        $.get(
            $(e).attr('target') + '/' + id,
            {},
            function (result) {
                $('#qty-' + id).val(parseInt($('#qty-' + id).val()) + 1)
                if ($('#qty-' + id).val() > 1) {
                    $(e).attr('disabled', false)
                }

            }
        )
    }

    function delMenu(e) {
        var id = $(e).attr('id_menu')
        Swal.fire({
            icon: 'warning',
            title: 'Hapus Menu',
            text: 'Apakah anda yakin menghapus menu ini?',
            showDenyButton: true,
            confirmButtonText: 'Hapus Menu',
            denyButtonText: 'Kembali',
            focusConfirm: false,
            focusDeny: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    $(e).attr('target'),
                    {
                        '_token':$(e).attr('token'),
                        'id_barang':id
                    },
                    function(result) {
                        window.location = $(e).attr('move')
                    }
                )
            }
        })
    }
</script>
</html>
