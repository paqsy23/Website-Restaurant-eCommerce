@extends('templates.history')

@section('title', 'Detail Transaksi')

@section('id-trans', 'ID Transaksi : '.$htrans->id_trans)

@section('table')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/google_icons.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/addons/rating.js') }}"></script>
    <style>
        .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 50px;
        }

        .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
        }

        .rating label:last-child {
        position: static;
        }

        .rating label:nth-child(1) {
        z-index: 5;
        }

        .rating label:nth-child(2) {
        z-index: 4;
        }

        .rating label:nth-child(3) {
        z-index: 3;
        }

        .rating label:nth-child(4) {
        z-index: 2;
        }

        .rating label:nth-child(5) {
        z-index: 1;
        }

        .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        }

        .rating label .icon {
        float: left;
        color: transparent;
        }

        .rating label:last-child .icon {
        color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
        color: #09f;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
        }
    </style>
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
                @if ($htrans->status == 1)
                    BERUAMH
                @endif
                    <tr>
                        <form action="/submitReview" method="post">
                            @csrf

                            <td colspan="2"><input type="text" name="pesan" id=""
                                @foreach ($review as $rev)
                                    @if ($rev->id_dtrans==$item->id_dtrans)
                                    value="{{$rev->pesan}}"
                                    @endif
                                @endforeach
                                 style="width: 100%; height: 50px"> </td>
                            <td>
                                {{-- COBA RATING --}}
                                <input type="hidden" id="rating" name="rating" value="
                                @foreach ($review as $rev)
                                    @if ($rev->id_dtrans==$item->id_dtrans)
                                    {{$rev->rating}}
                                    @endif
                                @endforeach
                                ">
                                <input type="hidden" id="id_user" name="id_user" value="{{$user->id_user}}">
                                <input type="hidden" id="id_transaksi" name="id_transaksi" value="{{$htrans->id_trans}}">
                                <input type="hidden" id="id_dtrans" name="id_dtrans" value="{{$item->id_dtrans}}">
                                <input type="hidden" id="id_barang" name="id_barang" value="{{$item->id_barang}}">
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="stars" value="1"
                                        @foreach ($review as $rev)
                                            @if ($rev->id_dtrans==$item->id_dtrans && $rev->rating==1)
                                            checked
                                            @endif
                                        @endforeach
                                        />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="2"
                                        @foreach ($review as $rev)
                                            @if ($rev->id_dtrans==$item->id_dtrans && $rev->rating==2)
                                            checked
                                            @endif
                                        @endforeach
                                        />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="3"
                                        @foreach ($review as $rev)
                                            @if ($rev->id_dtrans==$item->id_dtrans && $rev->rating==3)
                                            checked
                                            @endif
                                        @endforeach
                                        />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="4"
                                        @foreach ($review as $rev)
                                            @if ($rev->id_dtrans==$item->id_dtrans && $rev->rating==4)
                                            checked
                                            @endif
                                        @endforeach
                                        />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="5"
                                        @foreach ($review as $rev)
                                            @if ($rev->id_dtrans==$item->id_dtrans && $rev->rating==5)
                                            checked
                                            @endif
                                        @endforeach
                                        />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-danger" value="Submit Rating">
                            </td>
                        </form>

                    </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <h4>Total : Rp. {{ number_format($htrans->total) }}</h4>
    </div>
    <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
            $("#rating").val(this.value);
            // alert($("#rating").val());
        });
        </script>
@endsection
