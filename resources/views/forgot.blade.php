<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Lupa Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .kalimat {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form input[type="text"] {
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form .button {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form .button button {
            padding: 0.5rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .form .button button:hover {
            background-color: #0056b3;
        }

        .form .button .register {
            background-color: #6c757d;
        }

        .form .button .register a {
            color: #fff;
            text-decoration: none;
            display: block;
            width: 100%;
        }

        .form .button .register:hover {
            background-color: #5a6268;
        }

        .error {
            color: red;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .success {
            color: green;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    @include('partials.navbar')
    <div class="container">
        <div class="kalimat">
            LUPA PASSWORD
        </div>
        <div class="isi">
            <span class="form">
                <form action="{{ route('forgot.forget') }}" method="POST">
                    @csrf
                    <h4>Reset Password Anda</h4>
                    <div class="pengisian">
                        <label for="email">Masukkan Email Anda di Bawah!</label><br>
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                        @if (session('status'))
                            <p class="success">{{ session('status') }}</p>
                        @endif
                        @error('email')
                            <p class="error">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="button">
                        <button type="submit" class="login" name="reset">Kirim Link Reset</button>
                        <button type="button" class="register">
                            <a href="/login">Kembali ke Login</a>
                        </button>
                    </div>
                </form>
            </span>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var emailInput = document.getElementById('email');
            var emailValue = emailInput.value;
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(emailValue)) {
                event.preventDefault();
                alert('Masukkan email yang valid.');
            }
        });
    </script>
</body>
</html>
