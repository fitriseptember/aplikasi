<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Siswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }

        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #007bff;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .profile-container h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 8px;
        }

        .profile-container p {
            margin: 10px 0;
            font-size: 14px;
            color: #444;
        }

        .profile-container p strong {
            color: #007bff;
        }

        .profile-container .btn-group {
            margin-top: 20px;
        }

        .profile-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-container button:hover {
            background-color: #0056b3;
        }

        .profile-container button.back {
            background-color: #6c757d;
        }

        .profile-container button.back:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Gambar Profil -->
        <img src="https://via.placeholder.com/150" alt="Profile Picture">

        <!-- Informasi Nama -->
        <h1>{{ $user->nama_lengkap ?? 'Nama Tidak Diketahui' }}</h1>

        <!-- Detail Informasi -->
        <p><strong>Email:</strong> {{ $user->email ?? 'Email Tidak Diketahui' }}</p>
        <p><strong>Gender:</strong> {{ $user->gender ?? 'Tidak Tersedia' }}</p>

        <!-- Tombol -->
        <div class="btn-group">
            <a href="{{ route('siswa.edit', $user->id) }}">
                <button type="button">Edit</button>
            </a>
            <a href="{{ route('siswa.dashboard') }}">
                <button class="back">Kembali</button>
            </a>
        </div>
    </div>
</body>

</html>
