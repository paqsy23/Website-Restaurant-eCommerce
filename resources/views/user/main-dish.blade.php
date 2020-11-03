@extends('templates.main-page')

@section('main-dishes-tab', 'active')

@section('content')
    @foreach ($main_dishes as $main_dish)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 32em;">
                <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $main_dish->nama }}</h5>
                    <p class="card-text">
                        <span class="text-danger" style="font-weight: bold;">Rp. {{ number_format($main_dish->harga, 0) }}</span><br><br>
                        {{ $main_dish->deskripsi }}.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="text-danger">ADD TO CART</a>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <nav class="col-12 mt-4" aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item @if ($pagination->page == 1) disabled @endif">
                <a class="page-link" href="{{ url('main-dishes/'.($pagination->page-1)) }}" tabindex="-1">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $pagination->total; $i++)
                <li class="page-item @if ($i == $pagination->page)active @endif">
                    <a class="page-link" href="{{ url('main-dishes/'.$i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if ($pagination->page == $pagination->total) disabled @endif">
                <a class="page-link" href="{{ url('main-dishes/'.($pagination->page+1)) }}">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
