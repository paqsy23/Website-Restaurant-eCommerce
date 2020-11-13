@extends('templates.main-page')

@section('content')
    {{-- Promo --}}
    <div class="col-sm-12 row d-flex h-50 mt-4">
        <div class="col-6">
            <h3>Hot Promo</h3>
        </div>
        <div class="col-6 text-right align-self-center">
            <a href="{{ url('promos') }}">See all promos</a>
        </div>
        <div class="col-sm-12 dropdown-divider"></div>
    </div>

    @foreach ($promos as $promo)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 25em;">
                <img src="{{ asset('image/sample_promo.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <a href="{{ url('promos/detail/'.$promo->id_promo) }}" class="stretched-link"><h5 class="card-title">{{ $promo->nama_promo }}</h5></a>
                </div>
            </div>
        </div>
    @endforeach


    {{-- Popular Menus --}}
    <div class="col-sm-12 row d-flex h-50 mt-4">
        <div class="col-sm-6">
            <h3>Most Popular Menus</h3>
        </div>
        <div class="col-sm-12 dropdown-divider"></div>
    </div>

    @foreach ($populars as $popular)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 25em;">
                {{-- Image --}}
                @if ($popular->jenis == 'main dish')
                    <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img">
                @elseif ($popular->jenis == 'dessert')
                    <img src="{{ asset('image/dessert_sample.jpg') }}" alt="" class="card-img">
                @elseif ($popular->jenis == 'drink')
                    <img src="{{ asset('image/drink_sample.jpg') }}" alt="" class="card-img">
                @endif
                <div class="card-body">
                    @if ($popular->jenis == 'main dish')
                        <a href="{{ url('main-dishes/detail/'.$popular->id_barang) }}" class="stretched-link">
                    @else
                        <a href="{{ url($popular->jenis.'s/detail/'.$popular->id_barang) }}" class="stretched-link">
                    @endif
                    <h5 class="card-title">{{ $popular->nama }}</h5></a>
                    <p class="card-text">
                        <span class="text-danger" style="font-weight: bold;">Rp. {{ number_format($popular->harga, 0) }}</span>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
