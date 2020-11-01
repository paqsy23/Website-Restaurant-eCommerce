@extends('templates/makanan')

@section('title')
    <h2>Update Kategori</h2>
@endsection

@section('content')
    <form action="{{ url('updatePromo') }}/{{$promo->id_promo}}" method="post">
        @csrf
        <div class="form-group">
            <label for="id_promo">ID Promo</label>
        <input type="text" name="id_promo" id="" class="form-control" value="{{$promo->id_promo}}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_promo">Nama Promo</label>
        <input type="text" name="nama_promo" id="" class="form-control" value="{{$promo->nama_promo}}">
        </div>
        <div class="form-group">
            <label for="potongan_harga">Potongan Harga</label>
            <input type="text" name="potongan_harga" id="" class="form-control" value="{{$promo->potongan_harga}}">
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <input type="text" name="detail" id="" class="form-control" value="{{$promo->detail}}">
        </div>
        <div class="form-group">
            <label for="syarat_promo">Syarat Promo</label>
            <input type="text" name="syarat_promo" id="" class="form-control" value="{{$promo->syarat_promo}}">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Update</button>
    </form>


@endsection
