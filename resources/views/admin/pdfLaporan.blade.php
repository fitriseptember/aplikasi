<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Siswa</title>
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

        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }

        .acc-status {
            font-weight: bold;
        }

        .acc-status.acc {
            color: green;
        }

        .acc-status.pending {
            color: orange;
        }
    </style>
</head>
<body>
    <h1>Data Laporan Kegiatan Siswa</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama Siswa</th>
                <th>Deskripsi</th>
                <th>Foto Kegiatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                @foreach ($laporanKegiatan as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->time)->format('H:i') }}</td>
                        <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td>
                        <td>{{ $laporan->deskripsi }}</td>
                        <td>
                            @if ($laporan->foto_kegiatan)
                                <img src="{{ public_path('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td class="acc-status">
                            {{ $laporan->acc ? 'ACC' : 'Belum ACC' }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">Data laporan kegiatan tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
