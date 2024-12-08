<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laporan dan Absensi</title>
    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Container untuk konten utama */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Container untuk kartu laporan */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        /* Gaya untuk setiap kartu */
        .card {
            flex: 1;
            min-width: 250px;
            padding: 20px;
            border-radius: 8px;
            color: #333;
            font-size: 1.2em;
        }

        /* Warna biru untuk kartu laporan ACC */
        .blue {
            background-color: #695CFE;
        }

        .purple {
            background-color: #9b59b6;
        }

        /* Styling untuk tabel laporan */
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

        /* Styling untuk bagian grafik */
        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Membuat dua kolom untuk grafik */
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
        <!-- Bagian untuk tabel laporan yang sudah di-ACC -->
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
                        @forelse ($laporanAcc as $laporan) <!-- Loop untuk menampilkan laporan yang sudah di-ACC -->
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $laporan->deskripsi }}</td>
                                <td>{{ $laporan->tanggal }}</td>
                                <td>✔️ Disetujui</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Tidak ada laporan yang sudah di-ACC.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bagian grafik kunjungan situs dan persentase kehadiran siswa -->
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

    <!-- Sertakan pustaka Chart.js untuk menggambar grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Membuat grafik untuk kunjungan situs
        const visitCtx = document.getElementById('visitChart').getContext('2d');
        const visitChart = new Chart(visitCtx, {
            type: 'bar', // Jenis grafik bar
            data: {
                labels: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], // Label untuk hari
                datasets: [{
                    label: 'Kunjungan', // Label dataset
                    data: [0, 0, 0, 0, 0, 0, 0], // Data kosong awal
                    backgroundColor: '#4a90e2', // Warna grafik
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Agar grafik responsif
                plugins: {
                    legend: { display: false }, // Menyembunyikan legenda
                }
            }
        });

        // Mengambil data login dari backend untuk grafik kunjungan
        fetch('/get-login-data')
            .then(response => response.json())
            .then(data => {
                const dailyCounts = [0, 0, 0, 0, 0, 0, 0]; // Array untuk menghitung jumlah kunjungan per hari
                data.forEach(item => {
                    const date = new Date(item.date);
                    const dayOfWeek = date.getDay(); // Mendapatkan hari dalam angka (0: Minggu, ..., 6: Sabtu)
                    dailyCounts[dayOfWeek] += item.count; // Tambahkan jumlah kunjungan pada hari yang sesuai
                });

                // Update data pada grafik kunjungan
                visitChart.data.datasets[0].data = dailyCounts;
                visitChart.update(); // Render ulang grafik
            })
            .catch(error => console.error('Error fetching login data:', error));

        // Mengambil data kehadiran siswa dari backend
        const attendanceData = @json($kehadiran); // Data dari controller Laravel

        // Membuat grafik donat untuk persentase kehadiran siswa
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(attendanceCtx, {
            type: 'doughnut', // Jenis grafik donat
            data: {
                labels: Object.keys(attendanceData), // Label status kehadiran (Hadir, Sakit, Izin, Alpa)
                datasets: [{
                    data: Object.values(attendanceData), // Data jumlah kehadiran per status
                    backgroundColor: ['#2ecc71', '#f1c40f', '#3498db', '#e74c3c'], // Warna untuk setiap status
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }, // Menampilkan legenda di bagian bawah
                }
            }
        });
    </script>
    @endsection
</body>

</html>
