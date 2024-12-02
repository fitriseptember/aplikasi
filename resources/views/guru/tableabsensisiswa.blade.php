<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi Siswa</title>
        <style>
            body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            }

            h1 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 20px;
                font-size: 24px;
                letter-spacing: 1px;
            }

            #attendanceTable {
                width: 100%;
                border-collapse: collapse;
                margin: 20px auto;
                background-color: #ffffff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                border-radius: 8px;
            }

            #attendanceTable th,
            #attendanceTable td {
                padding: 12px 15px;
                text-align: center;
                border: 1px solid #ddd;
                font-size: 14px;
            }

            #attendanceTable th {
                background-color: #3498db;
                color: #ffffff;
                text-transform: uppercase;
                font-weight: bold;
            }

            #attendanceTable tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #attendanceTable tr:hover {
                background-color: #dff9fb;
            }

            #attendanceTable td {
                color: #2c3e50;
                font-size: 14px;
            }

            td[colspan="4"] {
                text-align: center;
                font-style: italic;
                color: #7f8c8d;
                font-size: 16px;
            }

            #attendanceTable td:last-child {
                font-weight: bold;
                color: #27ae60;
            }

            #attendanceTable td:last-child:contains("Sakit") {
                color: #e74c3c;
            }

            #attendanceTable td:last-child:contains("Izin") {
                color: #f1c40f;
            }

            #attendanceTable td:last-child:contains("Tidak Hadir") {
                color: #e74c3c;
            }
        </style>
</head>
<body>
    function showAbsensi() {
    document.getElementById('mainContent').innerHTML = `
    <div class="body">
        <h1>Data Absen Siswa</h1>

        <table id="attendanceTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($attendances) && count($attendances) > 0)
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                    <td>{{ $attendance->tanggal }}</td>
                    <td>{{ $attendance->user->nama_lengkap ?? 'Unknown' }}</td> {{-- Tampilkan nama lengkap atau "Unknown"
                    --}}
                    <td>{{ $attendance->status }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">Data absensi tidak tersedia.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    `;
    }

</body>
</html>
