@extends("templates/makanan")

@section('title')
    <h2>List Makanan</h2>
@endsection

@section('content')
<div class="form-group">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Makanan</th>
              <th>Nama Makanan</th>
              <th>Harga Makanan</th>
              <th>Stock Makanan</th>
              <th>Deskripsi Makanan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($makanan as $row)
            <tr>
              <td>{{$row->id_barang}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->harga}}</td>
              <td>{{$row->stock}}</td>
              <td>{{$row->deskripsi}}</td>
              <td>
                <form method="get" action="/AdminController/editMakanan/{{ $row->id_barang }}" class="d-inline">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <form method="post" action="{{ url('deleteMakanan') }}/{{ $row->id_barang }}" class="d-inline">
                    @method("delete")
                    @csrf
                    <button onclick="return conf()" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection
