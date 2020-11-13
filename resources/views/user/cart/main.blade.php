@extends('templates.cart')

@section('detail')
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
@endsection

@section('header')

@endsection
