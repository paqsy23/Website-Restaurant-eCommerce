@extends('templates.cart')

@section('content')
    @if (count($carts) > 0)
        {{-- Detail --}}
        <div class="col-md-12 col-lg-8 mb-3">
            @foreach ($carts as $cart)
                <div class="card mb-2">
                    <div class="row no-gutters">
                        <div class="col-6 col-md-5 col-lg-4">
                            {{-- Image --}}
                            @if ($cart->jenis == 'main dish')
                                <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img">
                            @elseif ($cart->jenis == 'dessert')
                                <img src="{{ asset('image/dessert_sample.jpg') }}" alt="" class="card-img">
                            @elseif ($cart->jenis == 'drink')
                                <img src="{{ asset('image/drink_sample.jpg') }}" alt="" class="card-img">
                            @endif
                        </div>
                        <div class="col-5 col-md-6 col-lg-7">
                            {{-- Detail --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $cart->nama }}</h5>
                                <p class="card-text">
                                    @csrf
                                    Rp. {{ number_format($cart->harga, 0) }} <br>
                                    <div class="form-group">
                                        <button class="btn btn-outline-danger" id="qty-dec" style="padding: 0.275rem 0.75rem" target="{{ url('cart/dec/') }}" id_menu="{{ $cart->id_barang }}" onclick="decQty(this)">-</button>
                                        <input type="text" name="" id="qty-{{ $cart->id_barang }}" class="form-control text-center" value="{{ $cart->qty }}" style="width: 3em; display: inline-block; height: auto;">
                                        <button class="btn btn-outline-danger" id="qty-inc" style="padding: 0.275rem 0.70rem" target="{{ url('cart/inc/') }}" id_menu="{{ $cart->id_barang }}" onclick="incQty(this)">+</button>
                                    </div>
                                    <span class="text-danger" style="font-weight: bold">Subtotal: Rp. {{ number_format($cart->subtotal, 0) }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-1 text-right">
                            <i class="material-icons text-danger mr-2 del-btn" target="{{ url('cart/delete/') }}" move="{{ url('cart') }}" id_menu="{{ $cart->id_barang }}" onclick="delMenu(this)" token="{{ csrf_token() }}" style="font-size: 1.8em;">delete</i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Header --}}
        <div class="col-md-12 col-lg-4">
            {{-- Promo --}}
            <div class="card">
                <div class="card-body">
                    <select name="" id="promo" class="form-control" @if (Session::get('user-login') == null) disabled @endif>
                        <option value="">Promo tersedia</option>
                        @foreach ($promos as $promo)
                            <option value="{{ $promo->potongan_harga }}">{{ $promo->nama_promo }}</option>
                        @endforeach
                    </select>
                    @if (Session::get('user-login') == null)
                        <small class="form-text text-danger">Silahkan login untuk menikmati promo</small>
                    @endif
                </div>
            </div>

            {{-- Address --}}
            <div class="card mt-1">
                <div class="card-body">
                    <h5>Alamat Pengiriman</h5>
                    <div class="dropdown-divider"></div>
                    <small>
                        @if ($address == null)
                            Belum ada alamat yang dipilih
                        @else
                            <span style="font-weight: bold">{{ $address->penerima }}</span> ({{ $address->telp }}) <br>
                            {{ $address->jalan }}, {{ $address->kodepos }} <br>
                            {{ $address->City->nama }}
                        @endif
                    </small>
                    <div class="dropdown-divider"></div>
                    <button class="btn btn-outline-dark" data-target="#list-address" onclick="showAddresses(this)" target="{{ url('address') }}">
                        Pilih alamat @if($address != null)lain @endif
                    </button>
                </div>
            </div>

            {{-- Total --}}
            <div class="card mt-1">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Belanja</h5>
                    <p class="card-text">
                        <div>
                            <div style="float: left;">Total ({{ count($carts) }} produk)</div>
                            <div style="float: right;">Rp. {{ number_format($totalHarga) }}</div>
                        </div>
                        <div style="clear: both;"></div>
                        <div id="promo-detail" style="display: none">
                            <div class="text-danger" style="float: left;">Promo</div>
                            <div class="text-danger" id="nominal" total="{{ $totalHarga }}" style="float: right;"></div>
                        </div>
                        <div style="clear: both;"></div>
                        <div>
                            <div style="float: left;">Pengiriman</div>
                            <div style="float: right;">Rp. {{ number_format(15000) }}</div>
                        </div>
                        <br>
                        <div style="clear: both;"></div>
                        <small class="form-text text-muted">Pengiriman hanya berlaku pada kota-kota yang tersedia</small>
                        <div class="dropdown-divider"></div>
                        <div>
                            <div style="float: left;">
                                <h5>Total Tagihan</h5>
                            </div>
                            <div style="float: right;">
                                <span class="text-danger" id="total" style="font-weight: bold">Rp. {{ number_format($totalHarga + 15000) }}</span>
                            </div>
                        </div>
                        <button class="btn btn-danger w-100 mt-1" target="{{ url('trans/checkout') }}" move="{{ url('cart') }}" onclick="checkout('{{ csrf_token() }}', this)">Pesan</button>
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="col-12 mt-5 mb-5 text-center">
            <h2>Keranjang kosong, nih</h2>
            <p>Daripada dibiarin kosong, mending order menu yuk buat ilangin laper XD</p>
            <a href="{{ url('/') }}"><button class="btn btn-danger w-25">Mulai Belanja</button></a>
        </div>
    @endif

    {{-- Popular Menus --}}
    <div class="col-sm-12 row d-flex h-50 mt-4">
        <div class="col-sm-6">
            <h3>Most Popular Menus</h3>
        </div>
        <div class="col-sm-12 dropdown-divider"></div>
    </div>

    @foreach ($populars as $popular)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 25em;">
                {{-- Image --}}
                @if ($popular->jenis == 'main dish')
                    <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img">
                @elseif ($popular->jenis == 'dessert')
                    <img src="{{ asset('image/dessert_sample.jpg') }}" alt="" class="card-img">
                @elseif ($popular->jenis == 'drink')
                    <img src="{{ asset('image/drink_sample.jpg') }}" alt="" class="card-img">
                @endif
                <div class="card-body">
                    @if ($popular->jenis == 'main dish')
                        <a href="{{ url('main-dishes/detail/'.$popular->id_barang) }}" class="stretched-link">
                    @else
                        <a href="{{ url($popular->jenis.'s/detail/'.$popular->id_barang) }}" class="stretched-link">
                    @endif
                    <h5 class="card-title">{{ $popular->nama }}</h5></a>
                    <p class="card-text">
                        <span class="text-danger" style="font-weight: bold;">Rp. {{ number_format($popular->harga, 0) }}</span>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
