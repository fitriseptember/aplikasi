<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata dasar untuk HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>

    <!-- Gaya CSS untuk styling tampilan -->
    <style>
        /* Mengatur tampilan body halaman */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(120deg, #a8d8ea, #ffffff); /* Gradien warna */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 700px;
            margin: 0;
        }

        /* Pengaturan kontainer utama */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            border-radius: 8px; /* Sudut melengkung */
        }

        /* Gaya untuk judul */
        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }

        /* Gaya untuk grup form */
        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        /* Gaya label form */
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }

        /* Gaya input form */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%; /* Lebar penuh */
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc; /* Warna border abu-abu */
            border-radius: 8px; /* Sudut melengkung */
            background-color: #f9f9f9; /* Warna latar */
            transition: all 0.3s ease;
        }

        /* Gaya tombol submit */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: #695CFE; /* Warna utama */
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer; /* Kursor berubah menjadi pointer */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efek hover tombol */
        button[type="submit"]:hover {
            background-color: #8881d4; /* Warna hover */
            transform: scale(1.02); /* Efek pembesaran */
        }

        /* Gaya pesan error */
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin: 12px 0;
            text-align: left;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>

    <!-- Script untuk menampilkan/menyembunyikan field tambahan berdasarkan role -->
    <script>
        function toggleAdditionalFields() {
            const roleSelect = document.getElementById('role'); // Ambil elemen role
            const partnerField = document.getElementById('partner-field'); // Field untuk mentor
            const teacherField = document.getElementById('teacher-field'); // Field untuk guru

            // Jika role adalah siswa, tampilkan field tambahan
            if (roleSelect.value === 'siswa') {
                partnerField.style.display = 'block';
                teacherField.style.display = 'block';
            } else {
                partnerField.style.display = 'none';
                teacherField.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <!-- Extend layout dari admin.dashboard -->
    @extends('admin.dashboard')

    <!-- Menentukan judul halaman -->
    @section('title', 'Absensi Siswa')

    <!-- Bagian konten -->
    @section('content')
        <div class="container">
            <!-- Judul form -->
            <h1>Tambah Akun</h1>

            <!-- Menampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li> <!-- Pesan error -->
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form untuk tambah akun -->
            <form action="{{ route('akun.store') }}" method="POST">
                @csrf <!-- Token untuk proteksi CSRF -->

                <!-- Input nama lengkap -->
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <!-- Input username -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>

                <!-- Input password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>

                <!-- Input email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                </div>

                <!-- Pilihan role -->
                <div class="form-group">
                    <label for="role">Peran:</label>
                    <select id="role" name="role" required>
                        <option value="guru">Guru</option>
                        <option value="mentor">Mentor</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <!-- Pilihan gender -->
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Tombol submit -->
                <button type="submit">Tambah Akun</button>
            </form>
        </div>
    @endsection
</body>
</html>
