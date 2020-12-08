@extends('templates.history')

@section('title', 'Histori Transaksi')

@section('table')
    <table class="table table-striped table-responsive-lg">
        <thead>
            <tr>
                <th>Penerima</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trans as $item)
                <tr>
                    <td>{{ $item->penerima }}</td>
                    <td>{{ $item->telp }}</td>
                    <td>{{ $item->jalan }}</td>
                    <td>{{ $item->City->nama }}</td>
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
                            <button class="btn btn-primary" name="detail">Detail</button>
                            @if ($item->status == 0)
                                <button class="btn btn-danger" name="cancel">Cancel</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('empty')
    <h2>History Transaksi Kosong</h2>
    <p>Yuk, beli menu buat isi history sama perut XD</p>
    <a href="{{ url('/') }}"><button class="btn btn-danger w-25">Mulai Belanja</button></a>
@endsection
