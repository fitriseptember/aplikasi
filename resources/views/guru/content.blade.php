<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laporan dan Absensi</title>
    <style>
        /* Mengatur gaya umum untuk elemen body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Mengatur tata letak container utama */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Mengatur tampilan kartu informasi */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        /* Mengatur elemen kartu */
        .card {
            flex: 1;
            min-width: 250px;
            padding: 20px;
            border-radius: 8px;
            color: #333;
            font-size: 1.2em;
        }

        /* Warna khusus untuk kartu biru */
        .blue {
            background-color: #695CFE;
        }

        /* Warna khusus untuk kartu ungu */
        .purple {
            background-color: #9b59b6;
        }

        /* Mengatur tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        /* Mengatur header tabel */
        th {
            background-color: #695CFE;
            color: #ffffff;
            text-transform: uppercase;
        }

        /* Menambahkan efek hover pada baris tabel */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Mengatur chart container */
        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Dua kolom untuk grafik */
            gap: 20px;
        }

        /* Mengatur elemen chart */
        .chart {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Gaya responsif untuk layar kecil */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }

            .chart-container {
                grid-template-columns: 1fr; /* Satu kolom untuk grafik */
            }
        }
    </style>
</head>

<body>
    <!-- Menggunakan layout Laravel dengan dashboard guru -->
    @extends('guru.dashboard')

    <!-- Judul halaman -->
    @section('title', 'Absensi Siswa')

    @section('content')
    <div class="container">
        <!-- Bagian chart untuk laporan kunjungan dan kehadiran -->
        <div class="chart-container">
            <div class="chart">
                <h3>Grafik Kunjungan Situs Harian</h3>
                <canvas id="visitChart"></canvas> <!-- Grafik kunjungan -->
            </div>
            <div class="chart">
                <h3>Persentase Kehadiran Siswa</h3>
                <canvas id="attendanceChart"></canvas> <!-- Grafik kehadiran -->
            </div>
        </div>
    </div>

    <!-- Menambahkan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Membuat grafik kunjungan situs
        const visitCtx = document.getElementById('visitChart').getContext('2d');
        const visitChart = new Chart(visitCtx, {
            type: 'bar', // Jenis grafik: batang
            data: {
                labels: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                datasets: [{
                    label: 'Kunjungan Harian',
                    data: [0, 0, 0, 0, 0, 0, 0], // Data awal kosong
                    backgroundColor: '#4a90e2',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Hari' } },
                    y: { title: { display: true, text: 'Jumlah Login' } },
                }
            }
        });

        // Memperbarui data kunjungan dari server
        fetch('/kunjungan')
            .then(response => response.json())
            .then(data => {
                const dailyCounts = [0, 0, 0, 0, 0, 0, 0];
                data.forEach(item => {
                    const dayOfWeek = new Date(item.date).getDay();
                    dailyCounts[dayOfWeek] += item.count;
                });
                visitChart.data.datasets[0].data = dailyCounts;
                visitChart.update(); // Memperbarui grafik
            });

        // Membuat grafik kehadiran siswa
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceData = @json($kehadiran); // Data dari Laravel
        const attendanceChart = new Chart(attendanceCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(attendanceData),
                datasets: [{
                    data: Object.values(attendanceData),
                    backgroundColor: ['#2ecc71', '#f1c40f', '#3498db', '#e74c3c'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                }
            }
        });
    </script>
    @endsection
</body>

</html>
