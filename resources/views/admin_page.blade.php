@extends('templates.makanan')

@section('title')
    <h2>List Transaksi</h2>
@endsection

@section('content')
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
                        @if ($item->status == 0)
                            <button class="btn btn-success">Approve</button>
                            <button class="btn btn-danger">Cancel</button>
                        @endif
                        <button class="btn btn-primary">Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
