<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Siswa</title>
    <style>
        /* Styling dasar untuk body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }

        /* Styling judul halaman */
        h1 {
            text-align: center;
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Styling untuk header tabel */
        thead th {
            background-color: #695CFE;
            color: #fff;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Styling untuk isi tabel */
        tbody td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        /* Warna latar belakang untuk baris tabel */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        /* Styling untuk gambar di dalam tabel */
        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }

        /* Styling untuk kolom status */
        .acc-status {
            font-weight: bold;
        }

        /* Warna status ACC */
        .acc-status.acc {
            color: green;
        }

        /* Warna status Pending */
        .acc-status.pending {
            color: orange;
        }
    </style>
</head>
<body>
    <!-- Judul halaman -->
    <h1>Data Laporan Kegiatan Siswa</h1>

    <!-- Tabel laporan kegiatan siswa -->
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
            <!-- Mengecek apakah data laporan kegiatan tersedia -->
            @if(isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                <!-- Looping data laporan kegiatan -->
                @foreach ($laporanKegiatan as $laporan)
                    <tr>
                        <!-- Menampilkan nomor urut -->
                        <td>{{ $loop->iteration }}</td>
                        <!-- Menampilkan tanggal laporan -->
                        <td>{{ $laporan->tanggal }}</td>
                        <!-- Format waktu laporan menjadi HH:mm -->
                        <td>{{ \Carbon\Carbon::parse($laporan->time)->format('H:i') }}</td>
                        <!-- Menampilkan nama siswa, jika tidak ada tampilkan 'Unknown' -->
                        <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td>
                        <!-- Menampilkan deskripsi laporan -->
                        <td>{{ $laporan->deskripsi }}</td>
                        <!-- Menampilkan foto kegiatan jika ada, jika tidak tampilkan teks -->
                        <td>
                            @if ($laporan->foto_kegiatan)
                                <img src="{{ public_path('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <!-- Menampilkan status laporan (ACC/Belum ACC) -->
                        <td class="acc-status">
                            {{ $laporan->acc ? 'ACC' : 'Belum ACC' }}
                        </td>
                    </tr>
                @endforeach
            @else
                <!-- Jika data laporan tidak tersedia -->
                <tr>
                    <td colspan="7">Data laporan kegiatan tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
