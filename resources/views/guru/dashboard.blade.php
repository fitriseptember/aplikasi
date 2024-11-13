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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            color: black;
            padding: 20px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
            animation: slideIn 0.8s ease forwards;
            opacity: 0;
            transform: translateY(-30px);
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 4px 8px black;
            opacity: 0;
            animation: zoomIn 0.6s ease forwards;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid grey;
            text-align: center;
            transform: background-color 0.3s;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        th {
            background-color: white;
            color: black;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr:hover {
            background-color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }

        .content {
            border: 1px solid #333;
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: slideUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-back {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: black;
        }

        .content {
            width: 100%;
            flex: 1;
            padding: 20px;
            background-color: white;
        }

        .content th, td {
            padding: 12px;
            border: 1px solid white;
            text-align: left;
        }

        .content h1 {
            padding: 12px;
            text-align: left;
        }

        .content th {
            background-color: #333;
            color: white;
        }

        .container tr:nth-child(even) {
            background-color: aqua;
        }

        .container tr:hover {
            background-color: azure;
        }

        button {
            padding: 5px 10px;
            background-color: aqua;
            color: black;
            border: none;
            cursor: pointer;
        }

        button:disabled {
            background-color: white;
            cursor: not-allowed;
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
                <th>No</th> <!-- Added serial number column -->
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $index => $attendance)
                <tr>
                    <td>{{ $index + 1 }}</td> <!-- Serial number starts from 1 -->
                    <td>{{ $attendance->tanggal }}</td>
                     <td>{{ session('user_data')->nama_lengkap ??  'Unknown' }}</td>
                    <td>{{ $attendance->status }}</td>
                </tr>
            @endforeach
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
                @foreach ($laporanKegiatan as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                      <td>{{ session('user_data') ? session('user_data')->nama_lengkap : 'Unknown' }}</td>
                        <td>{{ $laporan->deskripsi }}</td>
                        <td>
                            @if($laporan->foto_kegiatan)
                                <img src="{{ asset('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan" width="100">
                            @else
                                Foto Tidak Tersedia
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
