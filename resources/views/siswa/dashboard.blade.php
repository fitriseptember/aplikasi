<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Admin Monitoring PKL</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #ffffff;
            display: flex;
            height: 100vh;
        }

        /* Navbar */
        .navbar-top {
            width: 100%;
            background-color: #2f3640;
            color: #f5f6fa;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar-top .logo-top {
            width: 40px;
            border-radius: 50%;
            position: absolute;
            left: 20px;
        }

        .navbar-top .navbar-title {
            font-size: 1.2em;
            font-weight: 600;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2f3640;
            color: #f5f6fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 60px;
            position: fixed;
            top: 20px;
            height: calc(100% - 60px);
        }

        .sidebar .logo {
            width: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .navbar ul li {
            width: 100%;
            text-align: center;
            margin: 15px 0;
        }

        .navbar ul li a {
            display: block;
            color: #f5f6fa;
            font-weight: 600;
            padding: 10px 0;
            text-decoration: none;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .navbar ul li a:hover {
            background-color: #00a8ff;
        }

        .profile-container {
            position: absolute;
            bottom: 20px;
            text-align: center;
            width: 100%;
        }

        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px solid #f5f6fa;
        }

        .profile-container a {
            display: block;
            color: #f5f6fa;
            padding: 8px 0;
            text-decoration: none;
            font-weight: 600;
        }

        .main-content {
            margin-left: 250px;
            padding: 100px 40px 40px 40px;
            width: calc(100% - 250px);
            height: 100vh;
            overflow-y: auto;
            text-align: center;
        }

        .main-content h1 {
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 2.2em;
            font-weight: 700;
        }

        .chart-container {
            width: 80%;
            max-width: 700px;
            margin: 0 auto 40px auto;
        }

        /* Tabel Logbook */
        .logbook-table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .logbook-table th,
        .logbook-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .logbook-table th {
            background-color: #333;
            color: white;
        }

        .logbook-table td {
            background-color: #f9f9f9;
        }

        .status-acc {
            color: green;
            font-weight: bold;
        }

        .status-not-acc {
            color: red;
            font-weight: bold;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #333;
        }

        .motivational-text {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-size: 1.1em;
        }

        table th {
            background-color: #f0f0f0;
            color: #555;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 1.2em;
            color: #444;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 1.1em;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #333;
            outline: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #ccc;
        }

        .back .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.1em;
            margin-top: 15px;
            text-align: center;
        }

        .back .btn:hover {
            background-color: #555;
        }

        @media (min-width: 1024px) {
            .container {
                width: 80%;
            }
        }

        @media (min-width: 1024px) {
            .container {
                width: 70%;
            }
        }

        .container {
            width: 50%;
            margin: auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button[type="submit"]:hover {
            background-color: #333;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar Top -->
    <div class="navbar-top">
        <div class="navbar-title">Dashboard Siswa Monitoring PKL</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
       <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">

        <nav class="navbar">
            <ul>
                <li><a onclick="showDashboard()">Dashboard</a></li>
                <li><a onclick="showAbsensi()">Absensi</a></li>
                <li><a onclick="showLogbook()">Laporan Kegiatan</a></li>
            </ul>
        </nav>
        <div class="profile-container">
            <img src="profile.jpg" alt="Profile" class="profile-pic">
            <a href="profil.html">Profil</a>
            <a href="login.html">Keluar</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Konten Dashboard Default -->
    </div>

    <script>
        // Fungsi untuk menampilkan halaman Dashboard
        function showDashboard() {
            document.getElementById('mainContent').innerHTML = `
            <h1>Informasi Laporan Kegiatan Siswa</h1>
            <table class="logbook-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-10-20</td>
                        <td>Observasi Lapangan</td>
                        <td class="status-acc">Sudah di-ACC</td>
                    </tr>
                    <tr>
                        <td>2024-10-21</td>
                        <td>Penulisan Laporan Harian</td>
                        <td class="status-not-acc">Belum di-ACC</td>
                    </tr>
                    <tr>
                        <td>2024-10-22</td>
                        <td>Pemaparan Hasil PKL</td>
                        <td class="status-acc">Sudah di-ACC</td>
                    </tr>
                </tbody>
            </table>
            `;
        }

        // Fungsi untuk menampilkan halaman Absensi dengan tanggal otomatis
        function showAbsensi() {
            document.getElementById('mainContent').innerHTML = `
           <form action="{{ route('absen.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="tanggal">Tanggal (DD-MM-YYYY)</label>
        <input type="date" name="tanggal" id="tanggal" placeholder="Masukkan tanggal (contoh: 31-12-2024)" required>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="status-table">
        <p class="status-title">Pilih Status Kehadiran:</p>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Status Absensi</td>
                    <td><input type="radio" name="status" value="hadir" required></td>
                    <td><input type="radio" name="status" value="sakit"></td>
                    <td><input type="radio" name="status" value="izin"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn-submit">Kirim Absensi</button>
</form>


            <section class="attendance-info">
                <h2>Informasi Kehadiran</h2>
                <div class="info-box">
                    <div class="info-item">
                        <p><strong>Batas Waktu Absen:</strong></p>
                        <p>Pukul 08:00 hingga 12:00</p>
                    </div>
                    <div class="info-item">
                        <p><strong>Catatan:</strong></p>
                        <p>Pastikan mengisi absen dalam rentang waktu yang ditentukan. Setelah mencapai 3 kali absen (alfa), akan ada pemberitahuan lebih lanjut.</p>
                    </div>
                    <div class="info-item">
                        <p><strong>Aturan Alfa:</strong></p>
                        <p>Maksimal 3 kali absen (alfa) dalam satu periode</p>
                    </div>
                </div>
            </section>
            `;

            // Mengisi input tanggal otomatis dengan tanggal hari ini
            let today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal').value = today;
        }

        // Fungsi untuk menampilkan halaman Logbook
        function showLogbook() {
            document.getElementById('mainContent').innerHTML = `
            <div class="body">
    <h1>Laporan Kegiatan PKL</h1>
    <div class="motivational-text">
        <p><em>Kehadiranmu Adalah Kunci Kesuksesan!</em></p>
        <p>Disiplin adalah langkah pertama menuju keberhasilan. Isi laporan harianmu, dan tunjukkan komitmenmu kepada dunia.</p>
    </div>
    <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="form-laporan">
        @csrf
        <label for="tanggal">Tanggal (DD-MM-YYYY):</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <label for="deskripsi">Deskripsi Kegiatan:</label>
        <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>

        <label for="fotoKegiatan">Unggah Foto Kegiatan:</label>
        <input type="file" id="fotoKegiatan" name="foto_kegiatan" accept="image/*" required>

        <button type="submit" class="btn-submit">Kirim Laporan</button>
    </form>
</div>
            `;
        }
    </script>
</body>

</html>
