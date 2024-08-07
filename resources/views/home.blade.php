<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Buah-Buahan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            width: 18rem;
            margin: 20px;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            text-align: center;
        }
        .btn-checkout {
            background-color: #28a745;
            color: white;
        }
        .form-container {
            margin: 20px auto;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Penjualan Buah-Buahan</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/15/Red_Apple.jpg" class="card-img-top" alt="Apel">
                    <div class="card-body">
                        <h5 class="card-title">Apel</h5>
                        <p class="card-text">Harga: Rp <span id="harga-apel"></span>15.000</p>
                        <form action="/checkout" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Mau Pesan Berapa ?</label>
                                <input type="text" class="form-control" name="qty" id="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Nama  Pelanggan</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input type="text" class="form-control" name="phone" id="phone" required>
                            </div>

                            <div class="form-group">
                                <label for="total_price">Alamat</label>
                                <input type="text" class="form-control" name="address" id="address" >
                            </div>
                            <button type="submit" class="btn btn-primary">Check Out</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Hapus_Mango.jpg" class="card-img-top" alt="Mangga">
                    <div class="card-body">
                        <h5 class="card-title">Mangga</h5>
                        <p class="card-text">Harga: Rp <span id="harga-mangga"></span></p>
                        <a href="#form-checkout" class="btn btn-success btn-checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-container">
            <h2 id="form-checkout" class="text-center">Form Checkout</h2>
            
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
