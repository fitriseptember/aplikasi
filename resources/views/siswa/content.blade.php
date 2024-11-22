<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laporan dan Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            min-width: 250px;
            padding: 20px;
            border-radius: 8px;
            color: #333;
            font-size: 1.2em;
        }

        .blue {
            background-color: #695CFE;
        }

        .purple {
            background-color: #9b59b6;
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #695CFE;
            color: #ffffff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Sesuaikan dengan jumlah chart */
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .chart h3 {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #333;
            text-align: center;
        }

        .chart canvas {
            width: 100% !important;
            height: 300px !important; /* Tetapkan tinggi yang konsisten */
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }

            .chart-container {
                grid-template-columns: 1fr;
            }

            .chart canvas {
                height: 250px !important; /* Sesuaikan tinggi untuk layar kecil */
            }
        }
    </style>
</head>

<body>
    @extends('siswa.dashboard')

    @section('title', 'Absensi Siswa')

    @section('content')
    <div class="container">
        <!-- Tabel Sudah di-ACC -->
        <div class="card-container">
            <div class="card blue">
                <h2>Laporan Sudah di-ACC</h2>
                <table id="accReportsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi Laporan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporanAcc as $laporan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $laporan->deskripsi }}</td>
                                <td>{{ $laporan->tanggal }}</td>
                                <td>✔️ Disetujui</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tidak ada laporan yang sudah di-ACC.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <div class="chart">
                <h3>Grafik Kunjungan Situs Harian</h3>
                <canvas id="visitChart"></canvas>
            </div>
            <div class="chart">
                <h3>Persentase Kehadiran Siswa</h3>
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const visitCtx = document.getElementById('visitChart').getContext('2d');

        // Create the initial chart with empty data
        const visitChart = new Chart(visitCtx, {
            type: 'bar',
            data: {
                labels: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], // Tetap dalam urutan Minggu - Sabtu
                datasets: [{
                    label: 'Kunjungan',
                    data: [0, 0, 0, 0, 0, 0, 0], // Data awal kosong
                    backgroundColor: '#4a90e2',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                }
            }
        });

        // Fetch the login data from the controller
        fetch('/get-login-data')
            .then(response => response.json())
            .then(data => {
                // Inisialisasi array untuk jumlah kunjungan harian
                const dailyCounts = [0, 0, 0, 0, 0, 0, 0]; // [Minggu, Senin, ..., Sabtu]

                // Hitung jumlah kunjungan berdasarkan hari
                data.forEach(item => {
                    const date = new Date(item.date);
                    const dayOfWeek = date.getDay(); // 0: Minggu, ..., 6: Sabtu

                    // Tambahkan jumlah kunjungan ke hari yang sesuai
                    dailyCounts[dayOfWeek] += item.count;
                });

                // Perbarui data grafik
                visitChart.data.datasets[0].data = dailyCounts;
                visitChart.update(); // Render ulang grafik
            })
            .catch(error => console.error('Error fetching login data:', error));

        // Mengambil data kehadiran dari backend
        const attendanceData = @json($kehadiran);

        // Inisialisasi Chart.js untuk menampilkan data
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(attendanceCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(attendanceData), // Label status (Hadir, Sakit, Izin, Alpa)
                datasets: [{
                    data: Object.values(attendanceData), // Data jumlah untuk setiap status
                    backgroundColor: ['#2ecc71', '#f1c40f', '#3498db', '#e74c3c'], // Warna
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }, // Letak legenda
                }
            }
        });
    </script>
    @endsection
</body>

</html>
