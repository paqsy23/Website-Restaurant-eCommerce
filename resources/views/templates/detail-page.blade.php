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
                        <li class="nav-item"><a class="nav-link" href="{{ url('faq') }}">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('chat/'.$user->id) }}">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('faq') }}">FAQ</a></li>
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="menu-dropdown" data-toggle="dropdown">{{ $user->nama }}</a>
                            <div class="dropdown-menu" aria-labelledby="menu-dropdown">
                                <a href="{{ url('profile') }}" class="dropdown-item text-dark">Profile</a>
                                <a href="{{ url('trans') }}" class="dropdown-item text-dark">History</a>
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
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-6 col-lg-4">
                            <img src="
                            @if ($detail_type == 'promo')
                                {{ asset('image/sample_promo.jpg') }}
                            @elseif ($detail_type == 'main dish')
                                {{ asset('image/main_dish_sample.jpg') }}
                            @elseif ($detail_type == 'dessert')
                                {{ asset('image/dessert_sample.jpg') }}
                            @elseif ($detail_type == 'drink')
                                {{ asset('image/drink_sample.jpg') }}
                            @endif
                            " alt="" class="card-img">
                        </div>
                        <div class="col-12 col-md-6 col-lg-8">
                            <div class="card-body">
                                <h3 class="card-title">@yield('title')</h3>
                                <p class="card-text">
                                    @yield('content')
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-footer text-center">
                                @yield('footer')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="width: 100%; height: auto;">
        <div class="card-body">
            <div class="container">
                <h3>Comment</h3>

                <h4>
                    <span class="icon" style="color: red">★</span>{{$rate}}
                </h4>
                <a href="#kota" class="btn btn-info" data-toggle="collapse">SHOW COMMENT</a>
                <div id="kota" class="collapse">
                    @foreach ($review as $item)
                        <br>

                                @foreach ($users as $value)
                                    @if ($value->id_user == $item->id_user)
                                        <h4>
                                            {{$value->nama}}
                                            @for ($i = 0; $i < $item->rating; $i++)
                                                <span class="icon" style="color: red">★</span>
                                            @endfor
                                        </h4>
                                    @endif
                                @endforeach

                        <br>

                    @endforeach

                </div>
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
<script>
    $(document).ready(function () {
        $('#qty-dec').attr('disabled', true)
    })

    $('.dropdown-toggle').dropdown();

    $('#qty-dec').on('click', function () {
        $('#qty').val(parseInt($('#qty').val()) - 1)
        $('#qty-form').val(parseInt($('#qty').val()))
        if ($('#qty').val() == 1) {
            $('#qty-dec').attr('disabled', true)
        }
    })

    $('#qty-inc').on('click', function () {
        $('#qty').val(parseInt($('#qty').val()) + 1)
        $('#qty-form').val(parseInt($('#qty').val()))
        if ($('#qty').val() > 1) {
            $('#qty-dec').attr('disabled', false)
        }
    })
</script>
</html>
