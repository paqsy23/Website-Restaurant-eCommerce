@extends('templates/makanan')

@section('title')
    <h2>Insert Promo</h2>
@endsection

@section('content')
    <form action="{{ url('insertPromo') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Promo</label>
            <input type="text" name="nama_promo" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="potongan_harga">Potongan Harga</label>
            <input type="text" name="potongan_harga" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <input type="text" name="detail" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="syarat_promo">Syarat Promo</label>
            <input type="text" name="syarat_promo" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Insert</button>
    </form>
@endsection
