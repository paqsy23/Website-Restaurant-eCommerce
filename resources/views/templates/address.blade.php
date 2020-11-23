<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/google_icons.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <style>
        .card.active {
            border-color: #dc3545;
        }

        .btn-outline-dark:hover {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
        }

        .btn-link {
            background-color: transparent;
            border: 0px transparent;
            font-weight: bold;
            padding: 0;
            margin-right: 2em;
        }

        .btn-link:hover {
            text-decoration: none;
            cursor: pointer;
        }

        .btn-link: {
            box-shadow: 0px transparent;
            text-decoration: none;
            border: 0px transparent;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
