<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Reset Password</title>
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

        .form input[type="text"],
        .form input[type="password"] {
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

    <div class="container">
        <div class="kalimat">
            RESET PASSWORD
        </div>
        <div class="isi">
            <span class="form">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="pengisian">
                        <label for="email">Email</label><br>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email"><br>
                        @error('email')
                            <p class="error">* {{ $message }}</p>
                        @enderror
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Password"><br>
                        @error('password')
                            <p class="error">* {{ $message }}</p>
                        @enderror
                        <label for="password-confirm">Konfirmasi Password</label><br>
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="Konfirmasi Password"><br>
                        @error('password_confirmation')
                            <p class="error">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="button">
                        <button type="submit" class="login" name="reset">Reset Password</button>
                    </div>
                </form>
            </span>
        </div>
    </div>
</body>
</html>
