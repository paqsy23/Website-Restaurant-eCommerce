@extends('templates.main-page')

@section('main-dishes-tab', 'active')

@section('content')
    @for ($i = 0; $i < 8; $i++)
        <div class="col-6 col-md-4 col-lg-3 mt-3">
            <div class="card">
                <img src="{{ asset('image/main_dish_sample.jpg') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Menu's Title</h5>
                    <p class="card-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, cupiditate. <br><br>
                        <span class="text-danger" style="font-weight: bold;">Rp. {{ rand(15000, 25000)}}</span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="text-danger">ADD TO CART</a>
                </div>
            </div>
        </div>
    @endfor
@endsection
