<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            /* Latar belakang abu-abu muda */
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            /* Latar belakang putih untuk kontainer */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            /* Warna teks abu-abu gelap */
        }

        button {
            background-color: #6c757d;
            /* Warna abu-abu */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a6268;
            /* Warna abu-abu lebih gelap saat hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6c757d;
            /* Warna abu-abu untuk header */
            color: white;
            /* Warna teks putih */
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
            /* Warna abu-abu muda untuk baris genap */
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Kegiatan Siswa</h1>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="reportList">
                <!-- Data laporan akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>


</body>

</html>
