@extends('templates.main-page')

@section('promo-tab', 'active')

@section('content')
    @for ($i = 0; $i < 8; $i++)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card">
                <img src="{{ asset('image/sample_promo.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Promo's Title</h5>
                    <p class="card-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, cupiditate.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="">DETAIL</a>
                </div>
            </div>
        </div>
    @endfor
@endsection
