<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Mengisi seluruh tinggi layar */
        }

        .header {
            background-color: #505253;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            width: 100%;
            box-sizing: border-box;
            position: absolute;
            top: 0;
        }

        .logo {
            width: 80px;
            border-radius: 50%;
            margin-left: 20px;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: normal;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #F5A623;
        }

        .profile-container {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile-pic {
            width: 80px;
            border-radius: 50%;
            margin-left: 20px;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .profile-container:hover .dropdown-content {
            display: block;
        }

        .main-content {
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 1000px;
            text-align: center;
            margin-top: 100px;
        }

        .main-content h1 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stat {
            background-color: #bdc3c7;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            margin: 10px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
        }

        button {
            padding: 10px 15px;
            cursor: pointer;
            background-color: #7f8c8d;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #3c3d3d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #bdc3c7;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header class="header">
        <img src="logoMP.jpeg" alt="Logo" class="logo">
        <nav class="navbar">
        </nav>
        <div class="profile-container">
            <img src="logoMP.jpeg" alt="Profile" class="profile-pic">
            <div class="dropdown">
                <div class="dropdown-content">
                    <a href="profile.html">Profile</a>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="stats">
            <div class="stat">
                <h1>Data Siswa</h1>
                <a href="DaftarSiswa.html">
                <button>See More</button>
                </a>
            </div>
            <div class="stat">
                <h1>Data Absensi</h1>
                <a href="Absensi.html">
                <button>See More</button>
                </a>
            </div>
            <div class="stat">
                <h1>Laporan kegiatan</h1>
                <a href="LaporanKegiatan.html">
                <button>See More</button>
                </a>
            </div>
        </div>
    </div>

    </body>

    </html>
