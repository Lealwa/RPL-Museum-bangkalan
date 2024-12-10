<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <title>Museum Cakraningrat</title>
  <link rel="stylesheet" href="css/akun.css">
</head>
<body>
  <div class="container">
  @include('partials.navbar')
  </div>
  
  <div class="container1">
    <div class="profil">
      <h1>PROFIL PENGGUNA</h1>
    </div>
    <div class="gambar">
      <img src="img/profil.png" alt="" class="img">
      <h3>User</h3>
      <span>ID : </span>
      <span>{{ $user['id'] }}</span>
    </div>
    <div class="isi">
      <h3>Edit Your Profile</h3>
      <form action="post" class="keterangan">
        <div class="name">
          <label for="name">Nama : </label><br>
          <input type="text" name="name" value="{{ $user['name'] }}" id="name">
        </div>
        <div class="email">
          <label for="email">Email : </label><br>
          <input type="text" name="email" id="email" value="{{ $user['email'] }}">
        </div>
        <div class="no">
          <label for="no">No WA: </label><br>
          <input type="text" name="no" id="no" value="{{ $user['no'] }}">
        </div>
      </form>
      <form action="{{ route('akun.store') }}" class="password" method="POST">
        @csrf
        <div class="pass">
          <label for="password" >Ganti Password</label><br>
          <input type="text" name="old_pass" placeholder="Password Saat Ini"><br>
          @error('old_pass')
          <p>*{{ $message }}</p>
          @enderror
          <input type="password" name="new_pass" placeholder="Password Baru"><br>
          @error('new_pass')
          <p>*{{ $message }}</p>
          @enderror
          <input type="password" name="confirm_pass" placeholder="Ulangi Password">
          @error('confirm_pass')
          <p>*{{ $message }}</p>
          @enderror
          <div class="button">
            <span><button type="reset" class="batal" name="batal">Batal</button></span>
            <span><button type="submit" class="simpan" name="simpan">Simpan</button></span>
          </div>
        </div>
      </form>
    </div>
    <div class="logout">
      <form action="{{ route('akun.logout') }}" method="post">
        @csrf
        <button type="submit" name="logout">Log Out</button>
      </form>
    </div>
  </div>



</body>
</html>
