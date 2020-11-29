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
                                <a href="" class="dropdown-item text-dark">History</a>
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
            <div class="col-12 mt-5 text-center">
                @if (count($trans) > 0)
                    <table class="table table-striped table-responsive-lg">
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Penerima</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trans as $item)
                                <tr>
                                    <td>{{ $item->id_user }}</td>
                                    <td>{{ $item->penerima }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->jalan }}</td>
                                    <td>{{ $item->City->nama }}</td>
                                    <td>Rp. {{ number_format($item->total - ($item->total / 100 * $item->diskon) + 15000) }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            Pending
                                        @elseif ($item->status == -1)
                                            Rejected
                                        @elseif ($item->status == -2)
                                            Canceled
                                        @else
                                            Approved
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Detail</button>
                                        @if ($item->status == 0)
                                            <button class="btn btn-danger">Cancel</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>History Transaksi Kosong</h2>
                    <p>Yuk, beli menu buat isi history sama perut XD</p>
                    <a href="{{ url('/') }}"><button class="btn btn-danger w-25">Mulai Belanja</button></a>
                @endif
            </div>
        </div>
    </div>

    {{-- Float action button --}}
    <a href="{{ url('cart') }}">
        <button type="button" class="btn btn-lg btn-danger float-button mr-3 mb-3">
            <i class="material-icons">shopping_cart</i>
        </button>
    </a>
</body>
</html>
