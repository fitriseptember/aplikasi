<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg, #f0f4f8, #ffffff); /* Gradiasi lembut */
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding: 20px;
    }
    
    .body {
        width: 90%;
        max-width: 1200px;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }
    
    #laporanTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    #laporanTable th, #laporanTable td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        vertical-align: middle;
    }
    
    #laporanTable th {
        background-color: #4a90e2; /* Warna header */
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
    }
    
    #laporanTable tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    
    #laporanTable tbody tr:hover {
        background-color: #f1f1f1;
    }
    
    #laporanTable img {
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        max-width: 150px;
    }
    
    td {
        font-size: 14px;
        color: #555;
    }
    
    td[colspan="5"] {
        text-align: center;
        font-style: italic;
        color: #888;
    }
    
    /* Responsif */
    @media (max-width: 768px) {
        .body {
            padding: 15px;
        }
    
        #laporanTable th, #laporanTable td {
            font-size: 12px;
            padding: 8px;
        }
    
        h1 {
            font-size: 20px;
        }
    }   
    </style>
</head>
<body>
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
</body>
</html>