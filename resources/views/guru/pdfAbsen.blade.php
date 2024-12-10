<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absen Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }
        thead th {
            background-color: #695CFE;
            color: #fff;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        tbody td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:nth-child(odd) {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <h1>Data Absen Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama Siswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($attendances) && count($attendances) > 0)
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->tanggal }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->time)->format('H:i') }}</td>
                        <td>{{ $attendance->user->nama_lengkap ?? 'Unknown' }}</td>
                        <td>{{ $attendance->status }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Data absensi tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
