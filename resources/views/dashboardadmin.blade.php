<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Admin Monitoring PKL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #ecf0f1;
        }

        .header {
            background-color: #505253;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            position: absolute;
            top: 0;
            width: 98%;
        }

        .logo {
            width: 80px;
            border-radius: 50%;
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
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #646361;
        }

        .profile-container {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile-pic {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .main-content {
            padding: 30px;
            margin-top: 80px; /* Adjust for header */
            border-radius: 15px;
            background-color: white;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .left,
        .right {
            width: 48%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        select,
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #757575;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #616161;
        }

        .chart-container {
            margin-top: 30px;
            text-align: center;
        }

        canvas {
            max-width: 600px;
            margin: 0 auto;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: wrap;
            text-decoration: none; 
        }

        .stat {
            background-color: #bdc3c7;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            margin: 10px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }


    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- Navbar -->
    <header class="header">
        <img src="mp.png" alt="Logo" class="logo">
        <nav class="navbar">
            <ul>
                <li><a href="#home">Dashboard</a></li>
            </ul>
        </nav>
        <div class="profile-container">
            <a href="profileadmin.html">
            <img src="mp.png" alt="Profile" class="profile-pic">
            </a>
        </div>
    </header>

    <div class="main-content">
        <h1>Input Akun</h1>
        <div class="form-group">
            <!-- Kiri -->
            <div class="left">
                <label for="role">Peran:</label>
                <select id="role">
                    <option value="guru">Guru</option>
                    <option value="mitra">Mitra</option>
                    <option value="siswa">Siswa</option>
                </select>

                <label for="gender">Gender:</label>
                <select id="gender">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>

                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" placeholder="Masukkan Nama Lengkap">
                <button type="button">Back</button>
            </div>

            <!-- Kanan -->
            <div class="right">
                <label for="username">Username:</label>
                <input type="text" id="username" placeholder="Masukkan Username">

                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Masukkan Password">

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Masukkan Email">
                <button type="button">Tambah Akun</button>
            </div>
        </div>

        <div class="chart-container">
            <h2>Grafik Kunjungan Situs</h2>
            <canvas id="visitsChart"></canvas>
        </div>

        <div class="stats">
            <div class="stat">
                <h1>Guru</h1>
                <a href="daftarguru.html">
                <button>See More</button></a>
            </div>
            <div class="stat">
                <h1>Siswa</h1>
                <a href="daftarsiswa.html">
                <button>See More</button></a>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('visitsChart').getContext('2d');
        const visitsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Kunjungan',
                    data: [120, 150, 180, 200, 220, 250, 300],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                }
            }
        });
    </script>
</body>

</html>
