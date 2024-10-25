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
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            background-color: #2f3640;
            color: #f5f6fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            width: 100%;
            position: absolute;
            top: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 50px;
            border-radius: 50%;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #f5f6fa;
            font-weight: 600;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #00a8ff;
        }

        .profile-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid #f5f6fa;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .dropdown-content a {
            color: #2f3640;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }

        .profile-container:hover .dropdown-content {
            display: block;
        }

        .main-content {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
            text-align: center;
            margin-top: 100px;
        }

        .main-content h1 {
            margin-bottom: 30px;
            color: #2c3e50;
            font-size: 2.2em;
            font-weight: 700;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .stat {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 12px;
            flex: 1;
            margin: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            max-width: 250px;
        }

        .stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #2f3640;
            color: white;
            border: none;
            border-radius: 8px;
            transition: background 0.3s;
            font-size: 1.1em;
            font-weight: 600;
        }

        button:hover {
            background-color: #00a8ff;
        }

        a {
            text-decoration: none;
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
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #00a8ff;
            color: white;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <header class="header">
        <img src="logoMP.jpeg" alt="Logo" class="logo">
        <nav class="navbar">
            <ul>
                <li><a href="#home">Dashboard</a></li>
            </ul>
        </nav>
        <div class="profile-container">
            <img src="profile.jpg" alt="Profile" class="profile-pic">
            <div class="dropdown-content">
                <a href="profil.html">Profil</a>
                <a href="#preferensi">Preferensi</a>
                <a href="login.html">Keluar</a>
            </div>
        </div>
    </header>

    <div class="main-content">
        <h1>Monitoring PKL</h1>
        <div class="stats">
            <div class="stat">
                <h2>Absensi</h2>
                <a href="absen.html">
                    <button>See More</button>
                </a>
            </div>

            <div class="stat">
                <h2>Laporan Kegiatan</h2>
                <a href="laporan.html">
                    <button>See More</button>
                </a>
            </div>
        </div>
    </div>

</body>

</html>
