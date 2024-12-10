<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Museum Cakraningrat</title>
  <link rel="stylesheet" href="css/home.css">
</head>
<body>
<div class="container">
  @include('partials.navbar')
  <!-- Navigasi -->
  <br><br>
  <p class="y">Bangkalan, Madura</p>
  <!-- Logo -->
  <img class="logo" src="img/Icon Logo.png" alt="Logo">
  <br>
  <!-- Tulisan Museum -->
  <h1 class="museum-name">Museum Cakraningrat</h1>
  <!-- Tombol Mulai Jelajah -->
  <button class="start-button">
    <a href="#jelajah">Mulai Jelajah</a>
  </button>
</div>

  <!-- Konten Sejarah Museum dan Gambar Museum -->
  <div class="content-container">
    <!-- Konten Sejarah Museum -->
    <div class="content" id="jelajah">
      <h2>Jelajahi Sejarah Madura<br>Museum Cakraningrat.</h2>
      <p>Selamat datang di Museum Cakraningrat, jendela menuju kekayaan sejarah Madura. Temukan pesona zaman dulu dalam koleksi kami yang memikat. Dari senjata kuno hingga karya seni yang indah, setiap sudut museum ini menyimpan cerita yang mengagumkan. Ikuti kami dalam petualangan budaya melalui pameran seni dan lokakarya yang menarik. Mari bersama-sama mengungkap misteri dan keajaiban warisan Madura di Museum Cakraningrat.</p>
    </div>
    <!-- Gambar Museum -->
    <div class="content">
      <img id="gam" src="img/Group 34.png" alt="Museum Cakraningrat">
    </div>
  </div>
  <h1 class="hhh">SEJARAH</h1>
  <div class="content-container1">
    <!-- Gambar Museum -->
    <div class="content1">
      <img id="gam1" src="img/Rectangle 18.png" alt="Museum Cakraningrat">
    </div>
    <!-- Konten Sejarah Museum -->
    <div class="content1">
      <p class="ukur">Museum Cakraningrat di Bangkalan, Madura, adalah sebuah institusi budaya yang mengabadikan sejarah dan warisan kebudayaan yang kaya di wilayah tersebut. Dibangun di kompleks yang dulunya adalah kediaman resmi keluarga kerajaan Bangkalan, museum ini tidak hanya menjadi tempat penyimpanan benda-benda bersejarah, tetapi juga menjadi sebuah pusat pembelajaran dan penelitian bagi masyarakat setempat dan pengunjung dari luar daerah.</p>
      <button class="p-button">
        <a href="/sejarah">
          Baca Selengkapnya
        </a>
      </button>
          
    </div>
  </div>

  <div class="additional-content">
    <h1 class="hhh">GALERI</h1>
    <br><br>
    <div class="container2">
        <div class="box">
            <img class="image" src="img/Group 17.png" alt="Gambar 1">
            <p>Judang</p>
        </div>
        <div class="box">
            <img class="image" src="img/Group 18.png" alt="Gambar 2">
            <p>Gamelan Ratna Dumilah</p>
        </div>
        <div class="box">
            <img class="image" src="img/Group 19.png" alt="Gambar 3">
            <p>Kreasi Tanah Liat</p>
        </div>
        <div class="box">
            <img class="image" src="img/Group 20.png" alt="Gambar 4">
            <p>Alat Musik Tuk Tuk</p>
        </div>
        <div class="box">
            <img class="image" src="img/Group 21.png" alt="Gambar 5">
            <p>Alat Musik Gesek & Petik</p>
        </div>
        <div class="box">
          <div class="box1"></div>
            <div class="image-container">
              <img class="imageh" src="img/Group 22.png" alt="Gambar 6">
              <div class="overlay">
                <p class="overlay-text">
                  <a href="/galeri">
                    Lihat Selengkapnya
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  @include('partials.footer')

</body>
</html>
