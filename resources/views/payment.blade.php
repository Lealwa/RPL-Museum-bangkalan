<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bayar Ke</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    color: #333;
  }
  .container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  .header {
    display: flex;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #ddd;
  }
  .header a {
    text-decoration: none;
    color: inherit;
    font-size: 18px;
  }
  .header h1 {
    flex-grow: 1;
    font-size: 18px;
    margin: 0;
    text-align: center;
  }
  .payment-info {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin: 20px 0;
  }
  .payment-info img {
    width: 80px;
    height: 80px;
    display: block;
    margin: 0 auto 10px auto;
  }
  .payment-info h2 {
    font-size: 20px;
    text-align: center;
    margin: 0 0 10px 0;
  }
  .price {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    margin: 10px 0;
  }
  .description {
    text-align: center;
    color: #999;
    margin: 10px 0;
  }
  .btn-container {
    text-align: center;
    margin-top: 20px;
  }
  .btn-container button {
    background-color: #00a2ff;
    color: white;
    border: none;
    padding: 15px;
    font-size: 16px;
    border-radius: 5px;
    width: 100%;
    cursor: pointer;
  }
  .btn-container button:hover {
    background-color: #005586;
  }
  select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
</style>
<script type="text/javascript">
  function closeAfterDelay() {
    setTimeout(function() {
      window.close();
    }, 3000);
  }
</script>
</head>
<body>
  <div class="container">
    <div class="header">
      <a href="#">&#x2190; Kembali</a>
    </div>
    <div class="payment-info">
      <h2>Tiket Museum Cakraningrat</h2>
    </div>
    <div class="payment-info">
      <p style="font-size: 18px; text-align: center;">Harga</p>
      <div class="price">{{ $pemesanan['total_harga'] }}</div>
      <div class="description">(Anak - anak / Dewasa)</div>
    </div>
    <div class="payment-info">
      <label for="payment-method" style="font-size: 18px;">Pilih Metode Pembayaran:</label>
      <select name="payment-method" id="payment-method">
        <option value="bank">Transfer Bank</option>
        <option value="dana">Dana</option>
        <option value="ovo">OVO</option>
        <option value="gopay">GoPay</option>
        <option value="shopeepay">ShopeePay</option>
      </select>
    </div>
    <div class="btn-container">
      <form action="{{ route('payment.bayar') }}" method="post" onsubmit="closeAfterDelay()">
        @csrf
        <input type="text" name="total_harga" value="{{ $pemesanan['total_harga'] }}" hidden>
        <input type="text" name="pemesanan_id" value="{{ $pemesanan['id'] }}" hidden>
        <button type="submit" name="bayar">Bayar Sekarang</button>
      </form>
    </div>
  </div>
</body>
</html>
