<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Montserrat:wght@700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            animation: fadeIn 1s ease;
            /* Animasi fade-in untuk seluruh halaman */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 350px;
            width: 100%;
            text-align: center;
            animation: float 3s ease-in-out infinite;
            /* Animasi mengambang */
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
                /* Menaikkan kolom login */
            }
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            position: relative;
            display: inline-block;
        }

        /* Animasi sederhana untuk kata "Login" */
        h2::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: #ff6666;
            bottom: -8px;
            left: 0;
            border-radius: 4px;
            animation: slideIn 1s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            font-size: 14px;
            transition: border-color 0.3s;
            /* Transisi border pada fokus */
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ff6666;
            /* Warna border saat fokus */
            outline: none;
            /* Menghilangkan outline default */
        }

        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            font-size: 14px;
            transition: border-color 0.3s;
            /* Transisi border pada fokus */
        }

        select:focus {
            border-color: #ff6666;
            /* Warna border saat fokus */
            outline: none;
            /* Menghilangkan outline default */
        }

        .login-btn {
            background-color: #555;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            /* Tambah transisi transform */
        }

        .login-btn:hover {
            background-color: #333;
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }

        .forgot-password {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
            color: #1e06f5;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        p {
            margin-top: 20px;
        }

        .signup-link {
            color: #1e06f5;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        /* Background Pattern */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.1;
            pointer-events: none;
            /* Menambahkan ini agar tidak menghalangi interaksi */
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <!-- Dropdown untuk memilih role -->
            <select name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
            </select>

            <button class="login-btn" type="submit">Masuk</button>
            <a href="/forgot-password" class="forgot-password">Lupa Kata Sandi?</a>
        </form>

        <p>Tidak punya akun? <a href="/register" class="signup-link">Buat akun baru</a></p>
    </div>
</body>

</html>
