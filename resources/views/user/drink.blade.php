@extends('templates.main-page')

@section('drinks-tab', 'active')

@section('content')
    @foreach ($drinks as $drink)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 32em;">
                <img src="{{ asset('image/drink_sample.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $drink->nama }}</h5>
                    <p class="card-text">
                        <span class="text-danger" style="font-weight: bold;">Rp. {{ number_format($drink->harga, 0) }}</span><br><br>
                        {{ $drink->deskripsi }}.
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
                <a class="page-link" href="{{ url('drinks/'.($pagination->page-1)) }}" tabindex="-1">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $pagination->total; $i++)
                <li class="page-item @if ($i == $pagination->page)active @endif">
                    <a class="page-link" href="{{ url('drinks/'.$i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if ($pagination->page == $pagination->total) disabled @endif">
                <a class="page-link" href="{{ url('drinks/'.($pagination->page+1)) }}">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
