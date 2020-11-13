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
            <label for="">Minimal Transaksi</label>
            <input type="text" name="minimal_transaksi" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <input type="text" name="detail" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="syarat_promo">Syarat Promo</label>
            <input type="text" name="syarat_promo" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Kategori Promo</label>
            <div class="form-check">
                <input type="radio" name="kategori_promo" id="new" class="form-check-input" value="new user">
                <label for="" class="form-check-label">User Baru</label>
            </div>
            <div class="form-check">
                <input type="radio" name="kategori_promo" id="jenis" class="form-check-input" value="jenis">
                <label for="" class="form-check-label">Jenis</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Jenis</label>
            <select name="jenis" id="jenis_kategori" class="form-control" disabled>
                <option value="all">All</option>
                <option value="main dish">Main Dish</option>
                <option value="dessert">Dessert</option>
                <option value="Drink">drink</option>
            </select>
        </div>
        <input type="hidden" name="jenis_kategori" id="kategori" value="">
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Insert</button>
    </form>
    <script>
        $(document).ready(function() {
            $("#jenis, #new").change(function () {
                if ($("#jenis").is(":checked")) {
                    $('#jenis_kategori').attr('disabled', false);
                }
                else if ($("#new").is(":checked")) {
                    $('#jenis_kategori').attr('disabled', true);
                }
            });

            $('#jenis_kategori').change(function () {
                $('#kategori').val($(this).val())
            })
        })
    </script>
@endsection
