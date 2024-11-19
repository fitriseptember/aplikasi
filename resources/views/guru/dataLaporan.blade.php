<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Siswa</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

#laporanTable {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#laporanTable th,
#laporanTable td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

#laporanTable th {
    background-color: #695CFE;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
}

#laporanTable tr:nth-child(even) {
    background-color: #f2f2f2;
}

#laporanTable tr:hover {
    background-color: #e8f0fe;
}

#laporanTable td img {
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#laporanTable td {
    font-size: 14px;
    color: #555;
}

#laporanTable td:last-child {
    text-align: center;
}

td[colspan="5"] {
    text-align: center;
    color: #777;
    font-style: italic;
    padding: 20px;
}

    </style>
</head>
<body>
     @extends('guru.dashboard')

@section('title', 'Absensi Siswa')

@section('content')
    <div class="body">
        <h1>Data Laporan Kegiatan Siswa</h1>

        <table id="laporanTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Siswa</th>
                    <th>Deskripsi</th>
                    <th>Foto Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($laporanKegiatan) && count($laporanKegiatan) > 0)
                @foreach ($laporanKegiatan as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                    <td>{{ $laporan->tanggal }}</td>
                    <td>{{ $laporan->user->nama_lengkap ?? 'Unknown' }}</td> {{-- Nama siswa dari relasi user --}}
                    <td>{{ $laporan->deskripsi }}</td>
                    <td>
                        @if ($laporan->foto_kegiatan)
                        <img src="{{ asset('storage/' . $laporan->foto_kegiatan) }}" alt="Foto Kegiatan" width="150">
                        @else
                        Tidak ada foto
                        @endif
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">Data laporan kegiatan tidak tersedia.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
     @endsection
</body>
</html>
