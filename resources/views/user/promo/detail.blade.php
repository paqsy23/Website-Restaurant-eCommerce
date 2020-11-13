@extends('templates.detail-page')

@section('title', $promo->nama_promo)

@section('content')
    <span style="color: #6c757d">Promo diskon {{ $promo->potongan_harga }}%</span><br><br>
    {{ $promo->detail }} <br><br>
    <span style="font-weight: bold">Syarat dan Ketentuan:</span><br>
    @foreach ($syarat as $item)
        - {{ $item }} <br>
    @endforeach
@endsection
