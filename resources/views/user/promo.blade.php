@extends('templates.main-page')

@section('promo-tab', 'active')

@section('content')
    @foreach ($promos as $promo)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card" style="min-height: 26em;">
                <img src="{{ asset('image/sample_promo.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $promo->nama_promo }}</h5>
                </div>
                <div class="card-footer">
                    <a href="{{ url('promos/detail/'.$promo->id_promo) }}" class="text-danger">DETAIL</a>
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
