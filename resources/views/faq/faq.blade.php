@extends("templates/makanan")

@section('title')
    <h2>FAQ</h2>
@endsection

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="card" style="width: 100%; height: auto;">
        <div class="card-body">
            <div class="container">
                <h4>Alamatnya berada dimana?</h4>
                <a href="#alamat" class="btn btn-info" data-toggle="collapse">Answer</a>
                <div id="alamat" class="collapse">
                    <br>
                  Alamat kami berada di Jl. Ngagel Jaya Tengah No.73-77, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284. Untuk maps bisa langsung klik link dibawah ini.
                  <br>
                  <a href="https://www.google.com/maps/place/Institut+Sains+dan+Teknologi+Terpadu+Surabaya/@-7.291306,112.758829,15z/data=!4m5!3m4!1s0x0:0x5f5f7cf736ae643e!8m2!3d-7.291306!4d112.758829">Go to Gmaps</a>
                </div>
              </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; height: auto;">
        <div class="card-body">
            <div class="container">
                <h4>Apakah Stock Ready?</h4>
                <a href="#stock" class="btn btn-info" data-toggle="collapse">Answer</a>
                <div id="stock" class="collapse">
                    <br>
                    Untuk ketersediaan stock sesuai dengan deskripsi.
                </div>
              </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; height: auto;">
        <div class="card-body">
            <div class="container">
                <h4>Bagaimana sistem pengirimannya?</h4>
                <a href="#pengiriman" class="btn btn-info" data-toggle="collapse">Answer</a>
                <div id="pengiriman" class="collapse">
                    <br>
                    Untuk pengiriman akan dikirimkan melalui kurir kami dan semuanya free ongkir.
                    <br>
                </div>
              </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; height: auto;">
        <div class="card-body">
            <div class="container">
                <h4>Apakah bisa kirim ke luar kota?</h4>
                <a href="#kota" class="btn btn-info" data-toggle="collapse">Answer</a>
                <div id="kota" class="collapse">
                    <br>
                    Untuk sementara kami hanya melayani yang berada di area kota yang tersedia saja. Jadi tunggu cabang kami di kotamu.
                    <br>
                </div>
              </div>
        </div>
    </div>

</body>
</html>
@endsection
