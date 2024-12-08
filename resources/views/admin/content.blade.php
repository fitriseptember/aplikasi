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
     @extends('admin.dashboard')

@section('title', 'Absensi Siswa')

@section('content')
    <div class="container">
        <!-- Card Section -->

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
   <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const visitCtx = document.getElementById('visitChart').getContext('2d');

// Create the initial chart
const visitChart = new Chart(visitCtx, {
    type: 'bar',
    data: {
        labels: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], // Days of the week
        datasets: [{
            label: 'Kunjungan Harian',
            data: [0, 0, 0, 0, 0, 0, 0], // Initially empty
            backgroundColor: '#4a90e2',
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: true },
        },
        scales: {
            x: { title: { display: true, text: 'Hari' } },
            y: { title: { display: true, text: 'Jumlah Login' } },
        }
    }
});

// Fetch the login data from the server
fetch('/kunjungan') // Sesuaikan rute ini dengan Laravel
    .then(response => response.json())
    .then(data => {
        // Initialize an array for storing daily login counts
        const dailyCounts = [0, 0, 0, 0, 0, 0, 0]; // Sunday to Saturday

        // Group the data by day of the week
        data.forEach(item => {
            const date = new Date(item.date);
            const dayOfWeek = date.getDay(); // Get day of the week (0: Sunday, ..., 6: Saturday)

            // Increment the count for the corresponding day
            dailyCounts[dayOfWeek] += item.count;
        });

        // Update the chart with the fetched data
        visitChart.data.datasets[0].data = dailyCounts;
        visitChart.update(); // Re-render the chart
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

        setTimeout(() => {
            const accReports = [
                { name: 'Laporan A', date: '01 Nov 2024', status: 'Disetujui' },
                { name: 'Laporan C', date: '03 Nov 2024', status: 'Disetujui' }
            ];

            const pendingReports = [
                { name: 'Laporan B', date: '02 Nov 2024', status: 'Menunggu' },
                { name: 'Laporan D', date: '04 Nov 2024', status: 'Menunggu' }
            ];

            const accTableBody = document.getElementById('accReportsTable').getElementsByTagName('tbody')[0];
            accTableBody.innerHTML = ''; // Clear existing rows
            accReports.forEach(report => {
                const row = accTableBody.insertRow();
                row.innerHTML = `<td>${report.name}</td><td>${report.date}</td><td>${report.status}</td>`;
            });

            const pendingTableBody = document.getElementById('pendingReportsTable').getElementsByTagName('tbody')[0];
            pendingTableBody.innerHTML = ''; // Clear existing rows
            pendingReports.forEach(report => {
                const row = pendingTableBody.insertRow();
                row.innerHTML = `<td>${report.name}</td><td>${report.date}</td><td>${report.status}</td>`;
            });
        }, 2000);
    </script>
        @endsection
</body>

</html>
