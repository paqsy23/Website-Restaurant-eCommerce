@extends("templates/makanan")

@section('title')
    <h2>List Chat</h2>
@endsection

@section('content')
<div class="form-group">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($chatroom as $row)
            <tr>
              <td>{{$row->id_user}}</td>
              <td>
                <form method="get" action="chatAdmin/{{ $row->id_chatroom }}" class="d-inline">
                    <button type="submit" class="btn btn-primary">Chat</button>
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
