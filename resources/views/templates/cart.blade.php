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

        /* Navbar */
        a.stretched-link { color: black; }
        a.stretched-link:hover { text-decoration: none; }

        /* Sweet Alert */
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

        .btn-outline-dark:hover {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
        }

        a.stretched-link { color: black; }
        a.stretched-link:hover { text-decoration: none; }
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
        <div class="row">
            @yield('content')
        </div>

        {{-- Address --}}
        <div class="modal fade" id="list-address">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title"><h5 id="modal-title">Pilih Alamat Pengiriman</h5></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="list-address-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('.dropdown-toggle').dropdown();

    $('#promo').change(function() {
        var selected = $('#promo :selected').val()
        var total = parseInt($('#nominal').attr('total'))
        if (selected == "") {
            $('#promo-detail').css('display', 'none')
            $('#total').html("Rp. " + (total + 15000).toLocaleString('en'))
            $('#discount').val(0)
        } else {
            var promo = total * parseInt(selected) / 100
            $('#promo-detail').css('display', 'block')
            $('#nominal').html("- Rp. " + (promo).toLocaleString('en'))
            $('#total').html("Rp. " + (total + 15000 - promo).toLocaleString('en'))
            $('#discount').val(parseInt(selected))
        }
    })

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

    function showAddresses(e) {
        $.get(
            $(e).attr('target'),
            {},
            function (result) {
                $('#list-address-body').html(result)
                $('#list-address').modal('show')

            }
        )
    }

    function setAddress(e) {
        $.get(
            $(e).attr('target'),
            {},
            function (result) {
                window.location = $(e).attr('move')
            }
        )
    }

    function showForm(e) {
        $.get(
            $(e).attr('target'),
            {},
            function (result) {
                if ($(e).attr('type-data') == 'new') {
                    $('#modal-title').html('Tambah Alamat Baru')
                } else {
                    $('#modal-title').html('Ubah Alamat')
                }
                $('#list-address-body').html(result)
            }
        )
    }

    function cancelEdit(e) {
        $.get(
            $(e).attr('target'),
            {},
            function (result) {
                $('#list-address-body').html(result)

            }
        )
    }

    function approveEdit(e) {
        var checkInput = true
        var token = $('#token').val()
        var penerima = $('#form-penerima').val()
        var telp = $('#form-telp').val()
        var alamat = $('#form-alamat').val()
        var kodepos = $('#form-kodepos').val()
        var kota = $('#form-kota :selected').val()

        if (penerima == "") {
            checkInput = false
            $('#error-penerima').css('display', 'block')
        } else $('#error-penerima').css('display', 'none')
        if (telp == "") {
            checkInput = false
            $('#error-telp').css('display', 'block')
        } else $('#error-telp').css('display', 'none')
        if (alamat == "") {
            checkInput = false
            $('#error-alamat').css('display', 'block')
        } else $('#error-alamat').css('display', 'none')
        if (kodepos == "") {
            checkInput = false
            $('#error-kodepos').css('display', 'block')
        } else $('#error-kodepos').css('display', 'none')
        if (kota == "") {
            checkInput = false
            $('#error-kota').css('display', 'block')
        } else $('#error-kota').css('display', 'none')

        if (checkInput) {
            $.post(
                $(e).attr('target'),
                {
                    '_token' : token,
                    'penerima' : penerima,
                    'telp' : telp,
                    'alamat' : alamat,
                    'kodepos' : kodepos,
                    'kota' : kota
                },
                function (result) {
                    if (result == 'ok') {
                        $.get(
                            $(e).attr('move'),
                            {},
                            function (result) {
                                $('#list-address-body').html(result)

                            }
                        )
                    }

                }
            )
        }
    }

    function checkout(token, e) {
        var selected = $('#promo :selected').val()
        var promo = -1

        if (selected == '') promo = 0
        else promo = parseInt(selected)

        $.post(
            $(e).attr('target'),
            {
                '_token' : token,
                'discount' : promo
            }, function (message) {
                if (message == 'ok') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Berhasil',
                        text: 'Silahkan tunggu konfirmasi',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = $(e).attr('move')
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Order Gagal',
                        text: message,
                    })
                }
            }
        )
    }
</script>
</html>
