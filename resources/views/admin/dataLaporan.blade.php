<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
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
            vertical-align: middle;
        }

        /* Gaya untuk gambar di tabel */
        td img {
            display: block;
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk baris kosong */
        tbody tr td[colspan="6"] {
            text-align: center;
            color: #999;
            font-style: italic;
        }

        /* Gaya hover untuk baris tabel */
        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .download-btn-container {
            text-align: left; /* Menyelaraskan tombol ke kiri */
            margin-bottom: 20px; /* Memberi jarak antara tombol dan tabel */
        }

        .download-btn {
            background-color: #695CFE; /* Warna latar belakang hijau */
            color: white; /* Warna teks putih */
            border: none; /* Tanpa border */
            border-radius: 4px; /* Sudut membulat */
            padding: 10px 15px; /* Padding sekitar teks */
            font-size: 16px; /* Ukuran font */
            cursor: pointer; /* Menambahkan pointer saat hover */
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }

        .download-btn:hover {
            background-color: #8881d4; /* Warna latar belakang berubah saat hover */
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            h1 {
                font-size: 20px;
            }

            td img {
                max-width: 80px;
            }
        }
    </style>
</head>
<body>
    @extends('admin.dashboard')

    @section('title', 'Data Laporan Kegiatan Siswa')

    @section('content')
    <div class="body">
        <h1>Data Laporan Kegiatan Siswa</h1>

        <!-- Tombol Unduh PDF -->
        <div class="download-btn-container">
            <a href="{{ route('guru.downloadLaporanKegiatanPdf') }}" class="download-btn">Download PDF</a>
        </div>

        <table id="laporanTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Nama Siswa</th>
                    <th>Deskripsi</th>
                    <th>Foto Kegiatan</th>
                      <th>Tempat PKL</th>
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
                                    <img src="{{ asset('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                              <td>{{ $laporan->tempat_pkl ?? 'Not Provided' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Data laporan kegiatan tidak tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>
