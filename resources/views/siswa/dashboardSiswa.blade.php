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
            color: white;
            font-size: 1.2em;
        }

        .blue {
            background-color: #4a90e2;
        }

        .purple {
            background-color: #9b59b6;
        }

        /* Styling for the tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        .chart {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chart h3 {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #333;
        }

        .chart canvas {
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }

            .chart-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Card Section -->
        <div class="card-container">
            <div class="card blue">
                <h2>Laporan Sudah di-ACC</h2>
                <table id="accReportsTable">
                    <!-- Dynamic Table for Approved Reports -->
                    <thead>
                        <tr>
                            <th>Nama Laporan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows that will be updated dynamically -->
                        <tr>
                            <td>Laporan A</td>
                            <td>01 Nov 2024</td>
                            <td>Disetujui</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card purple">
                <h2>Laporan Belum di-ACC</h2>
                <table id="pendingReportsTable">
                    <!-- Dynamic Table for Pending Reports -->
                    <thead>
                        <tr>
                            <th>Nama Laporan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows that will be updated dynamically -->
                        <tr>
                            <td>Laporan B</td>
                            <td>02 Nov 2024</td>
                            <td>Menunggu</td>
                        </tr>
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
        // Grafik Kunjungan Situs Harian
        const visitCtx = document.getElementById('visitChart').getContext('2d');
        const visitChart = new Chart(visitCtx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Kunjungan',
                    data: [50, 60, 45, 70, 80, 55, 40],
                    backgroundColor: '#4a90e2',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                }
            }
        });

        // Grafik Persentase Kehadiran Siswa
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(attendanceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Tidak Hadir'],
                datasets: [{
                    data: [75, 25], // 75% hadir, 25% tidak hadir
                    backgroundColor: ['#2ecc71', '#e74c3c'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                }
            }
        });

        // Simulating dynamic data updates for tables
        setTimeout(() => {
            // Simulate dynamic data for Laporan Sudah di-ACC
            const accReports = [
                { name: 'Laporan A', date: '01 Nov 2024', status: 'Disetujui' },
                { name: 'Laporan C', date: '03 Nov 2024', status: 'Disetujui' }
            ];

            const pendingReports = [
                { name: 'Laporan B', date: '02 Nov 2024', status: 'Menunggu' },
                { name: 'Laporan D', date: '04 Nov 2024', status: 'Menunggu' }
            ];

            // Update the "Laporan Sudah di-ACC" table dynamically
            const accTableBody = document.getElementById('accReportsTable').getElementsByTagName('tbody')[0];
            accReports.forEach(report => {
                const row = accTableBody.insertRow();
                row.innerHTML = `<td>${report.name}</td><td>${report.date}</td><td>${report.status}</td>`;
            });

            // Update the "Laporan Belum di-ACC" table dynamically
            const pendingTableBody = document.getElementById('pendingReportsTable').getElementsByTagName('tbody')[0];
            pendingReports.forEach(report => {
                const row = pendingTableBody.insertRow();
                row.innerHTML = `<td>${report.name}</td><td>${report.date}</td><td>${report.status}</td>`;
            });
        }, 2000); // Simulate data update after 2 seconds
    </script>
</body>

</html>
