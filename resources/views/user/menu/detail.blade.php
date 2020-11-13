@extends('templates.detail-page')

@section('title', $menu->nama)

@section('content')
    <span style="color: #6c757d">Stock tersedia: {{ $menu->stock }}</span><br>
    <h5 class="text-danger" style="font-weight: bold">Rp. {{ number_format($menu->harga, 0) }}</h5><br>
    {{ $menu->deskripsi }}. <br><br>
    <div class="form-group">
        <label for="">Qty:</label><br>
        <button class="btn btn-outline-danger" id="qty-dec" style="padding: 0.275rem 0.75rem">-</button>
        <input type="text" name="" id="qty" class="form-control text-center" value="1" style="width: 3em; display: inline-block; height: auto;">
        <button class="btn btn-outline-danger" id="qty-inc" style="padding: 0.275rem 0.70rem">+</button>
    </div>
@endsection

@section('footer')
    <form action="{{ url('cart/add') }}" method="post">
        @csrf
        <button class="btn btn-danger w-75">Add to Cart</button>
        <input type="hidden" name="qty" id="qty-form" value="1">
        <input type="hidden" name="id_barang" value="{{ $menu->id_barang }}">
    </form>
@endsection
