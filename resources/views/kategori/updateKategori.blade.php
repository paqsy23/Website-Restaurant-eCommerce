@extends('templates/makanan')

@section('title')
    <h2>Update Kategori</h2>
@endsection

@section('content')
    <form action="{{ url('updateKategori') }}/{{$kategori->id_kategori}}" method="post">
        @csrf
        <div class="form-group">
            <label for="id_kategori">ID Kategori</label>
        <input type="text" name="id_kategori" id="" class="form-control" value="{{$kategori->id_kategori}}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="" class="form-control" value="{{$kategori->nama}}">

        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Update</button>
    </form>


@endsection
