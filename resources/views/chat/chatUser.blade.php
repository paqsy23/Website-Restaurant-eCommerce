@extends('templates/chat')

@section('title')
    <h2>Chat</h2>
@endsection

@section('content')
    @foreach ($chat as $row)

    <tr>
        <td>{{$row->pesan}}</td>
    </tr>
    @endforeach
    <form action="{{ url('insertChat') }}/{{ $user->id_user }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="pesan" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-50" style="margin-left: 25%;">Submit</button>
    </form>
@endsection
