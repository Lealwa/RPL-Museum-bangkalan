<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Museum Cakraningrat</title>
  <link rel="stylesheet" href="css/tiket.css">
  <style>
    .butt a{
        text-decoration:none;
        color:inherit;
    }
  </style>
</head>
<body>

<div class="container">
@include('partials.navbar')
</div>
<br><br>
<div class="div1">
    <h1 class="hhh">TIKET MUSEUM CAKRANINGRAT</h1>
    <p class="ggg">Jalan Soekarno Hatta 35, Kecamatan Bangkalan, Jawa Timur 69116, Indonesia<br>Buka : Senin - Jum'at | 08.00 - 15.00</p>
    <br>
    <p class="aaa">Berikut Adalah 2 Cara Pemesanan Tiket :</p>
</div>
<br><br><br>
<div class="container2">
    <!-- Kotak bawah kiri -->
    <div class="box">
        <img class="image" src="img/cod.png" alt="Gambar 3">
        <p class="aaa">1. Beli di Tempat</p>
        <p>Anda bisa langsung datang ke museum dan bayar di loket yang telah tersedia, tidak ada batasan umur, baik anak - anak maupun dewasa biaya masuk adalah sebesar Rp 3.000</p>
    </div>
    <!-- Kotak bawah kanan -->
    <div class="box">
        <img class="image" src="img/online.png" alt="Gambar 4">
        <p class="aaa">2. Pesan Secara Online</p>
        <p>Anda juga bisa memesannya secara online untuk menghindari antri, mempermudah dan efisien dengan biaya yang sama yakni sebesar Rp 3.000. Untuk pemesanan bisa klik di bawah ini !</p>
    </div>
    <br><br><br><br><br><br><br><br>  
</div>
<hr class="garis">
<!-- Kotak di bawah memanjang ke samping -->
<div class="box1 long-box">
    <div class="container1">
        <!-- Logo -->
        <img class="image" src="img/Icon Logo.png" alt="Logo">
        <!-- Tulisan Tiket Masuk -->
        <p class="p1">Tiket Masuk Museum Cakraningrat</p>
        <p class="p2">Jalan Soekarno Hatta 35, Kecamatan Bangkalan, Jawa Timur 69116, Indonesia</p>
        <!-- Garis Horizontal -->
        <br>
        <hr class="garis1">
        <!-- Jam Operasional -->
        <div class="operasional">
            <p>Jam Operasional :</p>
            <ul>
                <li>Senin : 08.00 - 15.00 WIB</li>
                <li>Selasa : 08.00 - 15.00 WIB</li>
                <li>Rabu : 08.00 - 15.00 WIB</li>
                <li>Kamis : 08.00 - 15.00 WIB</li>
                <li>Jum'at : 08.00 - 15.00 WIB</li>
            </ul>
        </div>
        <div class="div3">
            <!-- Harga Tiket -->
            <h3>Rp 3.000,-</h3>
            <!-- Tulisan Anak - anak / Dewasa -->
            <p class="tiket-info">(Anak - anak / Dewasa)</p>
        </div>

        <!-- Tombol Pesan Sekarang -->
        <div class="butt">
            @if(isset($user) && $user)
                <button class="p-button">
                    <a href="/pemesanan">Pesan Sekarang</a>
                </button>
            @else
                <button class="p-button" onclick="alert('Anda harus login terlebih dahulu!'); window.location.href='/login';">
                    Pesan Sekarang
                </button>
            @endif
        </div>
    </div>
</div>

@if(isset($user) && $user)
<div class="mytiket">
    <h2>Transaksi</h2>
    <table id="ongoingTransactionTable">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Jumlah Pembelian</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Transfer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pemesanan as $trans)
            @if($trans->status == '1')
            <tr>
                <td>{{ $trans->id }}</td>
                <td>{{ $trans->total_tiket }}</td>
                <td>{{ $trans->total_harga }}</td>
                <td>Belum</td>
                <td>
                    <form action="{{ route('tiket.transfer') }}" method="post">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $trans->id }}">
                        <button type="submit" name="transfer">Transfer</button>
                    </form>
                </td>
                <td class="actions">
                    <form action="{{ route('info.accept') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $trans->id }}" name="tiketID">
                        <input type="hidden" value="{{ $trans->tiket_id }}" name="IDtiket">
                        <button type="submit" name="delete">Cancel</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endif

@if(isset($user) && $user)
<div class="mytiket">
    <h2>My Tiket</h2>
    <table id="ongoingTransactionTable">
        <thead>
            <tr>
                <th>ID Trasaksi</th>
                <th>Jumlah Pembelian</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pemesanan as $trans)
            @if($trans->status == '0')
            <tr>
                <td>{{ $trans->id }}</td>
                <td>{{ $trans->total_tiket }}</td>
                <td>{{ $trans->total_harga }}</td>
                <td>Selesai</td>
                <td class="actions">
                    <form action="{{ route('info.accept') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $trans->id }}" name="tiketID">
                        <input type="hidden" value="{{ $trans->tiket_id }}" name="IDtiket">
                        <button type="submit" name="hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endif

</body>
</html>
