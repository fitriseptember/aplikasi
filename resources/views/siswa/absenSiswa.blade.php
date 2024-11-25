<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #695CFE;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 1.2em;
            color: #695CFE;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #695CFE;
            border-radius: 4px;
            font-size: 1.1em;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #695CFE;
            outline: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #695CFE;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #8881d4;
        }

        .status-table {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-size: 1.1em;
        }

        table th {
            background-color: #f0f0f0;
            color: #555;
        }

        .attendance-info {
            margin-top: 30px;
        }

        .attendance-info h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #333;
        }

        .info-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item strong {
            color: #444;
        }

        .info-item p {
            color: #555;
        }
    </style>
</head>

<body>
    @extends('siswa.dashboard')

    @section('title', 'Absensi Siswa')

    @section('content')
    <div class="container">
        <h1>Absen Siswa</h1>

        @if($absensiSudahDiisi)
            <p class="info-box" style="color: green; font-weight: bold; text-align: center;">
                Anda sudah mengisi absen hari ini. Terima kasih!
            </p>
        @else
            <form action="{{ route('absen.store') }}" method="POST" id="absenForm">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" readonly>
                </div>

                <div class="status-table">
                    <p class="status-title">Pilih Status Kehadiran:</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Status Absensi</td>
                                <td><input type="radio" name="status" value="hadir" required></td>
                                <td><input type="radio" name="status" value="sakit"></td>
                                <td><input type="radio" name="status" value="izin"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn-submit">Kirim Absensi</button>
            </form>
        @endif

        <section class="attendance-info">
            <h2>Informasi Kehadiran</h2>
            <div class="info-box">
                <div class="info-item">
                    <p><strong>Batas Waktu Absen:</strong></p>
                    <p>Pukul 08:00 hingga 12:00</p>
                </div>
                <div class="info-item">
                    <p><strong>Catatan:</strong></p>
                    <p>Pastikan mengisi absen dalam rentang waktu yang ditentukan.</p>
                </div>

            </div>
        </section>
    </div>

    <script>
        // Mengisi tanggal otomatis
        document.getElementById('tanggal').value = new Date().toISOString().split('T')[0];

        // Validasi waktu sebelum submit
        const absenForm = document.getElementById('absenForm');
        absenForm?.addEventListener('submit', function (event) {
            const currentHour = new Date().getHours();
            if (currentHour >= 12) {
                alert('Batas waktu pengisian absen telah berakhir.');
                event.preventDefault();
            }
        });
    </script>
    @endsection
</body>

</html>
