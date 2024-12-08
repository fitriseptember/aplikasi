<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Siswa</title>
    <style>
        /* Style untuk elemen body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }

        /* Style untuk judul halaman */
        h1 {
            text-align: center;
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Style untuk header tabel */
        thead th {
            background-color: #695CFE; /* Warna latar belakang header */
            color: #fff;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd; /* Batasan border */
        }

        /* Style untuk isi tabel */
        tbody td {
            padding: 10px;
            border: 1px solid #ddd; /* Batasan border */
            text-align: left;
            vertical-align: middle; /* Menyelaraskan konten di tengah vertikal */
        }

        /* Gaya untuk baris tabel yang genap */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Gaya untuk baris tabel yang ganjil */
        tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        /* Gaya untuk gambar foto kegiatan */
        img {
            max-width: 100px; /* Membatasi lebar gambar */
            height: auto;
            border-radius: 4px;
        }

        /* Gaya untuk status ACC */
        .acc-status {
            font-weight: bold;
        }

        /* Status ACC yang disetujui (warna hijau) */
        .acc-status.acc {
            color: green;
        }

        /* Status yang belum disetujui (warna oranye) */
        .acc-status.pending {
            color: orange;
        }
    </style>
</head>
<body>
    <!-- Judul Halaman -->
    <h1>Data Laporan Kegiatan Siswa</h1>

    <!-- Tabel Data Laporan Kegiatan -->
    <table>
        <thead>
            <tr>
                <!-- Kolom Tabel -->
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
            <!-- Memeriksa apakah ada data laporan kegiatan -->
            @if(isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                @foreach ($laporanKegiatan as $laporan)
                    <tr>
                        <!-- Menampilkan data laporan -->
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->time)->format('H:i') }}</td>
                        <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td>
                        <td>{{ $laporan->deskripsi }}</td>
                        <td>
                            <!-- Menampilkan foto kegiatan jika ada -->
                            @if ($laporan->foto_kegiatan)
                                <img src="{{ public_path('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td class="acc-status">
                            <!-- Menampilkan status ACC -->
                            {{ $laporan->acc ? 'ACC' : 'Belum ACC' }}
                        </td>
                    </tr>
                @endforeach
            @else
                <!-- Menampilkan pesan jika tidak ada data laporan -->
                <tr>
                    <td colspan="7">Data laporan kegiatan tidak tersedia.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
