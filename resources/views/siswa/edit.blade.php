<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil Siswa</title>
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

        .edit-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: left;
            width: 400px;
        }

        .edit-container h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .edit-container label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .edit-container input,
        .edit-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-container button:hover {
            background-color: #0056b3;
        }

        .edit-container .back {
            background-color: #6c757d;
        }

        .edit-container .back:hover {
            background-color: #5a6268;
        }

        .profile-preview img {
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="edit-container">
        <h1>Edit Profil Siswa</h1>

        <!-- Menampilkan Pesan Sukses -->
        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


        <!-- Form Edit Profil -->
        <form action="{{ route('siswa.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="form-group">
                <label for="profile_picture">Foto Profil</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
            </div>

            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('siswa.content') }}">
                <button type="button" class="back">Kembali</button>
            </a>

        </form>

    </div>

</body>

</html>
