<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Detail Pesanan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .detail-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .detail-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-item label {
            font-weight: bold;
        }
    </style>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
  {{-- src="https://app.sanbox.midtrans.com/snap/snap.js" --}}
  src="{{config('midtrans.url_snap')}}"
data-client-key="{{config('midtrans.server_key')}}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>
<body>
    <div class="container">
        <div class="detail-container">
            <h2>Detail Pesanan</h2>
            <div class="detail-item">
                <label for="name">Nama:</label>
                <span id="name">{{$order->name}}</span>
            </div>
            <div class="detail-item">
                <label for="phone">Telepon:</label>
                <span id="phone">{{$order->phone}}</span>
            </div>
            <div class="detail-item">
              <label for="phone">Alamat:</label>
              <span id="address">{{$order->address}}</span>
          </div>
            <div class="detail-item">
                <label for="qty">Kuantitas:</label>
                <span id="qty">{{$order->qty}}</span>
            </div>
            <div class="detail-item">
                <label for="total_price">Total Harga:</label>
                <span id="total_price">{{$order->total_price}}</span>
            </div>
            <div class="detail-item">
                <label for="status">Status:</label>
                <span id="status">{{$order->status}}</span>
            </div>
            <button class="btn-success" id="pay-button">Bayar Sekarang</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            window.location.href ='/invoice/{{$order->id}}';
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
</html>
