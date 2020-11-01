@extends("templates/makanan")

@section('title')
    <h2>List Promo</h2>
@endsection

@section('content')
<div class="form-group">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Promo</th>
              <th>Nama Promo</th>
              <th>Potongan Harga</th>
              <th>Detail</th>
              <th>Syarat Promo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($promo as $row)
            <tr>
              <td>{{$row->id_promo}}</td>
              <td>{{$row->nama_promo}}</td>
              <td>{{$row->potongan_harga}}</td>
              <td>{{$row->detail}}</td>
              <td>{{$row->syarat_promo}}</td>
              <td>
                <form method="get" action="/AdminController/editPromo/{{ $row->id_promo }}" class="d-inline">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <form method="post" action="{{ url('deletePromo') }}/{{ $row->id_promo }}" class="d-inline">
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

</div>
@endsection
