<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(120deg, #a8d8ea, #ffffff); /* Gradiasi pastel biru */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90%;
            margin: 0;
        }
        .container {
        background-color: #ffffff;
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        max-width: 400px; /* Ukuran kolom tetap kecil */
        width: 70%;
        margin: auto; /* Pusatkan secara vertikal dan horizontal */
        text-align: center;
        height: 90%; /* Hilangkan nilai tetap untuk tinggi */
        box-sizing: border-box;
        }


        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: #a8d8ea;
            background-color: #ffffff;
            outline: none;
            box-shadow: 0 0 6px rgba(168, 216, 234, 0.5);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
            transform: scale(1.02);
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin: 15px 0;
            text-align: left;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Akun</h1>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('akun.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group">
                <label for="role">Peran:</label>
                <select id="role" name="role" required>
                    <option value="guru">Guru</option>
                    <option value="mitra">Mitra</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <button type="submit">Tambah Akun</button>
        </form>
    </div>
</body>
</html>
