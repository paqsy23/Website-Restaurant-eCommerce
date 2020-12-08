@extends('templates.history')

@section('title', 'Detail Transaksi')

@section('id-trans', 'ID Transaksi : '.$htrans->id_trans)

@section('table')
    <table class="table table-striped table-responsive-lg text-left">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trans as $item)
                <tr>
                    <td>{{ $item->Menu->nama }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp. {{ number_format($item->Menu->harga) }}</td>
                    <td>Rp. {{ number_format($item->subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <h4>Total : Rp. {{ number_format($htrans->total) }}</h4>
    </div>
@endsection
