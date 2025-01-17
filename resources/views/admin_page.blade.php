@extends('templates.history')

@section('title', 'Transaksi')

@section('table')

    @if (Session::get('message') != null)
        <div class="my-3">
            <h3 class="text-danger">{{ Session::get('message') }}</h3>
        </div>
    @endif

    <table class="table table-striped table-responsive-lg">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Penerima</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Diskon</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trans as $item)
                <tr>
                    <td>{{ $item->id_user }}</td>
                    <td>{{ $item->penerima }}</td>
                    <td>{{ $item->telp }}</td>
                    <td>{{ $item->jalan }}</td>
                    <td>{{ $item->City->nama }}</td>
                    <td>
                        @if($item->diskon == 0)
                            -
                        @else
                            {{ $item->diskon }}%
                        @endif
                    </td>
                    <td>Rp. {{ number_format($item->total - ($item->total / 100 * $item->diskon) + 15000) }}</td>
                    <td>
                        @if ($item->status == 0)
                            Pending
                        @elseif ($item->status == -1)
                            Rejected
                        @elseif ($item->status == -2)
                            Canceled
                        @else
                            Approved
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('trans/action') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_trans" value="{{ $item->id_trans }}">
                            @if ($item->status == 0)
                                <button class="btn btn-success" name="approve">Approve</button>
                                <button class="btn btn-danger" name="reject">Reject</button>
                            @endif
                            <button class="btn btn-primary" name="detail">Detail</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('empty')
    <h2>Tidak ada transaksi saat ini</h2>
@endsection
