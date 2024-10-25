<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Akun Siswa PKL</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #eaeaea;
            margin: 0;
            padding: 20px;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Table Styling */
        .akun-siswa-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .akun-siswa-table th,
        .akun-siswa-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .akun-siswa-table th {
            background-color: #6c757d;
            /* Warna abu-abu gelap */
            color: #fff;
            font-weight: bold;
        }

        .akun-siswa-table tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Warna abu-abu terang */
        }

        .akun-siswa-table tr:hover {
            background-color: #d1d1d1;
            /* Warna saat hover */
        }

        .akun-siswa-table td {
            color: #333;
        }

        /* Mobile Responsiveness */
        @media (max-width: 600px) {

            .akun-siswa-table th,
            .akun-siswa-table td {
                font-size: 14px;
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h1>Akun Siswa</h1>
        <table class="akun-siswa-table">
            <thead>
                <tr>
                    <th>ID Akun</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>No Telepon</th>
                    <th>Status Akun</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                </tr>
            </thead>

        </table>
    </div>
</body>

</html>
