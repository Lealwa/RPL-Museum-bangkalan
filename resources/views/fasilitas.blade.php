<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Display</title>
    <style>
        /* Gaya utama untuk kontainer dan teks */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container1{
          margin-bottom:100px;
        }
        .container {
            max-width: 800px;
            height:700px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .map-container {
            display: none; /* Sembunyikan kontainer peta secara default */
            margin-bottom: 20px;
        }
        .map-container.active {
            display: block; /* Tampilkan kontainer peta saat aktif */
        }
        .map-buttons {
            text-align: center;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            margin: 10px 0; /* Beri margin atas dan bawah */
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
  <div class="container1">
  @include('partials.navbar')
  </div>
    <div class="container">
        <h2>Fasilitas Museum Cakraningrat</h2>

        <!-- Tombol untuk menampilkan peta -->
        <div class="map-buttons">
            <button onclick="toggleMap('masjid')">Tampilkan Peta Masjid</button>
            <button onclick="toggleMap('rumah_sakit')">Tampilkan Peta Rumah Sakit</button>
            <button onclick="toggleMap('pom_bensin')">Tampilkan Peta Pom Bensin</button>
            <button onclick="toggleMap('apotek')">Tampilkan Peta Apotek</button>
            <button onclick="toggleMap('cafe')">Tampilkan Peta Cafe</button>
        </div>

        <!-- Kontainer untuk peta-peta -->
        <div id="masjid-map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13318.784050642345!2d112.72793016789036!3d-7.044709610597622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd80529310f1d03%3A0xa4810359bc232e87!2sMasjid%20Baiturrachim%20Perumda%20Bangkalan!5e0!3m2!1sid!2sid!4v1718906208720!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="rumah_sakit-map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.623085074125!2d112.71414441432135!3d-7.049674614268506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805c305ecf50f%3A0x79ff9f7e3ebc3566!2sRSU%20Anna%20Medika%20Madura!5e0!3m2!1sid!2sid!4v1718906350346!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="pom_bensin-map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11199.611395793907!2d112.727050823354!3d-7.049111656564514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805eadc0eec11%3A0x944f76e8b5949005!2sSPBU%20Pertamina%2054.691.04!5e0!3m2!1sid!2sid!4v1718906448395!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="apotek-map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.623085074125!2d112.71414441432135!3d-7.049674614268506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805c305ecf50f%3A0x79ff9f7e3ebc3566!2sRSU%20Anna%20Medika%20Madura!5e0!3m2!1sid!2sid!4v1718906350346!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="cafe-map" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.8293876350908!2d112.73597666737697!3d-7.049323110203295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805da59fac17b%3A0xd7ad3f59ec419cfe!2sCafe%20dan%20resto%20F3N!5e0!3m2!1sid!2sid!4v1718907152376!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan atau menyembunyikan peta berdasarkan id kontainer
        function toggleMap(id) {
            // Ambil semua kontainer peta
            var mapContainers = document.querySelectorAll('.map-container');
            
            // Iterasi untuk menyembunyikan semua kontainer peta
            mapContainers.forEach(function(container) {
                container.classList.remove('active');
            });
            
            // Tampilkan kontainer peta yang sesuai dengan id
            var mapContainer = document.getElementById(id + '-map');
            mapContainer.classList.add('active');
        }
    </script>
</body>
</html>
