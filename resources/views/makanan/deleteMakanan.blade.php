@extends('templates/makanan')

@section('title')
    <h2>Delete Makanan</h2>
@endsection

@section('content')
    <form action="{{ url('insert-makanan') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_makanan">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Delete</button>
    </form>
@endsection
