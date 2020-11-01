@extends("templates/makanan")

@section('title')
    <h2>List Kategori</h2>
@endsection

@section('content')
<div class="form-group">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Kategori</th>
              <th>Nama Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($kategori as $row)
            <tr>
              <td>{{$row->id_kategori}}</td>
              <td>{{$row->nama}}</td>
              <td>
                <form method="get" action="/AdminController/edit/{{ $row->id_kategori }}" class="d-inline">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <form method="post" action="{{ url('deleteKategori') }}/{{ $row->id_kategori }}" class="d-inline">
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
