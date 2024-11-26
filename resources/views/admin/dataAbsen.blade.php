<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absen</title>
    <style>
        /* Mengatur gaya untuk body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Mengatur gaya untuk container utama */
        .body {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Gaya untuk judul halaman */
        h1 {
            text-align: center;
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }

        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
        }

        /* Gaya untuk header tabel */
        thead th {
            background-color: #695CFE;
            color: #ffffff;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Gaya untuk baris tabel */
        tbody tr {
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Gaya untuk sel tabel */
        td, th {
            padding: 10px;
            text-align: left;
        }

        /* Gaya untuk baris kosong */
        tbody tr td[colspan="4"] {
            text-align: center;
            color: #999;
        }

        /* Gaya hover untuk baris tabel */
        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
   @extends('admin.dashboard') {{-- Ganti dengan layout mitra jika menggunakan layout khusus per mitra --}}

@section('title', 'Absensi Siswa')

@section('content')
    <div class="body">
        <h1>Data Absen Siswa (Mitra)</h1>

        <!-- Blade View -->
<table id="attendanceTable" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th> <!-- New column for time -->
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

    </div>
@endsection

</body>
</html>
