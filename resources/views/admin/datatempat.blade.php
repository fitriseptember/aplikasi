<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tempat PKL</title>
    <style>
        /* Mengatur gaya dasar untuk body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        /* Kontainer utama */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk judul halaman */
        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Gaya untuk pesan sukses */
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Header tabel */
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #695CFE;
            color: #ffffff;
            text-transform: uppercase;
        }

        /* Warna baris tabel */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hover efek untuk baris tabel */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>

    <!-- Menambahkan CDN untuk jsPDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>
<body>
    @extends('admin.dashboard')

    @section('title', 'Daftar Tempat PKL')

    @section('content')
        <div class="container">
            <h1>Daftar Tempat PKL</h1>

            <!-- Tombol Unduh PDF -->
        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.downloadDataTempatPKLPdf') }}" class="btn btn-primary" style="padding: 10px 15px; background-color: #695CFE; color: white; text-decoration: none; border-radius: 5px;">Download PDF</a>
        </div>

            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
           <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tempat PKL</th>
            <th>Alamat</th>
            <th>Guru Pembimbing</th>
            <th>Mentor PKL</th>
            <th>Siswa PKL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tempatPkl as $tempat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tempat->pkl_place }}</td>
            <td>{{ $tempat->pkl_address }}</td>
            <td>{{ $tempat->pkl_teacher }}</td>
            <td>{{ $tempat->pkl_mentor }}</td>
            <td>{{ $tempat->pkl_student }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    @endsection
</body>
</html>
