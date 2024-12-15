<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Mentor</title>
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
            padding: 30px;
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
            object-position: center;
            image-rendering: crisp-edges;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .profile-container img:hover {
            transform: scale(1.05);
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

        .btn-group {
            margin-top: 20px;
        }

        .btn-group button {
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

        .btn-group button:hover {
            background-color: #0056b3;
        }

        .btn-group .back {
            background-color: #6c757d;
        }

        .btn-group .back:hover {
            background-color: #5a6268;
        }

        input[type="file"] {
            display: none;
        }

        label[for="profile_picture"] {
            cursor: pointer;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Form for uploading the profile picture -->
        <form action="{{ route('mitra.updatePhoto', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Picture -->
            <label for="profile_picture">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil">
            </label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="this.form.submit()">
        </form>

        <!-- User Information -->
        <h1>{{ $user->nama_lengkap ?? 'Nama Tidak Diketahui' }}</h1>
        <p><strong>Email:</strong> {{ $user->email ?? 'Email Tidak Diketahui' }}</p>
        <p><strong>Gender:</strong> {{ $user->gender ?? 'Tidak Tersedia' }}</p>

        <!-- Action Buttons -->
        <div class="btn-group">
            <a href="{{ route('mitra.edit', $user->id) }}">
                <button type="button">Edit</button>
            </a>
            <a href="{{ route('mitra.content') }}">
                <button type="button" class="back">Kembali</button>
            </a>
        </div>
    </div>
</body>

</html>
