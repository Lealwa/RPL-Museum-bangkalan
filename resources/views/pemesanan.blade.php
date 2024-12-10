<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pemesanan.css">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        div a{
            text-decoration:none;
            color:inherit;  
        }
        .container {
            padding: 20px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="/tiket" class="back-button">&#x2190; Kembali</a>
        <h3>Detail Pesanan</h3>
        <div class="box">
            <img class="image" src="img/Icon Logo.png" alt="Logo">
            <h4>Paket Terpilih</h4>
            <p>[ Tiket Masuk Museum Cakraningrat ]</p>
            <h2>Rp 3.000,-</h2>
        </div>
        <p class="jumlah-tiket">Jumlah Tiket</p>

        <div class="box1">
            <span class="span1">
                <p>Harga</p>
                <h4>Rp 3.000,-/ pax</h3>
            </span>
            <span class="span1">
                <p id="tiket">Tiket Tersedia : {{ ($tiket[0]->total_tiket - 1) }} pcs</p>
                <button onclick="increase()" id="increase">+</button>
                <p class="angka" id="angka"> 1 </p>
                <button onclick="decrease()" id="decrease">-</button>
            </span>
        </div>
    </div>

    <div class="container1">
        <div id="pax">
            Total (1 pax):
        </div>
        <div>
            <form action="{{ route('pemesanan') }}" method="POST">
                @csrf
                <input type="text" id="bayar" name="bayar" value="3000" readonly>
                <button type="submit">Bayar Sekarang</button>
            </form>
        </div>
    </div>

<script>
    let counter = 1;
    let total = <?php echo $tiket[0]->total_tiket - 1; ?>;
    let bayar = 3000;
    function increase(){
        if(counter < 20){
            counter++
            total--
            document.getElementById('tiket').innerText = "Tiket Tersedia : "+ total +" pcs";
            document.getElementById('pax').innerText = "Total ( " + counter + " pax):";
            document.getElementById('angka').innerText = counter;
            document.getElementById('bayar').value = bayar*counter;
        }
    }
    function decrease(){
        if(counter > 1){
            counter--
            total++
            document.getElementById('tiket').innerText = "Tiket Tersedia : "+ total +" pcs";
            document.getElementById('pax').innerText = "Total ( " + counter + " pax):";
            document.getElementById('angka').innerText = counter;
            document.getElementById('bayar').value = bayar*counter;
        }
    }

</script>
</body>
</html>
