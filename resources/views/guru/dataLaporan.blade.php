<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Kegiatan Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .body {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
            font-size: 16px;
        }

        thead th {
            background-color: #695CFE;
            color: #ffffff;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        tbody tr {
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        td, th {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        td img {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        tbody tr td[colspan="6"] {
            text-align: center;
            color: #999;
            font-style: italic;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .download-btn {
            background-color: #695CFE;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .download-btn:hover {
            background-color: #8881d4;
        }

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    @extends('guru.dashboard')

    @section('title', 'Data Laporan Kegiatan Siswa')

    @section('content')
    <div class="body">
        <h1>Data Laporan Kegiatan Siswa</h1>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Unduh PDF -->
        <div style="margin-bottom: 20px;">
            <a href="{{ route('guru.downloadLaporanKegiatanPdf') }}" class="download-btn">Download PDF</a>
        </div>

        <!-- Tabel laporan -->
        <table id="laporanTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Nama Siswa</th>
                    <th>Deskripsi</th>
                    <th>Foto Kegiatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                    @foreach ($laporanKegiatan as $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->tanggal }}</td>
                            <td>{{ \Carbon\Carbon::parse($laporan->time)->format('H:i') }}</td>
                            <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td>
                            <td>{{ $laporan->deskripsi }}</td>
                            <td>
                                @if ($laporan->foto_kegiatan)
                                    <img src="{{ asset('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan" width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                @if ($laporan->acc)
                                    <span style="color: green;">✔️ ACC</span>
                                @else
                                    <form action="{{ route('guru.laporan.acc') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $laporan->id }}">
                                        <button type="submit" style="background-color: #695CFE; color: white; border: none; border-radius: 4px; padding: 5px 10px; cursor: pointer;">ACC</button>
                                    </form>
                                @endif
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
    </div>
    @endsection
</body>
</html>
