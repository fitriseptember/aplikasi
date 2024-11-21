<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            /* Warna latar belakang lembut */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            /* Latar belakang putih untuk form */
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
            /* Lebar form */
        }

        .login-container h2 {
            font-size: 32px;
            /* Ukuran tulisan diperbesar */
            font-weight: bold;
            margin-bottom: 30px;
            color: #000000;
            /* Warna hitam */
        }

        .input-container {
            position: relative;
            margin-bottom: 25px;
        }

        .input-container input {
            width: 100%;
            padding: 15px;
            border: 1px solid #cccccc;
            border-radius: 30px;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
        }

        .input-container input:focus {
            border-color: #6c5ce7;
            /* Border fokus ungu */
            box-shadow: 0 0 5px rgba(108, 92, 231, 0.5);
            /* Shadow ungu */
        }

        .button-container button {
            background-color: #6c5ce7;
            /* Tombol ungu */
            color: white;
            border: none;
            border-radius: 30px;
            padding: 15px 20px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
        }

        .button-container button:hover {
            background-color: #5a4fcf;
            /* Warna hover lebih gelap */
        }

        .forgot-password {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #6c5ce7;
            /* Warna teks ungu */
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <h2>Login</h2>

            <!-- Display error message -->
            @if ($errors->has('login_error'))
            <div class="error-message">
                {{ $errors->first('login_error') }}
            </div>
            @endif

            <div class="input-container">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-container">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="button-container">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
