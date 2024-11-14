<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Tampilan Admin Monitoring PKL</title>
     <style>
=======
    <title>Tampilan Guru Monitoring PKL</title>
    <style>
>>>>>>> 36c3b14988dd21c422843cefbfb62cd2a3c9a6bb
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #ffffff;
            display: flex;
            height: 100vh;
        }

        /* Animasi untuk sidebar masuk dari kiri */
.sidebar {
    animation: slideInLeft 0.5s ease-out;
}

@keyframes slideInLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Animasi hover untuk tombol */
.btn-submit, .navbar ul li a, .back .btn {
    transition: transform 0.3s ease, background-color 0.3s;
}

.btn-submit:hover, .navbar ul li a:hover, .back .btn:hover {
    background-color: #555;
    transform: scale(1.05);
}

/* Animasi fade-in untuk tabel */
.logbook-table {
    animation: fadeIn 0.8s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animasi bounce untuk profile picture */
.profile-pic {
    animation: bounce 1.5s infinite alternate ease-in-out;
}

@keyframes bounce {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-10px);
    }
}

/* Animasi smooth hover untuk link sidebar */
.navbar ul li a {
    position: relative;
    color: #f5f6fa;
    text-decoration: none;
}

.navbar ul li a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background-color: #00a8ff;
    left: 50%;
    bottom: 0;
    transition: all 0.3s ease-in-out;
}

.navbar ul li a:hover::after {
    width: 100%;
    left: 0;
}

h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            margin-left: 250px; /* Leave space for the sidebar */
            padding: 20px;
            max-width: 1000px;
            width: calc(100% - 250px); /* Adjust width to fill remaining space */
        }

        input[type="text"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            .container {
                margin-left: 0; /* Reset margin for mobile */
                width: 100%; /* Full width for mobile */
            }
        }

/* Animasi untuk text motivasi */
.motivational-text p {
    animation: textFadeIn 1.5s ease-out;
}

@keyframes textFadeIn {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
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

        .container {
            margin-left: 260px; /* Leave space for the sidebar */
            padding: 20px;
            max-width: 1000px;
            width: calc(100% - 250px); /* Adjust width to fill remaining space */
            text-align: center; /* Center text in the container */
        }

        h1 {
            margin-bottom: 20px;
            color: #444;
        }

        table {
            width: 80%; /* Adjust table width */
            margin: 20px auto; /* Center the table */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            table {
                width: 100%; /* Full width on mobile */
            }

            .btn {
                margin-left: 0; /* Reset margin for mobile */
            }

            h1 {
                margin-left: 0; /* Reset margin for mobile */
            }
        }
            h1 {
                text-align: center; /* Pusatkan judul */
                color: #333; /* Warna teks judul */
            }

        .form-laporan {
            display: flex;
            flex-direction: column; /* Susun elemen dalam kolom */
        }

        label {
            margin-top: 15px; /* Jarak atas antara label dan elemen input */
            font-weight: bold; /* Tebalkan teks label */
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            padding: 10px; /* Ruang dalam input */
            border: 1px solid #ced4da; /* Garis batas */
            border-radius: 5px; /* Sudut membulat */
            font-size: 14px; /* Ukuran font */
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #80bdff; /* Warna batas saat fokus */
            outline: none; /* Menghilangkan outline default */
        }

        .btn-submit {
            margin-top: 20px; /* Jarak atas tombol */
            padding: 10px; /* Ruang dalam tombol */
            background-color: #333; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Hilangkan garis batas */
            border-radius: 5px; /* Sudut membulat */
            cursor: pointer; /* Tangan saat hover */
        }

        .btn-submit:hover {
            background-color: #555; /* Warna tombol saat hover */
        }

        /* Gaya untuk Container Diagram */
        .diagram-container {
            width: 80%; /* Lebar diagram */
            max-width: 800px; /* Batas maksimum lebar */
            margin: 0 auto 30px auto; /* Posisi tengah dengan jarak dari tabel */
            padding: 20px; /* Ruang di sekitar */
            background-color: #f8f8f8; /* Warna latar belakang */
            border: 1px solid #ddd; /* Batas */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        /* Gaya untuk judul diagram */
        .diagram-title {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        /* Gaya untuk diagram (contoh menggunakan Chart.js atau library lainnya) */
        .chart-canvas {
            width: 100%;
            height: 300px;
        }

        /* Animasi muncul untuk diagram */
        .diagram-container {
            animation: fadeInDiagram 0.8s ease-in;
        }

        @keyframes fadeInDiagram {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* css input */
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button-container {
            display: flex;
            gap: 10px; /* Jarak antara tombol */
            justify-content: center; /* Memusatkan tombol */
        }

        button[type="submit"],
        .back-button {
            flex: 1; /* Mengatur tombol agar memiliki lebar yang sama */
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        button[type="submit"] {
            background-color: #28a745;
        }

        .back-button {
            background-color: #007bff;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        .back-button:hover {
            background-color: #0069d9;
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }



    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar Top -->
    <div class="navbar-top">
        <div class="navbar-title">Halaman Guru Monitoring PKL</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
       <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
        <nav class="navbar">
            <ul>
                <li><a onclick="showDashboard()">Dashboard</a></li>
                <li><a onclick="showAbsensi()">Data Absensi Siswa</a></li>
                <li><a onclick="showLogbook()">Data Laporan Kegiatan Siswa</a></li>
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
        <!-- Tabel Logbook Default -->
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
    </div>

    <script>
        // Fungsi untuk menampilkan halaman Dashboard
        function showDashboard() {
            document.getElementById('mainContent').innerHTML = `

        <!-- Tabel Logbook Default -->
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
    </div>
            `;
        }

        // Fungsi untuk menampilkan halaman Absensi
        function showAbsensi() {
            document.getElementById('mainContent').innerHTML = `
 <div class="body">
    <h1>Data Absen Siswa</h1>

    <table id="attendanceTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($attendances) && count($attendances) > 0)
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                        <td>{{ $attendance->tanggal }}</td>
                        <td>{{ $attendance->user->nama_lengkap ?? 'Unknown' }}</td> {{-- Tampilkan nama lengkap atau "Unknown" --}}
                        <td>{{ $attendance->status }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Data absensi tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

            `;
        }

        // Fungsi untuk menampilkan halaman Logbook Laporan Kegiatan
        function showLogbook() {
            document.getElementById('mainContent').innerHTML = `
    <div class="body">
    <h1>Data Laporan Kegiatan Siswa</h1>

    <table id="laporanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Deskripsi</th>
                <th>Foto Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                @foreach ($laporanKegiatan as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td> {{-- Nama siswa dari relasi user --}}
                        <td>{{ $laporan->deskripsi }}</td>
                        <td>
                            @if ($laporan->foto_kegiatan)
                                <img src="{{ asset('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Data laporan kegiatan tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

            `;
        }
    </script>
</body>

</html>
