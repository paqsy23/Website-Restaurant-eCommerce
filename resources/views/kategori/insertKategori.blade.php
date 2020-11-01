@extends('templates/makanan')

@section('title')
    <h2>Insert Kategori</h2>
@endsection

@section('content')
    <form action="{{ url('insertKategori') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Insert</button>
    </form>
@endsection
