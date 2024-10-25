<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Absen PKL</title>
    <style>
        body {
            background-color: #f7f7f7;
            /* Warna latar belakang halaman */
            font-family: Arial, sans-serif;
            /* Font yang digunakan */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            /* Warna latar belakang tabel */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #7d7d7d;
            /* Warna latar belakang header */
            color: #ffffff;
            /* Warna teks header */
        }

        tr:nth-child(even) {
            background-color: #eaeaea;
            /* Warna latar belakang baris genap */
        }

        tr:hover {
            background-color: #d9d9d9;
            /* Warna saat hover pada baris */
        }

        h2 {
            text-align: center;
            /* Memusatkan judul */
            color: #333;
            /* Warna teks judul */
        }

        .btn-acc {
            background-color: #4CAF50;
            /* Warna tombol Acc */
            color: white;
            /* Warna teks tombol */
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-acc:hover {
            background-color: #45a049;
            /* Warna saat hover tombol */
        }
    </style>
</head>

<body>

    <h2>Absen Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th> <!-- Posisi Tanggal sekarang di depan -->
                <th>Nama Siswa</th> <!-- Posisi Nama Siswa sekarang di belakang -->
                <th>Status Hadir</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>

    </table>

</body>

</html>
