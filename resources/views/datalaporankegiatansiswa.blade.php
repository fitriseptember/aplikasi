<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Kegiatan Siswa</title>
        <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
            animation: slideIn 0.8s ease;
        }
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            animation: zoomIn 0.6s ease forwards;
            opacity: 0;
        }
        @keyframes zoomIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
            transition: background-color 0.3s;
        }
        th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }

        /* Box styling */
        .box {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: slideUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-download {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-download:hover {
            background-color: #45a049;
        }

        /* Button styling */
        .btn-back {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Laporan Kegiatan Siswa</h1>
        <div class="box">
            <table>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Tanggal Kumpul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                </tr>
            </table>
        </div>
        <!-- Tombol kembali -->
        <a class="btn-back" href="javascript:history.back()">Kembali</a>
    </div>

</body>

</html>
