<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Museum Cakraningrat</title>
  <link rel="stylesheet" href="css/register.css">
  <script>
    function validatePassword() {
      const password = document.getElementById('pass').value;

      // Regular expression untuk memeriksa minimal 6 karakter dengan campuran huruf kecil, besar, dan angka
      const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

      if (!regex.test(password)) {
        alert('Password harus terdiri dari minimal 6 karakter dengan campuran huruf kecil, besar, dan angka.');
        return false; // Menghentikan pengiriman form
      }

      return true; // Lanjutkan pengiriman form
    }
  </script>
</head>
<body>
@include('partials.navbar')
    <div class="container">
        <div class="kalimat">
            REGISTER MUSEUM CAKRANINGRAT
        </div>
        <div class="isi">
            <span class="gambar">
                <img src="img/cod.png" alt="">
            </span>
            <span class="form">
                <form action="{{ route('register') }}" method="POST" onsubmit="return validatePassword()">
                    @csrf
                    <h4>Buat Akun</h4>
                    <div class="pengisian">
                        <label for="email">
                            Silahkan Isi Semua Detail Di Bawah!
                        </label><br>
                        <input type="text" name="nama" id="nama" placeholder="Nama">
                        <hr>
                        @error('nama')
                        <p>*{{ $message }}</p>
                        @enderror
                        <input type="text" name="email" id="email" placeholder="Email">
                        <hr>
                        @error('email')
                        <p>*{{ $message }}</p>
                        @enderror
                        <input type="text" name="no" id="no" placeholder="No Wa">
                        <hr>
                        @error('no')
                        <p>*{{ $message }}</p>
                        @enderror
                        <input type="password" name="pass" id="pass" placeholder="Password">
                        <hr>
                        @error('pass')
                        <p>*  {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="button">
                        <button type="submit" class="login">Buat Akun</button>
                    </div>
                </form>
                <div class="signup">
                  <button type="button" class="google">
                    <span>
                      <img src="img/google.png" alt="">
                    </span>
                    <span>
                      <a href="#">Sign up with Google</a>
                    </span>
                  </button>
                </div>
            </span>
        </div>
    </div>

</body>
</html>
