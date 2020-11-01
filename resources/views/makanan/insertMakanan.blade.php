@extends('templates/makanan')

@section('title')
    <h2>Insert Makanan</h2>
@endsection

@section('content')
    <form action="{{ url('insertMakanan') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_makanan">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="kategori_makanan">Kategori Makanan</label><br>
            <select id="kategori_makanan" name="kategori_makanan">
                <option></option>
                @foreach($kategori as $row)
                <option>{{$row->id_kategori."--".$row->nama}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
            <label for="stock_makanan">Stock Makanan</label>
            <input type="text" name="stock_makanan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="harga_makanan">Harga Makanan</label>
            <input type="text" name="harga_makanan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="berat_makanan">Berat Makanan (Kg)</label>
            <input type="text" name="berat_makanan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Makanan</label>
            <input type="text" name="deskripsi" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Insert</button>
    </form>
@endsection
