<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Museum Cakraningrat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 40px 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 700px;
            max-width: 90%;
        }
        .kalimat {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .gambar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .gambar img {
            max-width: 100%;
            height: auto;
            margin-right: 150px;
        }
        .form {
            width: 100%;
        }
        .form h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .input-wrapper {
            position: relative;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .input-wrapper input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 10px;
            background-color: rgb(224, 228, 231);
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 7px;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 20px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .button {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            margin-top: 20px;
        }
        .button button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .button .login {
            background-color: #4CAF50;
            color: #fff;
            height: 40px;
        }
        .button .forgot {
            background-color: #f44336;
            color: #fff;
            height: 40px;
        }
        .button .forgot a {
            text-decoration: none;
            color: #fff;
            display: block;
            text-align: center;
        }
        .reg {
            text-align: center;
            margin-top: 10px;
        }
        .reg button {
            background-color: #008CBA;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .reg button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <div class="kalimat">
            LOGIN MUSEUM CAKRANINGRAT
        </div>
        <div class="gambar">
            <img src="img/cod.png" alt="Museum Cakraningrat Logo">
        </div>
        <div class="form">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h4>Log in to Museum</h4>
                <div class="input-wrapper">
                    <label for="email">Silahkan Isi Semua Detail Email Di Bawah!</label>
                    <input type="text" name="email" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                        <p class="error">* {{ $errors->first('email') }}</p>
                    @endif
                </div>
                <hr>
                <div class="input-wrapper">
                    <input type="password" name="password" id="pass" placeholder="Password">
                    <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                    @if ($errors->has('password'))
                        <p class="error">* {{ $errors->first('password') }}</p>
                    @endif
                </div>
                <hr>
                <div class="button">
                    <button type="submit" class="login" name="login">Login</button>
                    <button type="button" class="forgot">
                        <a href="/forgot">Lupa Password?</a>
                    </button>
                </div>
            </form>
            <div class="reg">
                <label for="register">Belum Punya Akun?</label>
                <button class="register">
                    <a href="/register">Buat akun</a>
                </button>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('pass');
            const toggleIcon = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈'; // change icon to hide
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️'; // change icon to show
            }
        }
    </script>
</body>
</html>
