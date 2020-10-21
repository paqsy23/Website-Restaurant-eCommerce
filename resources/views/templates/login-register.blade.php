<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <style>
        a { color: #dc3545; }
        a:hover { color: black; }
        .card { box-shadow: 0 0 0.2em gray }
        .card-header { background-color: rgba(0, 0, 0, 0); }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-5 mt-4 py-5">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('warning'))
                    <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                @endif
                <div class="card pb-4" style="border-radius: 0.5em">
                    <div class="card-body">
                        <div class="card-title text-center">
                            @yield('title')
                        </div>
                        <div class="card-text">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    })
</script>
